<?php

require_once('Controller/Controller.php');

function FormAction()
{

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (empty($_POST['motif']))
      $error['motif'] = 'il faut saisir le motif de reservation';
    if (empty($_POST['salle_id']))
      $error['salle'] = 'il faut saisir la salle';
    if (empty($_POST["date"]) or $_POST["date"] < Date("Y-m-d"))
      $error["date"] = "Date de réservation invalide !...";
    elseif (empty($_POST['creneau']))
      $error['creneau'] = 'il faut saisir le creneau';
    else {
      $salle = $_POST['salle_id'];
      $date = $_POST['date'];
      $creneau = $_POST['creneau'];
      if (ReservationPossible([$salle, $date, $creneau]) == false) {
        $View = "View/ViewIsDisponnible.php";
        $variables = [
          'title' => 'disponibilité',
          "salle" => $salle,
          "date" => $date,
          "creneau" => $creneau,
          'dis' => 'déjà réservée pour la date et le créneau choisi !',
        ];
        render($View, $variables);
      }
    }

    if (!isset($error)) {
      $Reservation_id = addReservation(
        [
          findColumnFromTableByCondition('Users', 'Email', 'id', $_SESSION['user']),
          $_POST['motif'],
          $_POST['salle_id'],
          $_POST['date'],
          $_POST['creneau'],
          'Desactive',
        ]
      );

      $View = "View/ViewIsDisponnible.php";
      $variables = [
        'lien' => 'index.php?action=add&id=' . $Reservation_id,
        'title' => 'disponibilité',
        "salle" => $salle,
        "date" => $date,
        "creneau" => $creneau,
        'dis' => 'Disponnible !',
      ];
      render($View, $variables);
    }

  }

  $View = 'View/ViewForm.php';
  $title = 'Ajouter une reservation';
  $variables = [
    'title' => $title,
    'salles' => findAllFromTablebyCondition('Salle', '	disponnible', 'yes'),
    'error' => $error ?? [],
  ];
  render($View, $variables);
}

function addAction()
{
  $Reservation_id = $_REQUEST['id'];

  activerReservation(
    [
      $Reservation_id
    ]
  );
  header('Location: index.php?action=SalleListe');

}


function removeAction()
{
  if ($_SESSION['user'] == findColumnFromTableByCondition('Users', 'id', 'Email', findColumnFromTableByCondition('Reservations', 'Email', 'id', $_REQUEST['Reservation_id']))) {
    DesactiverReservation([
      $_REQUEST['Reservation_id'],
    ]);
    header('Location: index.php?action=SalleListe');
  } else
    throw new Exception('Vous avez pas le droit de supprimer cette salle');

}


function SalleListeAction()
{

  $View = 'View/ViewSalleReserve.php';
  $variables = [
    'title' => 'Liste des salles',
    'tableContent' => generateTable(findAllFromTablebyCondition('Reservations', 'Etat', 'Active')),
  ];

  render($View, $variables);

}