<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        include('./stylesheets.php');
    ?>
    <link rel="stylesheet" href="./styles/about.css">
    <title>About Noting</title>
</head>
<body>
    <?php
        include('./header.php');
    ?>

    <section id="info">
        <h1> about noting</h1>

        <div>
            <h2> Who are we? </h2>

            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Officia nobis natus explicabo aliquid delectus quibusdam harum ab consequatur dolor iste aut, 
                cum libero itaque sint tenetur nesciunt saepe hic doloribus.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Officia nobis natus explicabo aliquid delectus quibusdam harum ab consequatur dolor iste aut, 
                cum libero itaque sint tenetur nesciunt saepe hic doloribus.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Officia nobis natus explicabo aliquid delectus quibusdam harum ab consequatur dolor iste aut, 
                cum libero itaque sint tenetur nesciunt saepe hic doloribus.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Officia nobis natus explicabo aliquid delectus quibusdam harum ab consequatur dolor iste aut, 
                cum libero itaque sint tenetur nesciunt saepe hic doloribus.
            </p>
        </div>

        <div>
            <h2> what do we do? </h2>

            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Officia nobis natus explicabo aliquid delectus quibusdam harum ab consequatur dolor iste aut, 
                cum libero itaque sint tenetur nesciunt saepe hic doloribus.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Officia nobis natus explicabo aliquid delectus quibusdam harum ab consequatur dolor iste aut, 
                cum libero itaque sint tenetur nesciunt saepe hic doloribus.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Officia nobis natus explicabo aliquid delectus quibusdam harum ab consequatur dolor iste aut, 
                cum libero itaque sint tenetur nesciunt saepe hic doloribus.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Officia nobis natus explicabo aliquid delectus quibusdam harum ab consequatur dolor iste aut, 
                cum libero itaque sint tenetur nesciunt saepe hic doloribus.
            </p>
        </div>

        <div>
            <h2> Who are we located and where do we operate? </h2>

            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Officia nobis natus explicabo aliquid delectus quibusdam harum ab consequatur dolor iste aut, 
                cum libero itaque sint tenetur nesciunt saepe hic doloribus.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Officia nobis natus explicabo aliquid delectus quibusdam harum ab consequatur dolor iste aut, 
                cum libero itaque sint tenetur nesciunt saepe hic doloribus.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Officia nobis natus explicabo aliquid delectus quibusdam harum ab consequatur dolor iste aut, 
                cum libero itaque sint tenetur nesciunt saepe hic doloribus.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Officia nobis natus explicabo aliquid delectus quibusdam harum ab consequatur dolor iste aut, 
                cum libero itaque sint tenetur nesciunt saepe hic doloribus.
            </p>
        </div>

        <div>
            <h2> What are our licenses? </h2>

            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Officia nobis natus explicabo aliquid delectus quibusdam harum ab consequatur dolor iste aut, 
                cum libero itaque sint tenetur nesciunt saepe hic doloribus.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Officia nobis natus explicabo aliquid delectus quibusdam harum ab consequatur dolor iste aut, 
                cum libero itaque sint tenetur nesciunt saepe hic doloribus.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Officia nobis natus explicabo aliquid delectus quibusdam harum ab consequatur dolor iste aut, 
                cum libero itaque sint tenetur nesciunt saepe hic doloribus.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Officia nobis natus explicabo aliquid delectus quibusdam harum ab consequatur dolor iste aut, 
                cum libero itaque sint tenetur nesciunt saepe hic doloribus.
            </p>
        </div>
    </section>

    <section id="contact">
        <h1>
            contact us
        </h1>
        <div>
            <h2>
                have a question/message for us?
            </h2>

            <form action="">
                <label for="name"> name: </label>
                <input type="text" name="name" id="name" placeholder="joseph noting" required>

                <label for="email"> email: </label>
                <input type="email" name="email" id="email" placeholder="joseph@notingall.com" required>

                <label for="phone"> phone: </label>
                <input type="tel" name="phone" id="phone" placeholder="123-456-7890">

                <label for="message">message: </label>
                <textarea name="message" id="message" placeholder="write your message" rows="10" required></textarea>

                <input type="submit" value="send message">
        </form>
        </div>
    </section>

    <?php
        include('./footer.php');
    ?>
</body>
</html>