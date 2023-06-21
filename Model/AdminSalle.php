<?php

require_once('Model/Model.php');

function removeSalle($data){  
  getCn()->prepare('UPDATE Salle SET disponnible="non" WHERE id=?')
    ->execute($data);
}

function activeSalle($data){
  getCn()->prepare('UPDATE Salle SET disponnible="yes" WHERE id=?')
    ->execute($data);
}

function insertSalle($data){
  getCn()->prepare('INSERT INTO Salle(name,	disponnible) VALUES (?,?)')
    ->execute($data);
}

function updateSalle($data){
  getCn()->prepare('UPDATE Salle SET name=?,disponnible=? WHERE id=?')
  ->execute($data);
}
