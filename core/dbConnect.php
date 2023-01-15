<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=todo_list", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Database Connected  ";
} catch (PDOException $EX) {
    echo "Connection Failed " . $EX->getMessage();
}
