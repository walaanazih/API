<?php
//include_once 'header.php';
include_once 'common.php';
$method="GET";
$url = "http://localhost:8012//task2/select.php";
$sectionsApi = callAPI($method, $url, false);
$response = json_decode($sectionsApi, true);
//////////////////////////////////////////////////////////////////
$data = json_decode(file_get_contents('php://input'), true);

if(isset($data['dept'])){
    $dept = $data['dept'];
    $fk_sec = $data['fk_sec'];
    
  //  echo $dept;
 ?>
  <h3 align="center" style="color:#1a4395; font-family: 'Droid Arabic Naskh', serif;">Edit Section</h3>

  <form method="post" action="<?='action.php'?>">
  
  sections <span class="error">*</span> :   
<span class="error"></span>
      <select name="section_select" id="section_select" >

    <?php
     foreach ($response as $sections) {
        if($sections['id']==$fk_sec)
        {
      ?>  <option value="<?php echo $sections['id'];?>"> 
    <?php echo $sections['title_en']."/".$sections['title_ar'] ;?> 
    </option> 
        <?php
        }
      }

      foreach ($response as $sections) {
        if($sections['id']!=$fk_sec)
        {
      ?>  <option value="<?php echo $sections['id'];?>"> 
    <?php echo $sections['title_en']."/".$sections['title_ar'] ;?> 
    </option> 
        <?php
        }
      }  

    ?>
</option>
    </select>

      <br> <br>

      depatment Title AR <span class="error">*</span> :
      <span class="error"></span>
      <input type="text" name="dept_ar" id="dept_ar" value="<?php echo $data['dept_ar'] ?>"/>
      <br> <br>
  
      department Title EN <span class="error">*</span> :
      <span class="error"></span>
      <input type="text" name="dept_en" id="dept_en" value="<?php echo $data['dept_en'] ?>"/>
      <br> <br>
     
      <input type="hidden" name="id" id="id" value="<?php echo $data['dept']; ?>"/>
  
      <div id="block" class="block">
          <div class="block-2"></div>
      </div>
  
      <div dir="rtl">
          <input type="submit" name="btneditdepartment" id="btneditdepartment" value="Edit Section"
              style="width:8em ;height:2em;font-size:18px;" class="btn btn-success" />
      </div>
      <br>
  </form>
 <?php  
}
else{
    header('Location:departments.php');
    exit();
}


?>

