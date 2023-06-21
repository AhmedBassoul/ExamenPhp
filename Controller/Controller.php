<?php

require_once('Model/SalleManager.php');
require_once('Model/UserManager.php');
require_once('Model/AdminSalle.php');


function render($View, array $variables = [])
{
  extract($variables);

  if (!file_exists($View))
    throw new Exception($View . 'n\'existe pas');
  ob_start();
  require($View);
  $View = ob_get_clean();
  require_once('View/Template/template.php');

}

function generateTable(array $salleListe)
{
  $table = '';
  for ($i = 0; $i < sizeof($salleListe); $i++) {
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

    $table .= '<td><a style="text-decoration:none;" href="index.php?action=remove&Reservation_id=' . $salleListe[$i]["id"] . '"> Supprimer </a></td>';

    $table .= '</tr>';
  }
  return $table;
}

function ErrorAction($e)
{
  $View = 'View/ViewError.php';
  $variables = [
    'error' => $e->getMessage(),
    'title' => 'Error',
  ];

  render($View, $variables);
}

function returnDate()
{
    $days['fr'] = ['Dimance', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
    $month['fr'] = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];

    $date = getdate();
    return $days['fr'][$date['wday']] . " " . $date['mday'] . " " . $month['fr'][$date['mon'] - 1] . " " . $date['year'];
}

