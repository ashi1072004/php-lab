<?php
include("./connection.php");
$sid = $_GET['sid'];
$sql = "SELECT * FROM `std` WHERE `sid`=$sid";
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
    if (!empty($spic)) {
        $exe = pathinfo($spic, PATHINFO_EXTENSION);
        $ar = array("png", "jpg ", "jpeg");
        if (in_array($exe, $ar)) {
            $p = rand(10000, 90000) . "." . $exe;
            $pid = $fet['spic'];
            $my = "UPDATE `std` SET `sname` = '$sname',`sfname`='$sfname',`sgmail`='$sgmail',`smobile`='$smobile',
                   `saddress`='$saddress',`sgen`='$sgen',`spic`='$p' WHERE `sid`='$sid'";
            $run = mysqli_query($con, $my);
            if ($run) {
                move_uploaded_file($_FILES['spic']['tmp_name'], "./img/" . $p);
                $msg = "Data Has Been Updated";
                header("refresh:2,url=./singleview.php");
            } else {
                $msg = "Data Has Not Been Inserted";
            }
        } else {
            $msg = "Picture Is Not Right";
        }
    } else {
        $p = $fet['spic'];
        $sql = "UPDATE `std` SET `sname` = '$sname',`sfname`='$sfname',`sgmail`='$sgmail',`smobile`='$smobile',
        `saddress`='$saddress',`sgen`='$sgen',`spic`='$p' WHERE `sid`='$sid'";
        $run = mysqli_query($con, $sql);
        if ($run) {
            $msg = "Data Has Been Updated. You Have Not Choose A Pic";
            header("refresh:2,url=./singleview.php");
        } else {
            $msg = "Data Has Not Been Updated";
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
                    <input value="<?php echo $fet['sname']; ?>" type="text" placeholder="Eneter Name" name="sname">
                </div>
                <div>
                    <label>Father Name</label>
                    <input value="<?php echo $fet['sfname']; ?>" type="text" placeholder="Eneter Fathername" name="sfname">
                </div>
                <div>
                    <label>Gmail</label>
                    <input value="<?php echo $fet['sgmail']; ?>" type="email" placeholder="Eneter Gmail" name="sgmail">
                </div>
                <div>
                    <label>Mobile</label>
                    <input value="<?php echo $fet['smobile']; ?>" type="number" placeholder="Eneter Mobile" name="smobile">
                </div>
                <div>
                    <label>Address</label>
                    <textarea value="<?php echo $fet['saddress']; ?>" row="3" name="saddress"> </textarea>
                </div>
                <div>
                    <lable>Gender</lable>
                    <?php
                    $d = $fet['sgen'];
                    if ($d == "male") {
                        $m = "selected";
                    } else {
                        $f = "selected";
                    }
                    ?>
                    <select name="sgen">
                        <option selected>select one</option>
                        <option value="male" <?php echo @$m; ?>>Male</option>
                        <option value="female" <?php echo @$f; ?>>FeMale</option>
                    </select>

                </div>
                <div>
                    <label> User pic </label>
                    <input type="file" name="spic">
                </div>
                <input name="sub" type="submit" value="updated">
            </form>
        </div>
    </div>

</body>

</html>