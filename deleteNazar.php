<html>
<head>
    <style>

        .centerdiv{
            width: 65%;
            height: 40%;
            border: 1px solid;
            border-color: black;
            float: right;
        }

    </style>
    <link href="css/style.css" type="text/css" rel="stylesheet" />
</head>
<body class="body">

<?php
include('databasedadi.php');
//include('headerdadi.php');
//echo '<div class="zaminehabi">';
//include('rightmenu.php')
?>



    <table border="2" cellspacing="10" style="margin-right: 10%;margin-top: 10%">
        <form method="post" name="marii">
            <?php
            $n=$_GET['id1'];
            $q="select * from opinion where id=".$n."";
            $result1 = runSelect($q);
            while ($row = $result1->fetch(PDO::FETCH_ASSOC)) {
                $mb= $row['idnews'];
                $mm= $row['name'];
                $ss=$row['nazar'];
                echo "<tr><td><input type='text' name='nam' value='$mm'></td></tr>";
                echo"<tr><td><textarea rows='20' cols='60' name='opinion'>"."$ss"."</textarea>";
                echo "<tr><td></td><td><input type='submit' name='su' value='حذف نظر'></td></tr>";
            }
            ?>
        </form>
        <?php
        $w='';
        if($_SERVER['REQUEST_METHOD']=="POST") {
            $sidd=$_GET['id1'];
            $a=$_POST['nam'];
            $v=$_POST['opinion'];
            if($a==null){
                $error="لطفا فیلد را پر نمایید";
            }
            else{
                $ssid=$_GET['id1'];
                $m=$_POST['nam'];
                $vs=$_POST['opinion'];


                $query = "delete from opinion where id=".$ssid."";
                $result1 = runupdate($query);
                header("location:shownazar.php?id=".$mb);
            }
        }
        ?>
    </table>




</body>
</html>