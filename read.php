<?php
$conn = mysqli_connect("localhost","root","","government");
include "./function.php";
$sql = "SELECT * FROM people";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
    $i =1;
    while($row = mysqli_fetch_array($result)){
?>
    <tr>
        <td><?= $i++ ?></td>
        <td><?= mysqli_prep($row['fname']) ?></td>
        <td><?= mysqli_prep($row['city']) ?></td>
        <td><?= mysqli_prep($row['age']) ?></td>
    </tr>
<?php }?>
<?php } else {?>
    <tr colspan="4">
        <td><?php echo "There is no data"; ?></td>
    </tr>
<?php }?>