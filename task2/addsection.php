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

?>

<h3 align="center" style="color:#1a4395; font-family: 'Droid Arabic Naskh', serif;">Add Section</h3>

<form method="post" action="<?='action.php'?>">

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
        <input type="submit" name="btnaddsection" id="btnaddsection" value="Add Section"
            style="width:8em ;height:2em;font-size:18px;" class="btn btn-success" />
    </div>
    <br>
</form>

<?php include_once 'footer.php';
?>