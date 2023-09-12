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
        echo '<h1>Your Name Is: '.$_COOKIE['name'].'</h1>';
        echo '<h1>Your Name Is: '.$_COOKIE['fname'].'</h1>';
        echo '<h1>Your Name Is: '.$_COOKIE['email'].'</h1>';
    ?>
    <a href="./logout.php"><button>Expire Cookies</button></a>
    <a href="./index.php"><button>Go back to Set cookies</button></a>
</body>
</html>