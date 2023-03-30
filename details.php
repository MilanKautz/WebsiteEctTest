<?php
/** @var mysqli $db */

// redirect when uri does not contain a id
if(!isset($_GET['id']) || $_GET['id'] == '') {
    // redirect to index.php
    header('Location: delete.php');
    exit;
}

//Require database in this file
require_once "includes/database.php";

//Retrieve the GET parameter from the 'Super global'
$workerId = mysqli_escape_string($db, $_GET['id']);

//Get the record from the database result
$query = "SELECT * FROM export WHERE UserId = '$workerId'";
$result = mysqli_query($db, $query)
    or die ('Error: ' . $query );


$worker = mysqli_fetch_assoc($result);

$ectWorkers = [];
while ($row = mysqli_fetch_assoc($result)) {
    $ectWorkers[] = $row;
}
$query = "SELECT * FROM users";
$result = mysqli_query($db, $query)
    or die ('Error: ' . $query );


$workername = mysqli_fetch_assoc($result);

$ectWorkernames = [];
while ($row = mysqli_fetch_assoc($result)) {
    $ectWorkernames[] = $row;
}
//Close connection
mysqli_close($db);
?>
<!doctype html>
<html lang="en">
<head>
    <title>ECT Werknemers Details</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<h1><?= $worker['Roepnaam'] . ' - ' . $worker['Achternaam'] ?> </h1>

<div class="dropdown">
  <button onclick="myFunction()" class="dropbtn"><?= $worker['Roepnaam']?></button>






  <div id="myDropdown" class="dropdown-content">
  <?php foreach ($ectWorkernames as $ectWorkername) { ?>
        <tr>
        <td><a href="details.php?id=<?= $ectWorkername['UserId'] ?>"><?= $ectWorkername['name'] ?></a></td>

        </tr>
    <?php } ?>
  </div>
</div>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

<p>
Adres: <?= $worker['Straat en huisnummer'] ?> <?= $worker['Huisnr'] ?> <?= $worker['Appart.'] ?> -- <?= $worker['Postcode'] ?> <?= $worker['Plaats'] ?>




<h2>PSG: <?= $worker['Oms. PSG'] ?></h2>


</p>

<br>

Klik <a href="details.php?id=<?= $ectWorker['UserId'] ?>">hier</a> voor adres gegevens
<table>
    <thead>
    <tr>
        
        <th>Opleidingstekst</th>
        <th>Opleid.omschr.</th>
        <th>Begindatum</th>
        <th>Instructeur</th>
        <th>ZZSCHKZ</th>
        <th>Omschr. Studierichting</th>
        <th>Instituut/plts</th>
        <th>Omschr. opl.status</th>
        <th colspan="3"></th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <td colspan="10">&copy; ECT werknemers</td>
    </tr>
    </tfoot>
    <tbody>
    <?php foreach ($ectWorkers as $ectWorker) { ?>
        <tr>
            <td><?= $ectWorker['Opleidingstekst'] ?></td>
            <td><?= $ectWorker['Opleid.omschr.'] ?></td>
            <td><?= $ectWorker['Begindatum'] ?></td>
            <td><?= $ectWorker['Instructeur'] ?></td>
            <td><?= $ectWorker['ZZSCHKZ'] ?></td>
            <td><?= $ectWorker['Omschr. Studierichting'] ?></td>
            <td><?= $ectWorker['Instituut/plts'] ?></td>
            <td><?= $ectWorker['Omschr. opl.status'] ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<div>
    <a href="index.php">Go back to the list</a>
</div>
</body>
</html>
