<?php

require_once('Model/Model.php');


function addReservation(array $data)
{
  getCn()
    ->prepare('INSERT INTO Reservations(Email,Motif,Salle_id,Date,Creneau,Etat)
                    VALUES (?,?,?,?,?,?)')
    ->execute($data);
    return getCn()->query('SELECT MAX(id) from Reservations')->fetchColumn();
}


function ReservationPossible(array $reservation)
{
	$Rq= getCn()->
              prepare("select count(*) from Reservations where Salle_id = ? and Date = ? and Creneau = ? and Etat = 'Active'");	
  $Rq->execute($reservation);
  return !($Rq->fetchColumn());
}
