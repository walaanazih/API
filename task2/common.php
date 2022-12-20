<?php
include_once "include/connection.php";

function check_input($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function response($status, $status_message, $data)
{
    header("HTTP/1.1 " . $status);

    $response['status'] = $status;
    $response['status_message'] = $status_message;
    $response['data'] = $data;

    $json_response = json_encode($response);
    echo $json_response;
}
function insert_section($data)
{
    $con = get_db_connection();
    $title_en = $data['title_en'];
    $title_ar = $data['title_ar'];

    $sql = "INSERT INTO `sections` (`title_en`, `title_ar`) VALUES (?,?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('ss', $title_en, $title_ar);
    if (mysqli_stmt_execute($stmt)) {
        response(200, "Data inserted success", $data);
    }
}

function edit_section($data)
{
    $con = get_db_connection();
    $id = $data['id'];
    $title_en = $data['title_en'];
    $title_ar = $data['title_ar'];

    $sql = "UPDATE `sections` SET `title_en`=?,`title_ar`=? WHERE `id`=?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('sss', $title_en, $title_ar, $id);
    if (mysqli_stmt_execute($stmt)) {
        response(200, "Data updated success", $data);
    }
}

/*function select_sections($id){
    $con = get_db_connection();
    $sql = "SELECT `id`, `title_en`, `title_ar` FROM `sections` WHERE `id`=? or -1 = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('ss', $id,$id);
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
    return json_encode($sections);
}*/

 function CallAPI($method, $url, $data)
{
    $curl = curl_init();
    switch ($method)
    {
        case "GET":
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
            break;
        case "POST":
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
            break;
        case "DELETE":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE"); 
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			   'APIKEY: 111111111111111111111',
			   'Content-Type: application/json',
			));
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			// EXECUTE:
			$result = curl_exec($curl);
			if(!$result){die("Connection Failuree");}
			curl_close($curl);
			return $result;
}
