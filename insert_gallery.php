<html>
<head>
</head>
<body class="body">
<?php
include('databasedadi.php');
require('phpLib/uploader.php');
?>
<form method="post" name="form" action="insert_gallery.php" enctype="multipart/form-data">
    <div>
        <?php

        //if ($_SERVER['REQUEST_METHOD'] == "POST") {

        ?>
        <table border="1px" cellspacing="20px">
            <tr>
                <td><input type="file" name="picture"></td>
                <td style="padding: 10px">انتخاب تصویر مورد نظر</td>
            </tr>
            <tr>
                <td><input type="submit" name="submit1" value="insert"></td>
            </tr>
        </table>
        <br/>
    </div>
    <?php
    $query="select * from gallery";
    $result = runSelect($query);
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $pic = $row['img'];
        $id=$row['id'];
             echo '<img style="width:200" src="'.$pic.'"><input type="checkbox" name="delete[]" value="'.$id.'">';


    }
    ?>
<br/>
    <input type="submit" name="submit2" value="delete">
    <?php
   // switch($_POST['insert_gallery.php'])
    //{
       // case 'Delete':
            //$query = "delete from gallery where id=".$id."";
           // $result2 = runDelete($query);

           // break;
        //case 'Edit':

           // break;
   // }
    //if(isset($_POST['submit1']) || isset($_POST['submit2'])) {

        if($_POST['submit2']) {
            foreach ($_POST['delete'] as $check) {


                $query = "delete from gallery where id=" . $check . "";
                $result2 = runDelete($query);
            }
        }
        else if($_POST['submit1'])
            {
             if (is_uploaded_file($_FILES['picture']['tmp_name'])) {

                 $name = 'm_' . uniqid();
                 $fullName = basename($_FILES["picture"]['name']);
                 $ext = substr($fullName, -3);
                 savePostedFileUploaded($_FILES['picture'], 'galleryImages/', $name . '.' . $ext);
                 $picture_path = 'galleryImages/' . $name . '.' . $ext;
                 $query = "insert into gallery  (img) VALUES ('" . $picture_path . "')";
                 $result1 = runInsert($query);


             }



    }
    ?>

</form>
</body>
</html>