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
    <title>Add New - NoTinG</title>
</head>
<body>
    <?php
        include('./header.php');
        require('./db_connect_file.php');

        session_start();

        if ( isset( $_POST['topic'] ) ) {
            $formattedText = addslashes($_POST['body']);
            $loggedInUserId = $_SESSION['loggedInUser']['id'];

            $mySqlDbHandle->query("
                INSERT INTO notes( user_id, title, body, starred )
                VALUES( $loggedInUserId, '$_POST[topic]', '$formattedText', 0 )
            ");

            header('Location: ./dashboard.php');
        }
    ?>

    <section id="editor">
        <div>
            <a href="./dashboard.php"><span class="fas fa-arrow-left"></span></a>
            <div>
            </div>
        </div>

        <form action="./add-new.php" method="POST">
                <input type='text' id='topic' name='topic' placeholder='note header'>

                <textarea type='text' id='body' name='body' placeholder='note body' rows='20'></textarea>

            <input type="submit" value="save">  
        </form>
    </section>

    <?php
        include('./footer.php');
    ?>
</body>
</html>