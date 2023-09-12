<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
     if(isset($_POST['sub'])){
         $fnum=$_POST['fnum'];
          $snum=$_POST['snum'];
          $tnum=$_POST['tnum'];
     }
    ?>
    <center>
    <form method="post">
        <label >Enter first Value</label>
        <br>
        <input type="number" name="fnum" />
        <br><br>
        <label >Enter 2nd Value</label>
        <br>
        <input type="number" name="snum" />
        <br><br>
        <label >Enter table Value</label>
        <br>
        <input type="number" name="tnum" />
        <br><br>
        <input type="submit" value="submit" name="sub" />
    </form>
    </center>
    <table border="1" width="900" align="center" cellspacing="5" cellpadding="15" style="background-color:black; color:white;">
         <?php 
            $tab=@$tnum;
            $a=@$fnum;
            while($a<=@$snum){
              ?>
              <tr>
                <th><?php echo $tab; ?></th>
                <th><?php echo "x"; ?></th>
                <th><?php echo $a; ?></th>
                <th><?php echo "="; ?></th>
                <th><?php echo $tab*$a; ?></th>
              </tr>
              <?php
                $a++;
            }
         ?>  
    </table>
</body>
</html>