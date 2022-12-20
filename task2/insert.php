<?php
include_once "include/connection.php";
include_once "common.php";
header("Content-Type:application/json");

    $con = get_db_connection();
    $title_en = $_POST['title_en'];
    $title_ar = $_POST['title_ar'];
    $section = array();

    $sql = "INSERT INTO `sections` (`title_en`, `title_ar`) VALUES (?,?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('ss', $title_en, $title_ar);
    if (mysqli_stmt_execute($stmt)) {
        response(200, "Data inserted success", $data);
    }
    array_push($section, [
        'title_en' => $title_en,
        'title_ar' => $title_ar
    ]);
    print_r(json_encode($section));