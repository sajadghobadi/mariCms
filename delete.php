<html>
<head>
    <style>
        .delet {
            width: 30%;
            height: 20%;
            float: right;
            margin-right: 26%;
            margin-top: 10%;

        }
    </style>
    <link href="css/style.css" type="text/css" rel="stylesheet"/>
</head>
<body class="body">
<?php
include('databasedadi.php');
//include('headerdadi.php');
//echo '<div class="zaminehabi">';
//include('rightmenu.php');
?>

<?php

$error = '';
$q = '';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $groupId = $_GET['id'];
    $s = $_POST['edit'];
    if ($s == null) {
        $error = "لطفا فیلد را پر نمایید";
    } else {
        $mn = $_POST['edit'];
        $query = "delete from groups where id=" . $groupId  . "";
        $result2 = runDelete($query);

        header("location:manage.php");

    }
}
?>
<form method="post" name="mariform">
    <div class="delet">
        <table border="1">
            <tr>
                <td>عنوان خبر</td>
                <td>
                    <?php
                    $vm = $_GET['id'];
                    $qr = "select name from groups where id=" . $vm . "";
                    $result1 = runSelect($qr);
                    while ($row = $result1->fetch(PDO::FETCH_ASSOC)) {
                    $m = $row['name'];
                    echo "<input type='text' name='edit' value='$m'>";
                    }
                    ?>
                </td>
                <?php
                echo "<td>" . "$error" . "</td>";

                ?>
            </tr>
            <tr>
                <td></td>
                <td></td>


                <td>
                    <?php



                    echo "<input type='submit' name='sub' value='حذف'>";

                    ?>
                </td>
            </tr>
        </table>
    </div>
</form>
<?php
//include('leftmenu.php');
echo '</div>';
?>
</body>
</html>