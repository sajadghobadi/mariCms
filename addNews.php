<html>
<head>
    <style>
        .table2 {
            width: 60%;
            float: right;
            margin-right: 5%;
            border: 1px solid;
            margin-top: 8%;
        }
    </style>
    <link href="css/style.css" type="text/css" rel="stylesheet"/>
</head>
<body class="body">
<?php
include('databasedadi.php');
include('headerdadi.php');
require('phpLib/uploader.php');
echo '<div class="zaminehabi">';
?>


<div class="table2">

    <form method="POST" name="yourform" action="addNews.php" enctype="multipart/form-data">
        <?php
        $error = '';
        $ci = '';
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $a = $_POST['onvan'];
            $v = $_POST['kholasekhabar'];
            $j = $_POST['matnekamel'];
            if ($a == null || $v == null || $j == null) {
                $error = "لطفا فیلد را پر نمایید";
            } else {

                $m = $_POST['onvan'];
                $h = $_POST['kholasekhabar'];
                $j1 = $_POST['matnekamel'];
                $l = $_POST['select'];

                $query = "insert into newsdadi(title,text,perfectnews,groupid,history) values('" . $m . "','" . $h . "','" . $j1 . "','" . $l . "','" . date("y/m/d") . "')";

            }

            $result1 = runInsert($query);
            $newsId = $result1->lastInsertId();
            //echo $_FILES["newsImage"];

            if (is_uploaded_file($_FILES['newsImage']['tmp_name'])) {
                mkdir("newsImage/" . $newsId);
                mkdir("newsImage/" . $newsId . "/thumb/");

                savePostedFileUploaded($_FILES['newsImage'], 'newsImage/' . $newsId . '/', basename($_FILES["newsImage"]['name']));

                $bigFilePath = 'newsImage/' . $newsId . '/' . basename($_FILES["newsImage"]['name']);
                $thumbFilePath = "newsImage/" . $newsId . "/thumb/" . basename($_FILES["newsImage"]['name']);
                generateThumbnailImage($bigFilePath, $thumbFilePath, 100, 0);

                $name = basename($_FILES["newsImage"]['name']);
                $query = "update newsdadi SET image='" . $bigFilePath . "' ,smallImage='" . $thumbFilePath . "' where id=" . $newsId;
                $result1 = runupdate($query);
            }

        }
        ?>
        <table cellpadding="7">
            <tr>
                <td>
                    عنوان خبر<input type="text" name="onvan">
                </td>
                <td><?php echo $error ?></td>

            </tr>

            <tr>
                <td>
                    نوع خبر <select name="select">
                        <option select="selected">انتخاب کنید</option>
                        <?php
                        $sq = "select * from groups";
                        $result = runSelect($sq);

                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            $ci = $row['id'];

                            echo '<option value="' . $ci . '">' . $row['name'] . '</option>';
                        }

                        ?>


                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    تصویر خبر
                    <input type="file" name="newsImage">
                </td>
            </tr>
            <tr>
            <tr>
                <td>خلاصه خبر</td>
            </tr>
            <td>
   <textarea rows="10" cols="40" name="kholasekhabar">

                </textarea>
            </td>
            <td><?php echo $error ?></td>
            </tr>
            <tr>
                <td>متن کامل خبر</td>
            </tr>
            <td>
            <textarea rows="20" cols="70" name="matnekamel">

            </textarea>
            </td>
            <td><?php echo $error ?></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="sub" value="ارسال">
                </td>
            </tr>

        </table>
    </form>
</div>

<?php
echo '</div>';
?>
</body>
</html>