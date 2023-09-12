<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        button{
            padding: 10px 20px;
            margin: 10px 20px;
            color: tomato;
            border: 2px solid tomato;
            border-radius: 10px;
            font-weight: bold;
        }
        a{
            text-decoration: none;
        }
        button:hover{
            background-color: tomato;
            color: white;
        }
    </style>
</head>
<body>
    <?php
        echo '<h1>Cookies Set</h1>';

        setcookie('name', 'Usman', time() + 5, '/');
        setcookie('fname', 'Ali', time() + 7, '/');
        setcookie('email', 'usmanali@gmail.com', time() + 9, '/');
    ?>
    <a href="./about.php"><button>Show Cookies</button></a>
</body>
</html>