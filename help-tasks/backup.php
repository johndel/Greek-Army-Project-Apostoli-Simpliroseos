<?php 
  ini_set('display_errors',1); 
  error_reporting(E_ALL);

  $title = "Αποθήκευση - Μεταφορά τωρινής κατάστασης του προγράμματος";
?>

<?php include("../partials/head.inc.php") ?>
<?php include("../partials/menu.inc.php") ?>

<h4>Αντίγραφο Ασφαλείας</h4>

<a href="/database/data-backup.php" class="btn btn-success">
<i class="icon-camera"></i>
Δημιουργία Αντιγράφου Ασφαλείας για τα δεδομένα - Μεταφορά Δεδομένων
</a>
<br />
<br />

<form action="/database/data-restore.php" enctype="multipart/form-data" method="post">
<div style="margin-right: 20px; float: left">
  <input type="submit" class="btn btn-success" value="Επαναφορά"></input>
</div>
<input type="file" name="datafile" size="40"></input>
</form>
<br />


<a href="/database/reset.php" class="btn btn-danger" onclick="return confirm('Η συγκερκιμένη επιλογή θα διαγράψει όλα τα στοιχεία που έχετε εισάγει στην εφαρμογή και θα την επαναφέρει στην αρχική της κατάσταση');">
<i class="icon-warning-sign"></i>
Διαγραφή ΌΛΩΝ των δεδομένων και επαναφορά αρχικών ρυθμίσεων (ΠΡΟΣΟΧΗ!!!)
<i class="icon-warning-sign"></i>
</a>

<?php include("../partials/footer.inc.php") ?>