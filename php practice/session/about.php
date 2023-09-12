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
        session_start();
        echo '<h1>Your name is: '.$_SESSION['name'].'</h1>';
        echo '<h1>Your Father name is: '.$_SESSION['fname'].'</h1>';
        echo '<h1>Your Email is: '.$_SESSION['email'].'</h1>';
    ?>
    <a href="./logout.php"><button>Destroy Session</button></a>
    <a href="./index.php"><button>Go back to Start session</button></a>
</body>
</html>