<?php
/** @var mysqli $db */
//Require music data to use variable in this file
require_once "includes/database.php";


?>
<!doctype html>
<html lang="en">
<head>
    <title>Music Collection Edit</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<h1>Edit</h1>

<form action="" method="post">
    <div class="data-field">
        <label for="artist">Artist</label>
        <input id="artist" type="text" name="artist" value=""/>
    </div>
    <div class="data-field">
        <label for="album">Album</label>
        <input id="album" type="text" name="album" value=""/>
    </div>
    <div class="data-field">
        <label for="genre">Genre</label>
        <input id="genre" type="text" name="genre" value=""/>
    </div>
    <div class="data-field">
        <label for="year">Year</label>
        <input id="year" type="text" name="year" value=""/>
    </div>
    <div class="data-field">
        <label for="tracks">Tracks</label>
        <input id="tracks" type="number" name="tracks" value=""/>
    </div>
    <div class="data-submit">
        <input type="hidden" name="id" value=""/>
        <input type="submit" value="Save"/>
    </div>
</form>
<div>
    <a href="index.php">Go back to the list</a>
</div>
</body>
</html>
