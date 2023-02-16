<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        include('./stylesheets.php');
    ?>
    <link rel="stylesheet" href="./styles/dashboard.css">
    <title>Dashboard - Noting</title>
</head>
<body>
    <?php
        include('./header.php');
        require('./db_connect_file.php');
        session_start();

        function showUserNotes() {
            global $mySqlDbHandle;

            $loggedInUserId = $_SESSION['loggedInUser']['id'];

            $queryCursor = $mySqlDbHandle->query("
                SELECT notes.id, notes.title, notes.body, notes.starred
                FROM users, notes
                WHERE users.id = notes.user_id AND users.id = $loggedInUserId
            ");
            $resultSet = $queryCursor->fetch_assoc();

            while( isset($resultSet) ) {
                if ( $resultSet['starred'] == 0 ) {
                    $bodyText = substr( $resultSet['body'], 0, 75 ) . "...";

                    echo "
                        <div class='note'>
                            <h2> <a href='./read.php?id=$resultSet[id]'>$resultSet[title]</a> </h2>
                            <p>
                                $bodyText
                            </p>
                            <div> 
                                <a href='./dashboard.php?id=$resultSet[id]&action=star'><span class='far fa-star'></span></a> 
                                <a href='./edit.php?id=$resultSet[id]'><span class='fas fa-pen'></span></a> 
                                <a href='./dashboard.php?id=$resultSet[id]&action=delete'><span class='fas fa-trash'></span></a> 
                            </div>
                        </div>
                    ";
                } else {
                    $bodyText = substr( $resultSet['body'], 0, 75 ) . "...";

                    echo "
                        <div class='note'>
                            <h2> <a href='./read.php?id=$resultSet[id]'>$resultSet[title]</a> </h2>
                            <p>
                                $bodyText
                            </p>
                            <div> 
                                <a href='./dashboard.php?id=$resultSet[id]&action=star'><span class='fas fa-star'></span></a> 
                                <a href='./edit.php?id=$resultSet[id]'><span class='fas fa-pen'></span></a> 
                                <a href='./dashboard.php?id=$resultSet[id]&action=delete'><span class='fas fa-trash'></span></a> 
                            </div>
                        </div>
                    ";
                }

                $resultSet = $queryCursor->fetch_assoc();
            }
        }
    ?>

    <section id="dashboard">
        <h1>
            your notes, <?php echo ( explode( " ", $_SESSION['loggedInUser']['name'] )[0] ) ?>
        </h1>

        <div id="filter-bar">
            <input type="text" name="" id="" value="<?php if ( isset( $_GET['action'] ) && $_GET['action'] == 'search' ) { echo $_GET['value']; } ?>">

            <?php 
                if ( isset( $_GET['action'] ) && $_GET['action'] == 'search' ) {
                    echo '<span class="fas fa-times" id="search-icon"></span>';
                } else {
                    echo '<span class="fas fa-search" id="search-icon"></span>';
                }
            ?>
            <a href="./add-new.php">
                <span class="fas fa-plus"></span>
                new
            </a>
        </div>

        <div id="notes-list">
            <?php 
                if ( isset( $_GET['action'] ) ) {
                    switch( $_GET['action'] ){
                        case 'delete':
                            $mySqlDbHandle->query("
                                DELETE FROM notes
                                WHERE id = $_GET[id]
                            ");

                            showUserNotes();
                        break;
    
                        case 'star':
                            $queryCursor = $mySqlDbHandle->query("
                                SELECT starred
                                FROM notes
                                WHERE id = $_GET[id]
                            ");
                            $resultSet = $queryCursor->fetch_assoc();

                            if ( $resultSet['starred'] == 1 ) {
                                $mySqlDbHandle->query("
                                    UPDATE notes
                                    SET starred = 0
                                    WHERE id = $_GET[id]
                                ");
                            } else {
                                $mySqlDbHandle->query("
                                    UPDATE notes
                                    SET starred = 1
                                    WHERE id = $_GET[id]
                                ");
                            }

                            showUserNotes();
                        break;
    
                        case 'search':
                            $loggedInUserId = $_SESSION['loggedInUser']['id'];
                            $queryCursor = $mySqlDbHandle->query("
                                SELECT notes.id, notes.title, notes.body, notes.starred
                                FROM notes
                                WHERE notes.title LIKE '%$_GET[value]%' AND notes.user_id = $loggedInUserId 
                            ");
                            $resultSet = $queryCursor->fetch_assoc();

                            if ( is_null( $resultSet ) ) {
                                echo "
                                    <div class='note' style='width:70%'>
                                        <h1> no notes were found for this search </h1>
                                        <p>
                                            try cancelling and searching again
                                        </p>
                                        <div></div>
                                    </div>
                                ";
                            } else {

                                while( isset($resultSet) ) {
                                    if ( $resultSet['starred'] == 0 ) {
                                        $bodyText = substr( $resultSet['body'], 0, 75 ) . "...";

                                        echo "
                                            <div class='note'>
                                                <h2> <a href='./read.php?id=$resultSet[id]'>$resultSet[title]</a> </h2>
                                                <p>
                                                    $bodyText
                                                </p>
                                                <div> 
                                                    <a href='./dashboard.php?id=$resultSet[id]&action=star'><span class='far fa-star'></span></a> 
                                                    <a href='./edit.php?id=$resultSet[id]'><span class='fas fa-pen'></span></a> 
                                                    <a href='./dashboard.php?id=$resultSet[id]&action=delete'><span class='fas fa-trash'></span></a> 
                                                </div>
                                            </div>
                                        ";
                                    } else {
                                        $bodyText = substr( $resultSet['body'], 0, 200 ) . "...";

                                        echo "
                                            <div class='note'>
                                                <h2> <a href='./read.php?id=$resultSet[id]'>$resultSet[title]</a> </h2>
                                                <p>
                                                    $bodyText
                                                </p>
                                                <div> 
                                                    <a href='./dashboard.php?id=$resultSet[id]&action=star'><span class='fas fa-star'></span></a> 
                                                    <a href='./edit.php?id=$resultSet[id]'><span class='fas fa-pen'></span></a> 
                                                    <a href='./dashboard.php?id=$resultSet[id]&action=delete'><span class='fas fa-trash'></span></a> 
                                                </div>
                                            </div>
                                        ";
                                    }
                    
                                    $resultSet = $queryCursor->fetch_assoc();
                                }
                            }
                        break;
                    }
                } else {
                    showUserNotes();
                }
            ?>
        </div>
    </section>

    <?php
        include('./footer.php');

        if ( isset($_GET['action']) && $_GET['action'] == 'search' ) {
            echo "
                <script>
                    document.getElementById('search-icon').addEventListener('click', function(){
                        window.open(`./dashboard.php`, '_self' );
                    });
                </script>
            ";
        } else {
            echo "
                <script>
                    document.getElementById('search-icon').addEventListener('click', function(){
                        window.open(`./dashboard.php?action=search&value=\${ document.getElementsByTagName('input')[0].value }`, '_self' );
                    });
                </script>
            ";
        }
    ?>

</body>
</html>