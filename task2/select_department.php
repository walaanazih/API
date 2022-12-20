<?php
include_once "include/connection.php";
header("Content-Type:application/json");

$con = get_db_connection();
$sql = "SELECT distinct `department`.`id`,`department`.`dept_ar`,`department`.`dept_en`,`department`.`fk_sec`,`sections`.`title_en`,`sections`.`title_ar` FROM `department`,`sections` where `department`.`fk_sec`=`sections`.`id` order by `department`.`id`";
$stmt = $con->prepare($sql);
$stmt->execute();
mysqli_stmt_bind_result($stmt,$id,$dept_ar,$dept_en,$fk_sec,$title_en,$title_ar);
$departments = [];
while (mysqli_stmt_fetch($stmt)) {
    array_push($departments, [
        'id' => $id,
        'dept_ar' => $dept_ar,
        'dept_en' => $dept_en,
        'fk_sec' => $fk_sec,
        'title_en' => $title_en,
        'title_ar' => $title_ar
                   
    ]);
}
print_r(json_encode($departments));




