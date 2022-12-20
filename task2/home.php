<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/css/select2.min.css" />
</head>

<style>
.button {
    background: none !important;
    border: none;
    padding: 0 !important;
    color: #069;
    text-decoration: underline;
    cursor: pointer;
    font-size: 18px;
    font-family: 'Droid Arabic Naskh', serif;
}
</style>

<?php
include_once "header.php";
?>
<form id="form" name="form" method="post" action="">
    <div align="left">
        <table class="table table-striped" border="0">

            <tr>
                <td height="80">
                    <div align="right" dir="ltr" style="font-size:20px;">
                        <input type="submit" name="addsection" value="Sections" title="addsection"
                            class="button stylee" formaction="sections.php" />
                    </div>
                </td>
            </tr>

            <!------------------------------------------------------------------------------------------------------------------------>
            <tr>
                <td height="80">
                    <div align="right" dir="ltr" style="font-size:20px;">
                        <input type="submit" name="adddepartment" value="departments" title="adddepartment"
                            class="button stylee" formaction="departments.php" />
                    </div>
                </td>
            </tr>

            <!------------------------------------------------------------------------------------------------------------------------>

        </table>
    </div>
</form>
<?php
include 'footer.php';
?>