<?php
session_start();
require "../../core/dbConnect.php";


if (isset($_POST['task'])) {
    $name = $_POST['task'];
    $id = $_GET['id'];
    $sql = " UPDATE `tasks`  SET `task` = '$name' WHERE `id` = '$id' ";
    $result = $conn->prepare($sql);
    $Task_Updated = $result->execute();

    if ($Task_Updated) {
        $_SESSION['task_updated'] = "Task has been Updated ";
    }
    header('location:../../index.php');
    die();
} else {
    header('location:../../index.php');
    die();
}
