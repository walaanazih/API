<?php
//session_start();
//include_once 'common.php';

//add user
//if (isset($_POST['btnaddsection'])) {
/*$title_en = $_POST['title_en'];
$title_ar = $_POST['title_ar'];
echo $title_en;
exit();

$data = array("title_en" => $title_en, "title_ar" => $title_ar);

$jsonurl = "http://localhost/task2/sections.php";
$curl = curl_init();
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
$result = curl_exec($curl);

curl_close($curl);

header('Location:sections.php');

//}*/

include_once "common.php";

if(isset($_POST['btnadddept'])){
$title_en = check_input($_POST['title_en']);
$title_ar = check_input($_POST['title_ar']);
$section = array();
if (empty($title_en)) {
    response(400, "English Title is empty", null);
} elseif (!preg_match("/^[a-zA-Z-' ]*$/", $title_en)) {
    response(400, "English Title (English letters only)", null);
} elseif (empty($title_ar)) {
    response(400, "Arabic Title is empty", null);
} elseif (!preg_match("~^[\-+,()/'\s\p{Arabic}]{1,60}$~iu", $title_ar)) {
    response(400, "Arabic Title (Arabic letters only)", null);
} else {
    
    $section['title_en'] = $title_en;
    $section['title_ar'] = $title_ar;

    /*$method="GET";
    $url = "http://localhost/task2/insert.php?title_en=$title_en&title_ar=$title_ar";
    $sectionApi = callAPI($method, $url, false);
    $response = json_decode($sectionApi, true);*/
}
    $method="POST";
    $url = "http://localhost/task2/insert.php";
    $sectionApi = callAPI($method, $url, json_encode($section));
    $response = json_decode($sectionApi, true);


    print_r($response);
    exit();


    //$sectioApi = json_encode($section);
    //insert_section($section);
    header('Location:sections.php');
}


if(isset($_POST['btneditsection'])){
    $id = $_POST['id'];
    $title_en = check_input($_POST['title_en']);
    $title_ar = check_input($_POST['title_ar']);
    $section = array();
    if (empty($title_en)) {
        response(400, "English Title is empty", null);
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $title_en)) {
        response(400, "English Title (English letters only)", null);
    } elseif (empty($title_ar)) {
        response(400, "Arabic Title is empty", null);
    } elseif (!preg_match("~^[\-+,()/'\s\p{Arabic}]{1,60}$~iu", $title_ar)) {
        response(400, "Arabic Title (Arabic letters only)", null);
    } else {
        
        $section['id'] = $id;
        $section['title_en'] = $title_en;
        $section['title_ar'] = $title_ar;
        $sectioApi = json_encode($section);
        edit_section($section);
        header('Location:sections.php');
    }
    }

    if(isset($_POST['btneditdepartment']))
    {
        $section_select = $_POST['section_select'];
        $dept_ar = $_POST['dept_ar'];
        $dept_en = $_POST['dept_en'];
        $deptid = $_POST['id'];
        
        $method="POST";
        $urlval = "http://localhost:8012//task2/valupdate.php";
        $data = array('dept'=>$deptid,'dept_ar'=>$dept_ar,'dept_en'=>$dept_en,'title_ar'=>$dept_ar,'title_en'=> $dept_en,'section_select'=> $section_select);

 $ch = curl_init( $urlval );
 $payload = json_encode($data );
 curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
 curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
 curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
 curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
 $result = curl_exec($ch);
 curl_close($ch);
 echo "<pre>" . $result. "</pre>";
        
    }
    