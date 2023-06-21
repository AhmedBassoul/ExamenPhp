<?php

function getCn()
{
  return new PDO("mysql:host=localhost;dbname=SMI2023", "root", "");
}

function findAllFromTablebyCondition($table, $columnCondition = 1, $condition = 1)
{
  return getCn()->query('SELECT * FROM ' . $table . ' WHERE ' . $columnCondition . ' = \'' . $condition . '\'ORDER BY id DESC ')->fetchAll();
}

function findColumnFromTableByCondition($table,$column,$columnCondition = 1,$condition = 1){
  return getCn()->query("SELECT $column FROM $table WHERE $columnCondition = '$condition' ORDER BY id DESC LIMIT 1;")
    ->fetchColumn();
}


function activerReservation(array $data){
  getCn()->prepare('UPDATE Reservations SET Etat=\'Active\' WHERE id = ?')
          ->execute($data);
}

function DesactiverReservation(array $data){
  getCn()->prepare('UPDATE Reservations SET Etat=\'Desactive\' WHERE id = ?')
  ->execute($data);
}
