<?php

// function to check request Methode
function checkRequestMethode($methode)
{
    if ($_SERVER['REQUEST_METHOD'] == $methode) {
        return true;
    }
    return false;
}

// ckeck form input
function checkFormInput($input)
{
    if (isset($_POST[$input])) {
        return true;
    }
    return false;
}

// function to sanitize input
function sanitizeInput($input)
{
    return trim(htmlspecialchars(htmlentities($input)));
}
