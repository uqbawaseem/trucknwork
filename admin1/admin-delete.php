<?php
session_start();
    include("../config.php");

    $id = $_GET['id'];
    $job_id = $_GET['id'];
    mysqli_query($connection, "DELETE FROM `admin` WHERE `id`=$id");
    echo "<div class=\"uk-alert-primary\" uk-alert>
    <a class=\"uk-alert-close\" uk-close></a>
    <p>Login successfully! </p>";
    header("location: index.php");

?>