<?php
session_start();
require "../../core/dbConnect.php";


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = " DELETE FROM `tasks` WHERE `id`='$id' ";
    $result = $conn->prepare($sql);
    $delete_task = $result->execute();

    if ($delete_task) {
        $_SESSION['delete_task'] = "Task Deleted Sucessfully";
    }
    header('location:../../index.php');
    die();
} else {
    header('location:../../index.php');
    die();
}
