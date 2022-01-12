<?php
   // $booksJson = file_get_contents('books.json');
    //$books = json_decode($booksJson, true);
    require_once('./dbconfig.php');
    require_once('./phpmysqlconnect.php');
        $id = $_GET['id'];
        $step=$pdo->prepare("DELETE FROM books WHERE ID = $id ");
        $step->execute();
       header('Location:index.php');

?>