<?php

require_once('Controller/Controller.php');

function generateSalleTable($table)
{

  $tableSalle = '';

  for ($i = 0; $i < count($table); $i++) {
    $etat = $table[$i]['disponnible'] == 'yes' ? 'Desactiver ?' : 'Activer ?' ;
    $tableSalle .= '<tr>';
    $tableSalle .= '<td>' . $table[$i]['id'] . '</td>';
    $tableSalle .= '<td>' . $table[$i]['name'] . '</td>';
    $tableSalle .= '<td><a style="text-decoration:none;" href="index.php?action=updateSalleEtat&Salle_id=' . $table[$i]['id'] . '"> '. $etat . '</a>';
    $tableSalle .='<a style="text-decoration:none;" href="index.php?action=updateSalleName&Salle_id=' . $table[$i]['id'] .'"> Modifier </a> </td>';
    $tableSalle .= '</tr>';
  }
  return $tableSalle;
}

function generateTableAdmin(array $salleListe)
{
  $table = '';
  for ($i = 0; $i < sizeof($salleListe); $i++) {

    $action = $salleListe[$i]['Etat'] == 'Desactive' ? 'Activer ?' : 'Desactive ?';

    $table .= '<tr>';
    $table .= '<td> ' . $salleListe[$i]["id"] . '</td>';
    $table .= '<td>' . $salleListe[$i]["Email"] . '</td>';
    $table .= '<td>' . $salleListe[$i]["Motif"] . '</td>';
    $table .= '<td>' . findColumnFromTableByCondition(
      'Salle',
      'name',
      'id',
      $salleListe[$i]["Salle_id"]
    ) . '</td>';
    $table .= '<td>' . $salleListe[$i]["Date"] . '</td>';
    $table .= '<td>' . $salleListe[$i]["Creneau"] . '</td>';



    $table .= '<td><a style="text-decoration:none;" href="index.php?action=updateEtat&Reservation_id=' . $salleListe[$i]["id"] . '"> ' . $action . ' </a></td>';

    $table .= '</tr>';
  }
  return $table;
}

function addSalleAction()
{
  if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
    exit;
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['name']))
      $error_name = 'Le nome de salle ne peut pas etre vide...';
    elseif ($_POST['name'] == findColumnFromTableByCondition('Salle', 'name', 'name', $_POST['name']))
      $error_name = 'Cette Salle est deja existe...';

    if (!isset($error_name)) {

      insertSalle([$_POST['name'], 'yes']);
      header('Location: index.php?action=adminTask');
    }

  }


  $View = 'View/ViewAddSalle.php';
  $variables = [
    'title' => 'Ajouter Une Salle',
    'error_name' => $error_name ?? '',
  ];

  render($View, $variables);
}

function updateSalleEtatAction()
{

  if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
    exit;
  }

    $salle_id = $_REQUEST['Salle_id'];
    if(findColumnFromTableByCondition('Salle','disponnible','id',$salle_id) === 'yes')
      removeSalle([$salle_id]);
    else
    activeSalle([$salle_id]);

    header('Location: index.php?action=adminTask');

}


function adminTaskAction()
{
  if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
    exit;
  }

  $View = 'View/ViewAdmin.php';

  $variables = [
    'title' => 'Admin',
    'tableContent' => generateSalleTable(findAllFromTablebyCondition('Salle')),
  ];
  render($View, $variables);
}


function ActiveOrDesactiveReservationAction()
{

  if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
    exit;
  }

  $View = 'View/ViewReservationAdmin.php';

  $Variables = [
    'tableContent' => generateTableAdmin(findAllFromTablebyCondition('Reservations')),
    'title' => 'Admin Reservation',
  ];

  render($View, $Variables);

}


function updateEtatAction()
{

  if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
    exit;
  }

  $reservation_id = $_REQUEST['Reservation_id'];

  if (findAllFromTablebyCondition('Reservations', 'id', $reservation_id)[0]['Etat'] === 'Active')
    DesactiverReservation([$reservation_id]);
  else
    activerReservation([$reservation_id]);
  header('Location: index.php?action=ActiveOrDesactiveReservation');
}

function updateSalleNameAction(){

  if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
    exit;
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['name']))
      $error_name = 'Le nome de salle ne peut pas etre vide...';
    elseif ($_POST['name'] == findColumnFromTableByCondition('Salle', 'name', 'name', $_POST['name']))
      $error_name = 'Cette Salle est deja existe...';

    if (!isset($error_name)) {

      updateSalle([$_POST['name'],findColumnFromTableByCondition('Salle','disponnible','id',$_REQUEST['Salle_id']),$_REQUEST['Salle_id']]);
      header('Location: index.php?action=adminTask');
    }

  }


  $View = 'View/ViewAddSalle.php';
  $variables = [
    'title' => 'Modifier Une Salle',
    'error_name' => $error_name ?? '',
    'salle_name' => findColumnFromTableByCondition('Salle','name','id',$_REQUEST['Salle_id']),
  ];

  render($View, $variables);
}