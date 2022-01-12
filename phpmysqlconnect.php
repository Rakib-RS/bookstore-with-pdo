<?php
require_once 'dbconfig.php';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    echo "Connected to $dbname at $host successfully.";
    
    $sql = 'SELECT title,
                    author,
                    isbn,
                    pages,
                    available,
                    id
               FROM books';
             // ORDER BY title';

    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}