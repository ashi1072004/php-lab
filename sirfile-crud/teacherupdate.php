<?php
include("./connection.php");
$tid = $_GET['tid'];
$sql = "SELECT * FROM `tsd` WHERE `tid`=$tid";
$run = mysqli_query($con, $sql);
$fet = mysqli_fetch_assoc($run);

if (isset($_POST['sub'])) {
    $tname = mysqli_real_escape_string($con, $_POST['tname']);
    $tsurname = mysqli_real_escape_string($con, $_POST['tsurname']);
    $tgmail = mysqli_real_escape_string($con, $_POST['tgmail']);
    $tmobile = mysqli_real_escape_string($con, $_POST['tmobile']);
    $tcnic = mysqli_real_escape_string($con, $_POST['tcnic']);
    $tgen = mysqli_real_escape_string($con, $_POST['tgen']);
    $taddress = mysqli_real_escape_string($con, $_POST['taddress']);
    $tsubject = mysqli_real_escape_string($con, $_POST['tsubject']);
    $tpic = $_FILES['tpic']['name'];
    if (!empty($tpic)) {
        $exe = pathinfo($tpic, PATHINFO_EXTENSION);
        $ar = array("png", "jpg ", "jpeg");
        if (in_array($exe, $ar)) {
            $p = rand(10000, 90000) . "." . $exe;
            $pid = $fet['tpic'];
            $my = "UPDATE `tsd` SET `tname` = '$tname',`tsurname`='$tsurname',`tgmail`='$tgmail',`tmobile`='$tmobile',
                   `tcnic`='$tcnic',`tgen`='$tgen', `taddress`='$taddress',`tsubject`='$tsubject',`tpic`='$p' WHERE `tid`='$tid'";
            $run = mysqli_query($con, $my);
            if ($run) {
                move_uploaded_file($_FILES['tpic']['tmp_name'], "./img/" . $p);
                $msg = "Data Has Been Updated";
                header("refresh:2,url=./tview.php");
            } else {
                $msg = "Data Has Not Been Inserted";
            }
        } else {
            $msg = "Picture Is Not Right";
        }
    } else {
        $p = $fet['tpic'];
        $sql = "UPDATE `tsd` SET `tname` = '$tname',`tsurname`='$tsurname',`tgmail`='$tgmail',`tmobile`='$tmobile',
        `tcnic`='$tcnic',`tgen`='$tgen',`taddress`='$taddress',`tpic`='$p' WHERE `tid`='$tid'";
        $run = mysqli_query($con, $sql);
        if ($run) {
            $msg = "Data Has Been Updated. You Have Not Choose A Pic";
            header("refresh:2,url=./tview.php");
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
                    <input value="<?php echo $fet['tname']; ?>" type="text" placeholder="Eneter Name" name="tname">
                </div>
                <div>
                    <label>Father Name</label>
                    <input value="<?php echo $fet['tsurname']; ?>" type="text" placeholder="Eneter Surname" name="tsurname">
                </div>
                <div>
                    <label>Gmail</label>
                    <input value="<?php echo $fet['tgmail']; ?>" type="email" placeholder="Eneter Gmail" name="tgmail">
                </div>
                <div>
                    <label>Mobile</label>
                    <input value="<?php echo $fet['tmobile']; ?>" type="number" placeholder="Eneter Mobile" name="tmobile">
                </div>
                <div>
                    <label>CNIC</label>
                    <input value="<?php echo $fet['tcnic']; ?>" type="number" placeholder="Eneter cnic" name="tcnic">
                </div>
                <div>
                    <lable>Gender</lable>
                    <?php
                    $d = $fet['tgen'];
                    if ($d == "male") {
                        $m = "selected";
                    } else {
                        $f = "selected";
                    }
                    ?>
                    <select name="tgen">
                        <option selected>select one</option>
                        <option value="male" <?php echo @$m; ?>>Male</option>
                        <option value="female" <?php echo @$f; ?>>FeMale</option>
                    </select>

                </div>
                <div>
                    <label>Address</label>
                    <textarea value="<?php echo $fet['taddress']; ?>" row="3" name="taddress"> </textarea>
                </div>
                <div>
                    <label>Subject</label>
                    <input value="<?php echo $fet['tsubject']; ?>" type="email" placeholder="Eneter Gmail" name="tsubject">
                </div>
                <div>
                    <label> User pic </label>
                    <input type="file" name="tpic">
                </div>
                <input name="sub" type="submit" value="updated">
            </form>
        </div>
    </div>

</body>

</html>