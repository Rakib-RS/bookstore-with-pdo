<?php
    require_once('./dbconfig.php');
    require_once('./phpmysqlconnect.php');
    //echo $q;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <?php
    //$booksJson = file_get_contents('books.json');
   // $books = json_decode($booksJson, true);
        $books = $q;
    ?>
    <form action="./search.php" method="POST">
        <input type="text" name="title" placeholder="enter title">
        <input type="submit" value="Search">
    </form>
    <br>
    <br>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Available</th>
            <th>Pages</th>
            <th>ISBN</th>
            <th>Option </th>
        </tr>
        <?php foreach ($books as $key => $book) : ?>
            <tr>
                <td><?php echo $key+1; ?></td>
                <td><?php echo $book['title']; ?></td>
                <td><?php echo $book['author']; ?></td>
                <td><?php echo $book['available']; ?></td>
                <td><?php echo $book['pages']; ?></td>
                <td><?php echo $book['isbn']; ?></td>
                <td> <a onclick="return confirm('Are you sure you want to delete this books')" href="<?php echo   './delete.php?id=' . (int)($book['id']); ?>">
                        <button class="btn-delete">Delete</button>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>
    <br>
    <br>
    <a href="./create.php"><button>add</button></a>
</body>

</html>