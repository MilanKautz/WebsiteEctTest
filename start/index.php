<?php
/** @var mysqli $db */

//Require DB settings with connection variable
require_once "includes/database.php";

//Get the result set from the database with a SQL query
$query = "SELECT * FROM users";
$result = mysqli_query($db, $query) or die ('Error: ' . $query );

//Loop through the result to create a custom array
$ectWorkers = [];
while ($row = mysqli_fetch_assoc($result)) {
    $ectWorkers[] = $row;
}

//Close connection
mysqli_close($db);
?>
<!doctype html>
<html lang="en">
<head>
    <title>Export</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head>
<body>
<h1>ECT Werknemers</h1>

<div class="search-box">
    <form action="search.php" method="POST">
        <input type="text" name="search" placeholder="Type to search">
        <button><i class="fa fa-search"></i></button>
    </form>
</div>

<a href="create.php">Voeg een nieuwe werknemer toe</a>
<table>
    <thead>
    <tr>
        <th>id</th>
        <th>Roepnaam</th>
        <th>Pers. nr</th>
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
            <td><?= $ectWorker['id'] ?></td>
            <td><?= $ectWorker['name'] ?></td>
            <td><?= $ectWorker['UserId'] ?></td>
            <td><a href="details.php?id=<?= $ectWorker['UserId'] ?>">Details</a></td>
            <td><a href="">Edit</a></td>
            <td><a href="delete.php?id=<?= $ectWorker['id'] ?>">Delete</a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
</body>
</html>
