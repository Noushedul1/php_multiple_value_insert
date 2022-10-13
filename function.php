<?php
function mysqli_prep($str) {
    global $conn;
    $result = mysqli_real_escape_string($conn,$str);
    return $result;
}
?>