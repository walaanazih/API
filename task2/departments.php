<style>
table {
    border: 0.5px solid black;
    font-size: 16px;
    font-family: 'Droid Arabic Naskh', serif;
}

#add:hover {
    text-decoration: none;
}
</style>


<?php
include_once "include/connection.php";
include_once "common.php";
include_once "header.php";

$method="GET";
		$url = "http://localhost:8012//task2/select_department.php";
       // $header = array('USERTOKEN:' . GenerateToken());
        $departmentsApi = callAPI($method, $url, false);
        $response = json_decode($departmentsApi, true);
        foreach ($response as $department) {
            $deptid=  $department['id'];
            $fk_sec=  $department['fk_sec'];
            $dept_ar=  $department['dept_ar']; 
            $dept_en=  $department['dept_en']; 
            $title_ar=  $department['title_ar']; 
            $title_en=  $department['title_en'];
            if(isset($_POST['btneditdept'.$deptid.'']))
            {
                //echo $deptid;
                $method="POST";
                $urlval = "http://localhost:8012//task2/editdept.php";
                $data = array('dept'=>$deptid,'dept_ar'=>$dept_ar,'dept_en'=>$dept_en,'title_ar'=>$title_ar,'title_en'=> $title_en,'fk_sec'=> $fk_sec);
       
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

        }

      
?>

<label>
    <a href="adddepartment.php" class="btn btn-info">add department</a>
</label>

<form method="post" >
<table class="table table-striped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>id</th>
            <th>depatment Title AR</th>
            <th>department Title EN</th>
            <th>section Title AR</th>
            <th>section Title EN</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

        <?php

foreach ($response as $department) {
   $deptid= $department['id'];
   ?>
	
        <tr style="text-align: center;">
            <td><?php echo $department['id']; ?></td>
            <td><?php echo $department['dept_ar']; ?></td>
            <td><?php echo $department['dept_en']; ?></td>
            <td><?php echo $department['title_ar']; ?></td>
            <td><?php echo $department['title_en']; ?></td>
            <td>
        <!--        <a class="btn btn-success" href="editdepartment.php?sec_id=<?php echo $department['id']; ?>">Update</a>  -->
      <?php
       echo ' 
        <input type="submit"  name="btneditdept'.$deptid.'"  id="btneditdept'.$deptid.'"  value="update department"
            style="width:10em ;height:2em;font-size:18px;" class="btn btn-success" />';
			?>
                <a class="btn btn-danger" href="deletedept.php?dept_id=<?php echo $department['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php
}

?>

    </tbody>
</table>
</form>
</div>