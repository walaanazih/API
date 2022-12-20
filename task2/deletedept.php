<?php
include_once "include/connection.php";
include_once  "common.php";

//echo $_GET['dept_id'];

$dept_id =$_GET['dept_id'];

$sql = "DELETE FROM `department` WHERE  `id`=?";
$stmt = $con->prepare($sql);
$stmt->bind_param('i', $dept_id);
if (mysqli_stmt_execute($stmt)) {
    response(200, "Data deleted success", NULL);
}
?>