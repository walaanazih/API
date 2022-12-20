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
		$url = "http://localhost:8012//task2/select.php";
        $sectionsApi = callAPI($method, $url, false);
        $response = json_decode($sectionsApi, true);

?>

<label>
    <a href="addsection.php" class="btn btn-info">Add Section</a>
</label>


<table class="table table-striped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>id</th>
            <th>Title EN</th>
            <th>Title AR</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

        <?php

foreach ($response as $section) {
    ?>
        <tr style="text-align: center;">
            <td><?php echo $section['id']; ?></td>
            <td><?php echo $section['title_en']; ?></td>
            <td><?php echo $section['title_ar']; ?></td>
            <td><a class="btn btn-success" href="editsection.php?sec_id=<?php echo $section['id']; ?>">Update</a>
                <a class="btn btn-danger" href="deletesection.php?sec_id=<?php echo $section['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php
}

?>

    </tbody>
</table>
</div>