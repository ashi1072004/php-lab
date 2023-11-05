<?php
    include('../connection.php');

    // $sql = "SELECT * FROM `std` s INNER JOIN `teacher` t ON s.teachid=t.tid";
    // $sql = "SELECT * FROM `std` s LEFT JOIN `teacher` t ON s.teachid=t.tid";
    // $sql = "SELECT * FROM `std` s RIGHT JOIN `teacher` t ON s.teachid=t.tid";
    // $sql = "SELECT * FROM `std` s RIGHT JOIN `teacher` t ON s.teachid=t.tid UNION SELECT * FROM `std` s LEFT JOIN `teacher` t ON s.teachid=t.tid ORDER BY `srollno`";
    // $sql = "SELECT * FROM `std` s RIGHT JOIN `classtime` ct ON s.classtime=ct.ctid ORDER BY `srollno`";
    // $sql = "SELECT * FROM `std` s LEFT JOIN `teacher` t ON s.teachid=t.tid LEFT JOIN `classtime` ct ON s.classtime=ct.ctid ORDER BY `srollno` ";
    
    $sql = "SELECT * FROM `std` s INNER JOIN `teacher` t ON s.teachid=t.tid INNER JOIN `classtime` ct ON s.classtime=ct.ctid";

    $run = mysqli_query($conn, $sql);
    while( $select = mysqli_fetch_array($run, MYSQLI_ASSOC)){
    // echo "<pre>";
    // print_r($select);
    // echo "</pre>";

    // if($select['teachid']=='0'){
    //   $teachid = NULL;
    // }else{
    //   $teachid = $select['teachid'];
    // }
    ?>
    <tr>
        <!-- <th><?php //echo $select['sid'] ?></th> -->
        <td><?php echo $select['tid'] ?></td>
        <td><img src="./singleimg/<?php echo $select['tpic'] ?>" alt="No Img Found" width="70" height="70"></td>
        <td><?php echo $select['tname'] ?></td>
        <!-- <td><?php //echo $select['ctid'] ?></td> -->
        <td><?php echo $select['cttime'] ?></td>
        <td><?php echo $select['cname'] ?></td>
        <td><?php echo $select['srollno'] ?></td>
        <!-- <td><?php //echo $teachid ?></td> -->
        <td><img src="./singleimg/<?php echo $select['spic'] ?>" alt="No Img Found" width="70" height="70"></td>
        <td><?php echo $select['sname'] ?></td>
        <td><?php echo $select['sfname'] ?></td>
        <td><?php echo $select['smobile'] ?></td>
        <td><?php echo $select['scnic'] ?></td>
        <td><?php echo $select['semail'] ?></td>
        <td><?php echo $select['sdate'] ?></td>
        <td><a href="./student-update.php?sid=<?php echo $select['sid'] ?>" class="btn btn-success">Update</a></td>
        <td><button type="button" data-id="<?php echo $select['sid'] ?>" class="btn btn-danger delete">Delete</button></td>
    </tr>
    <?php
    }
?>