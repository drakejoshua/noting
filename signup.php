<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noting - Sign Up</title>
    <?php
        include('./stylesheets.php');
    ?>
    <link rel="stylesheet" href="./styles/signup.css">
</head>
<body>
    <?php
        include('header.php');
        require('db_connect_file.php');

        if ( isset($_POST['name']) ) {
            $queryCursor = $mySqlDbHandle->query("
                INSERT INTO users( name, email, phone, password )
                VALUES ( '$_POST[name]', '$_POST[email]', '$_POST[phone]', '$_POST[password]' )
            ");
            
            header('Location: ./login.php');
        }

    ?>
    

    <form action="signup.php" method="POST">
            <h1> create new account </h1>
            <p> fill your credentials below or sign up using google or facebook </p>

            <div>
                <label for="name"> name: </label>
                <input type="name" name="name" id="name" placeholder="joseph noting" required minlength="1">
                <span class="info-text"> <span class="fas fa-1x fa-times-circle"></span> invalid name. a name must be provided </span>

                <label for="email"> email: </label>
                <input type="email" name="email" id="email" placeholder="joseph@notingall.com" required>
                <span class="info-text"> <span class="fas fa-1x fa-times-circle"></span> invalid email address</span>

                <label for="phone"> phone: </label>
                <input type="tel" name="phone" id="phone" placeholder="1234567890" required minlength="11" maxlength="11">
                <span class="info-text"> <span class="fas fa-1x fa-times-circle"></span> invalid phone number. must be 11 characters long </span>

                <label for="password"> password: </label>
                <input type="password" name="password" id="password" placeholder="joseph loves noting" required minlength="8">
                <span class="info-text"> <span class="fas fa-1x fa-times-circle"></span> invalid password. must be at least 8 characters long </span>
            </div>

            <input type="submit" value="sign up">

            <a href="./login.php">
                or, log in instead
            </a>
    </form>
</body>
</html>