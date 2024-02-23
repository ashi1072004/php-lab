<?php
include("./connection.php");
?>
<!doctype html>
<html>

<head>
    <title></title>
</head>

<body>
    <div style="text-align: center;">
        <div>
            <table style="height: 700px;;text-decoration:none; width : 1200px;">
                <thead>
                    <caption>Student Record</caption>
                    <tr>
                        <th>Name</th>
                        <th>SurName</th>
                        <th>Gmail</th>
                        <th>Mobile No</th>
                        <th>CNIC</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Subject</th>
                        <th>Pic</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `tsd`";
                    $run = mysqli_query($con, $sql);
                    while ($fet = mysqli_fetch_assoc($run)) {
                    ?>
                        <tr>
                            <td><?php echo $fet['tname']; ?></td>
                            <td><?php echo $fet['tsurname']; ?></td>
                            <td><?php echo $fet['tgmail']; ?></td>
                            <td><?php echo $fet['tmobile']; ?></td>
                            <td><?php echo $fet['tcnic']; ?></td>
                            <td><?php echo $fet['tgen']; ?></td>
                            <td><?php echo $fet['taddress']; ?></td>
                            <td><?php echo $fet['tsubject']; ?></td>
                            <td><img src="<?php echo "./img/" . $fet['tpic']; ?>" width="100px;"></td>
                            <td><a href="./teacherupdate.php?tid=<?php echo $fet['tid']; ?>" style="text-decoration: none; background : green; color : white;"> Update</a></td>
                            <td><a href="./teacherdelete.php?tid=<?php echo $fet['tid']; ?>" style="text-decoration: none; background : red; color : white;"> Delete</a></td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>

    </div>

</body>

</html>