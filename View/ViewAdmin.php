<table id="my-nice-table">
  <thead>
    <td>Id</td>
    <td>Nom</td>
    <td>Operation</td>
  </thead>

  <tbody>
    <?= $tableContent; ?>
  </tbody>

  <tfoot>

    <td class="foot" colspan="3">
      <a style="text-decoration:none;" href="index.php?action=addSalle">Ajouter Une Salle</a>
    </td>
  </tfoot>
</table>

<p> 
  <a style="text-decoration:none;" href="index.php?action=ActiveOrDesactiveReservation">Activer/Desactiver Les Reservations</a> 
</p>