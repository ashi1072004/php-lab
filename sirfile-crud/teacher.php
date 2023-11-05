<?php 
 include("./connection.php");
 if (isset($_POST['sub'])){
    $tname = mysqli_real_escape_string($con,$_POST['tname']);
    $tsurname = mysqli_real_escape_string($con,$_POST['tsurname']);
    $tgmail = mysqli_real_escape_string($con,$_POST['tgmail']);
    $tmobile = mysqli_real_escape_string($con,$_POST['tmobile']);
    $tcnic = mysqli_real_escape_string($con,$_POST['tcnic']);
    $tgen = mysqli_real_escape_string($con,$_POST['tgen']);
    $taddress = mysqli_real_escape_string($con,$_POST['taddress']);
    $tsubject = mysqli_real_escape_string($con,$_POST['tsubject']);   
    $tpic = $_FILES['tpic']['name'];
    $exe=pathinfo($tpic, PATHINFO_EXTENSION);
    $ar=array("png","jpg","jpeg");
    if(in_array($exe,$ar)){
        $pi = rand(10000,90000).".".$exe;
        $my = "INSERT INTO `tsd`(`tname`,`tsurname`,`tgmail`,`tmobile`,`tcnic`,`tgen`,`taddress`,`tsubject`,`tpic`) 
        VALUES('$tname','$tsurname','$tgmail','$tmobile','$tcnic','$tgen','$taddress','$tsubject','$tpic')";
    
    $run = mysqli_query($con,$my);
    if($run){
        move_uploaded_file($_FILES['tpic']['tmp_name'], "./img/" . $pi);
        $msg = "Data Has Been Inserted";
    }else{
        $msg ="Data Not Has Been Inserted";
    }
 }else{
    $msg = "Image Is Not Right";
}

}
?>

<!DOCTYPE html>
<html>
<title></title>

<body>

<div>
    <h1><?php
    echo  @$msg;  ?></h1>
    <div style="text-align: center; background:skyblue ; margin : 00px 400px; padding : 50px 0px;">
        <form method="post" enctype="multipart/form-data">
            <div>
                <label>Name</label><br>
                <input name="tname" placeholder="Enter Name" type="text">
            </div><br>
            <div>
                <label>Sur-Name</label><br>
                <input name="tsurname" placeholder="Enter Sur-Name" type="text">
            </div><br>
            <div>
                <label>Gmail</label><br>
                <input name="tgmail" placeholder="Enter Gmail" type="email">
            </div><br>
            <div>
                <label>Mobile</label><br>
                <input name="tmobile" placeholder="Enter mobile" type="number">
            </div><br>
            <div>
                <label>Cnic</label><br>
                <input name="tcnic" placeholder="Enter cnic" type="number">
            </div><br>
            <div>
                <label>Gender</label>
                <select name="tgen">
                    <option selected>Select One</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div><br>
            <div>
                <label>Address</label><br>
                <textarea rows="3" name="taddress"></textarea>
            </div><br>
            <div>
                <label>subject</label><br>
                <input name="tsubject" placeholder="Enter subject" type="text">
            </div><br>
            <div><br>
                <lable>User Pic</lable><br>
                <input type="file" name="tpic">
            </div><br>
            <input type="submit" value="submit" name="sub">
        </form>
    </div>
</div>

</body>
</html>