<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        include('./stylesheets.php');
    ?>
    <link rel="stylesheet" href="./styles/edit.css">
    <title>Edit - NoTinG</title>
</head>
<body>
    <?php
        include('./header.php');
        require('./db_connect_file.php');

        session_start();

        if ( isset( $_POST['topic'] ) ) {
            $formattedText = addslashes($_POST['body']);

            $mySqlDbHandle->query("
                UPDATE notes
                SET title = '$_POST[topic]', body = '$formattedText'
                WHERE id = $_GET[id]
            ");

            header('Location: ./dashboard.php');
        }
    ?>

    <section id="editor">
        <div>
            <a href="./dashboard.php"><span class="fas fa-arrow-left"></span></a>
            <div>
                <a href="./download.php"><span class="fas fa-download"></span></a>
            </div>
        </div>

        <form action="edit.php?id=<?php echo $_GET['id'] ?>" method="POST">
            <?php
                $queryCursor = $mySqlDbHandle->query("
                    SELECT title, body
                    FROM notes
                    WHERE id = $_GET[id]
                ");
                $resultSet = $queryCursor->fetch_assoc();

                echo "
                    <input type='text' id='topic' name='topic' placeholder='note header' value='$resultSet[title]'>

                    <textarea type='text' id='body' name='body' placeholder='note body' rows='20'>$resultSet[body]</textarea>
                "
            ?>

            <input type="submit" value="save">  
        </form>
    </section>

    <?php
        include('./footer.php');
    ?>
</body>
</html>