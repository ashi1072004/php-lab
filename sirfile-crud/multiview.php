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
                <th>Father Name</th>
                <th>Gmail</th>
                <th>Mobile No</th>
                <th>Address</th>
                <th>Gender</th>
                <th>Pic</th>
                <th>Update</th>
                <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `std1`";
                $run = mysqli_query($con, $sql);
                while ($fet = mysqli_fetch_assoc($run)) {
                ?>
                    <tr>
                        <td><?php echo $fet['sname']; ?></td>
                        <td><?php echo $fet['sfname']; ?></td>
                        <td><?php echo $fet['sgmail']; ?></td>
                        <td><?php echo $fet['smobile']; ?></td>
                        <td><?php echo $fet['saddress']; ?></td>
                        <td><?php echo $fet['sgen']; ?></td>
                        <td>
                            <?php  
                            $f = unserialize($fet['spic']);
                            foreach($f as $t){
                                ?>
                                <img src="<?php echo "./img/".$t; ?>"width="100px;">
                                
                                <?php
                            }
                            ?>
                         </td>
                        <td><a href="./multiupdate.php?sid=<?php echo $fet['sid']; ?>" style="text-decoration: none; background: green; color: white;">Update</a></td>
                        <td><a href="./multidelete.php?sid=<?php echo $fet['sid']; ?>" style="text-decoration: none; background : red; color : white;">Delete</a></td>
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