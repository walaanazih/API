<style>
.error {
    color: red;
}

.stylee {
    font-size: 19px;
    font-weight: bold;
    font-family: 'Droid Arabic Naskh', serif;
}

input[type=text],
input[type=password],
input[type=date] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}
</style>

<?php
include_once 'header.php';
include_once "common.php";

$method="GET";
$url = "http://localhost:8012//task2/select.php";
$sectionsApi = callAPI($method, $url, false);
$response = json_decode($sectionsApi, true);
//print_r($response);
        
    if(isset($_POST['btnadddept']))
    {
        $section_select=$_POST['section_select'];
$title_en=$_POST['title_en'];
$title_ar=$_POST['title_ar'];
//echo $title_en;

        $method="POST";
       // $url = "http://localhost:8012//task2/val.php?section_select=$section_select&title_ar=$title_ar&title_en=$title_en";
       $urlval = "http://localhost:8012//task2/val.php";
       $data = array('section_select'=>$_POST['section_select'],'title_en'=>$_POST['title_en'],'title_ar'=>$_POST['title_ar']);
       
       //print_r($data) ;
/*
       $validationApi = CallAPI('POST',$urlval,$data);
        $responsex = json_decode($validationApi, true);
       print_r($responsex) ;
*/
$ch = curl_init( $urlval );
# Setup request to send json via POST.
$payload = json_encode($data );

curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
# Return response instead of printing.
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
# Send request.
$result = curl_exec($ch);
curl_close($ch);
# Print response.
echo "<pre>" . $result. "</pre>";

    }
?>

<h3 align="center" style="color:#1a4395; font-family: 'Droid Arabic Naskh', serif;">Add department</h3>

<form method="post" >

sections <span class="error">*</span> :   
<span class="error"></span>
<select name="section_select" id="section_select" >

    <?php
     foreach ($response as $sections) {
      ?>  <option value="<?php echo $sections['id'];?>"> 
    <?php echo $sections['title_en']."/".$sections['title_ar'] ;?> 
    </option> 
        <?php
    
      }

    ?>
</option>
    </select>
<br> <br>


English Title <span class="error">*</span> :
    <span class="error"></span>
    <input type="text" name="title_en" id="title_en" />
    <br> <br>

    Arabic Title <span class="error">*</span> :
    <span class="error"></span>
    <input type="text" name="title_ar" id="title_ar" />
    <br> <br>

    <div id="block" class="block">
        <div class="block-2"></div>
    </div>

    <div dir="rtl">
        <a href="home.php" style="width:6em ;height:2em;font-size:18px;" class="btn btn-info">Back</a>
        <input type="submit" name="btnadddept" id="btnadddept" value="Add department"
            style="width:8em ;height:2em;font-size:18px;" class="btn btn-success" />
    </div>
    <br>
</form>

<?php include_once 'footer.php';
?>