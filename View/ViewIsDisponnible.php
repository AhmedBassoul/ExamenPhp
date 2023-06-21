<p>Cette Salle :
  <?= $dis ?>
</p>
<p>Salle Id :
  <?= $salle ?>
</p>
<p>Date de reservation :
  <?= $date ?>
</p>
<p>Creneau :
  <?= $creneau ?>
</p>

<?php
if (isset($lien)) { ?>
 <p> <a style="text-decoration:none;" href="<?= $lien ?>">Activer/Supprimer la reservation</a></p>
<?php } ?>