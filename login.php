<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        include('./stylesheets.php');
    ?>
    <link rel="stylesheet" href="./styles/login.css">
    <title>Noting - Login</title>
</head>
<body>
    <?php
        include('./header.php');
        require('./db_connect_file.php');
        session_start();
    ?>


    <?php
        $htmlcontent = "<script> alert( '%s')</script>";

        if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
            $emailValue = $_POST['email'];
            $passwordValue = $_POST['password'];
            $validEmail = filter_var( $emailValue, FILTER_VALIDATE_EMAIL );
            $validUserDataArray = array();
            $validUserFound = false;

            if ( $validEmail == false ) {
                printf( $htmlcontent, 'invalid email entered. try again' );
            } else {

                if ( strlen( $passwordValue ) < 8 ) {
                    printf( $htmlcontent, 'invalid password, your password must be 8 characters or more' );
                } else {
                    $queryCursor = $mySqlDbHandle->query( 'SELECT * FROM users' );
                    $resultSet = $queryCursor->fetch_assoc();

                    while( $resultSet ) {
                        if ( $resultSet['email'] == $emailValue && $resultSet['password'] == $passwordValue ) {
                            $validUserFound = true;
                            $validUserDataArray = $resultSet;
                        }

                        if ( $validUserFound ) {
                            break;
                        }

                        $resultSet = $queryCursor->fetch_assoc();
                    }

                    if ( $validUserFound ) {
                        $_SESSION['loggedInUser'] = $validUserDataArray;

                        $queryCursor->close();
                        $mySqlDbHandle->close();

                        header('Location: ./dashboard.php');
                    } else {
                        printf( $htmlcontent, 'incorrect email or password entered. check and try again' );

                        $queryCursor->close();
                        $mySqlDbHandle->close();
                    }
                }
            }
        }
    ?>


    <form action="
        <?php
            echo $_SERVER['PHP_SELF'];
        ?>
    " method="POST">
            <h1> welcome back </h1>'
            <p> fill your credentials below or sign in with google or facebook </p>

            <label for="email"> email: </label>
            <input type="email" name="email" id="email" placeholder="joseph@notingall.com" required value="
                <?php
                    echo ( isset( $emailValue ) ) ? $emailValue : '';
                ?>
            ">
            <span class="info-text"> <span class="fas fa-1x fa-times-circle"></span> invalid email address</span>

            <label for="password"> password: </label>
            <input type="password" name="password" id="password" placeholder="joseph loves noting" required minlength="8">
            <span class="info-text"> <span class="fas fa-1x fa-times-circle"></span> invalid password. must be at least 8 characters long </span>

            <input type="submit" value="log in">

            <a href="">
                forgot password
            </a>

            <a href="./signup.php">or, sign up instead</a>
    </form>
</body>
</html>