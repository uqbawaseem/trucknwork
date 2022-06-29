
<?php
session_start();
    include("../config.php");

    $id = $_GET['id'];
    mysqli_query($connection, "DELETE FROM `trip` WHERE `id`=$id");
    echo "<div class=\"uk-alert-primary\" uk-alert>
    <a class=\"uk-alert-close\" uk-close></a>
    <p>Delete successfully! </p>";
    header("location: all_trips.php");

?>