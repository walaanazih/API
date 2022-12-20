<?php
include_once "include/connection.php";
header("Content-Type:application/json");
include_once "common.php";
$data = json_decode(file_get_contents('php://input'), true);


    if (empty($data['title_ar'])) 
	{
		$value_arErr = "value_ar is required\n";
		//return $nameErr;
      response(200,"value_ar is required",NULL);
  
	  } 
	  else 
	  {
        if (!preg_match("~^[\-+,()/'\s\p{Arabic}]{1,60}$~iu",$data['title_ar'])) 
        {
          $value_arErr= "Only arabic letters and white space allowed\n";
          response(200,"Only arabic letters and white space allowed\n",NULL);
        }
        else
{
	            $value_arErr = "";
			//return $value_arErr;	
}
      }

 /////////////////////////////////////////////////

      if (empty($data['title_en'])) {
		$value_enErr = "value_en is required\n";
		response(200,"value_en is required",NULL);
	  } 
	  else
	  {
$check_pattern ="/^[a-zA-Z-' ]*$/";

if(!preg_match($check_pattern, $data['title_en']))
{
	 $value_enErr = "value_en must contain english value_en\n";
     response(200,"value_en must contain english value_en\n",NULL);
}
else
{
	            $value_enErr = "";
		//	return $value_enErr;	
}

}
////////////////////////////////////////////////////
//$data = array('dept'=>$deptid,'dept_ar'=>$dept_ar,'dept_en'=>$dept_en,'title_ar'=>$title_ar,'title_en'=> $title_en,'section_select'=> $section_select);

if($value_enErr == "" && $value_arErr == "")
{
//print_r("inserrt");
  $sql="UPDATE `department` SET `id`=?,`dept_ar`=?,`dept_en`=?,`fk_sec`=? WHERE `id`=?";

$stmt2 = $con->prepare($sql);
$stmt2->bind_param("sssss",$data['dept'],$data['title_ar'],$data['title_en'],$data['section_select'],$data['dept']);

$stmt2->execute();
$afrow=$stmt2->affected_rows;
	
     if ($afrow > 0){
  
      echo"success update  department";
  }
  else
  {
      echo"not success update  department";
  }
}


?>






    
 
   
    



