<?php
include_once "include/connection.php";
header("Content-Type:application/json");

if(isset($_GET['sec_id'])){
    $sec_id = $_GET['sec_id'];
}else{
    $sec_id = -1;
}

    $con = get_db_connection();
    $sql = "SELECT `id`, `title_en`, `title_ar` FROM `sections` Where `id`=? or -1 = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('ss', $sec_id,$sec_id);
    $stmt->execute();
    mysqli_stmt_bind_result($stmt,$id,$title_en,$title_ar);
    $sections = [];
    while (mysqli_stmt_fetch($stmt)) {
        array_push($sections, [
            'id' => $id,
            'title_en' => $title_en,
            'title_ar' => $title_ar
        ]);
    }
    print_r(json_encode($sections));



