<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        include('./stylesheets.php');
    ?>
    <link rel="stylesheet" href="./styles/read.css">
    <title>Reading - NoTinG</title>
</head>
<body>
    <?php
        include('./header.php');
        require('./db_connect_file.php');

        $queryCursor = $mySqlDbHandle->query("
            SELECT title, body
            FROM notes
            WHERE id = $_GET[id]
        ");
        $resultSet = $queryCursor->fetch_assoc();
    ?>

    <section id="reading-pane">
        <div>
            <a href="./dashboard.php"><span class="fas fa-arrow-left"></span></a>
            <div>
                <a href="./edit.php?<?php echo "id=$_GET[id]" ?>"><span class="fas fa-pen"></span></a>
                <a href="./download.php?<?php echo "id=$_GET[id]" ?>"><span class="fas fa-download"></span></a>
            </div>
        </div>
        <h1>
            <?php
                echo "$resultSet[title]";
            ?>
        </h1>
        <p>
            <?php
                echo stripslashes($resultSet['body']);
            ?>
        </p>
    </section>

    <?php
        include('./footer.php')
    ?>
</body>
</html>