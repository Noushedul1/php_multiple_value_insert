<?php
$conn = mysqli_connect("localhost","root","","government");
include "./function.php";
foreach($_POST['fname'] as $key => $value) {
    $sql = "INSERT INTO people(fname,city,age) VALUES('".$value."','".$_POST['city'][$key]."','".$_POST['age'][$key]."')";
    $result = mysqli_query($conn,$sql);
}
?>