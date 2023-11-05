<?php
include("./connection.php");
$sid = $_GET['sid'];
$sql = "SELECT * FROM `std1` WHERE `sid`=$sid";
$run = mysqli_query($con, $sql);
$fet = mysqli_fetch_assoc($run);


if (isset($_POST['sub'])) {
    $sname = mysqli_real_escape_string($con, $_POST['sname']);
    $sfname = mysqli_real_escape_string($con, $_POST['sfname']);
    $sgmail = mysqli_real_escape_string($con, $_POST['sgmail']);
    $smobile = mysqli_real_escape_string($con, $_POST['smobile']);
    $saddress = mysqli_real_escape_string($con, $_POST['saddress']);
    $sgen = mysqli_real_escape_string($con, $_POST['sgen']);
    $spic = $_FILES['spic']['name'];
    $p = array();
    if (!empty($pic[0])) {
        foreach ($spic as $va) {
            $exe = strtolower(pathinfo($va, PATHINFO_EXTENSION));
            $arr = array("png", "jpg", "jpeg");
            if (in_array($exe, $arr)) {
                $p[] = rand(10000, 90000) . "." . $exe;
                $msg = "right";
            } else {
                $msg = "Not right";
                break;
            }
        }
        if ($msg == "right") {
            $x = unserialize($fet['spic']);
            foreach ($x as $r) {
                unlink("./img" . $r);
            }
        }
        if ($msg == "right") {
            $pi = serialize($p);
            $sql = "UPDATE `std1` SET `sname` = '$sname' , `sfname` = '$sfname', `sgmail` ='$sgmail', `smobile` = '$smobile',`saddress`='$saddress',`sgen`='$sgen',`spic`=$pi;";
            $run = mysqli_query($con, $sql);
            if ($run) {
                foreach ($p as $key => $d) {
                    move_uploaded_file($_FILES['spic']['tmp_name'][$key], "./img/" . $d);
                }
                $msg = "Data Has Been Updated";
                header("Refresh:2,url=./multiview.php");
            } else {
                $msg = "Data Has Not Been Updated";
            }
        } else {
            $msg = "Image Is Not Right";
        }
    } else {
        $pi = $fet['spic'];
        $sql = "UPDATE `std1` SET `sname` = '$sname' , `sfname` = '$sfname', `sgmail` ='$sgmail', `smobile` = '$smobile',`saddress`='$saddress',`sgen`='$sgen',`spic`=$pi;";
        
        $run = mysqli_query($con, $sql);
        if ($run) {
            $msg = "Data Has Been Updated And You Have Not Select Image";
            header("refresh:2,url=./multiview.php");
        }
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <h1>
        <?php echo @$msg; ?>
    </h1>
    <div>
        <div>
            <form method="post" enctype="multipart/form-data">
                <div>
                    <label>Name</label>
                    <input name="sname" type="text" placeholder="Eneter Name" value="<?php echo $fet['sname']; ?>">
                </div>
                <div>
                    <label>Father Name</label>
                    <input name="sfname" type="text" placeholder="Eneter Father Name" value="<?php echo $fet['sfname']; ?>">
                </div>
                <div>
                    <label>Gmail</label>
                    <input name="sgmail" type="email" placeholder="Eneter Gmail" value="<?php echo $fet['sgmail']; ?>">
                </div>
                <div>
                    <label>Mobile</label>
                    <input name="smobile" type="number" placeholder="Eneter Mobile" value="<?php echo $fet['smobile']; ?>">
                </div>
                <div>
                    <label>Address</label>
                    <textarea name="saddress" row="3" value="<?php echo $fet['saddress']; ?>"> </textarea>
                </div>
                <div>
                    <lable>Gender</lable>
                    <?php
                    $d = $fet['spic'];
                    if ($d == "male") {
                        $m = "selected";
                    } else {
                        $f = "selected";
                    }
                    ?>
                    <select name="sgen">
                        <option selected>select one</option>
                        <option value="male" <?php echo @$m; ?> >Male</option>
                        <option value="female" <?php echo @$f; ?> >FeMale</option>
                    </select>

                </div>
                <div>
                    <label> User pic </label>
                    <input type="file" multiple name="spic[]">
                </div>
                <input name="sub" type="submit" value="update">
            </form>
        </div>
    </div>

</body>

</html>