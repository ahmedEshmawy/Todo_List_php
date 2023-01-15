<?php
session_start();
require "../../core/dbConnect.php";
include "../../core/functions.php";
include "../../core/validations.php";
$errors = [];


if (checkRequestMethode("POST")  && checkFormInput('submit')) {

    $task = sanitizeInput($_POST['task']);


    //validation
    //  task => required :min 3:max 25
    if (!requiredVal($task)) {
        $errors[] = "Field is Required";
    } elseif (!minVal($task, 3)) {
        $errors[] = "Field must be Greater than 3 character";
    } elseif (!maxVal($task, 50)) {
        $errors[] = "Field must be Less than 50 character";
    }



    if (empty($errors)) {
        //insert users date 

        $sql = "INSERT INTO tasks(`task`) VALUES('$task')";
        $result = $conn->prepare($sql);
        $task_Added = $result->execute();

        //redirect
        if ($task_Added) {
            $_SESSION['task_added'] = "task Added Sucessfully";
        }
        header('location:../../index.php');
        die();
    } else {
        $_SESSION['errors'] = $errors;
        header('location:../../index.php');
        die();
    }
} else {
    echo "Not Supported Method";
}
