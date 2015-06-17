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
include('headerdadi.php');
?>

    <?php
    $h='';
    if($_SERVER['REQUEST_METHOD']=="POST"){
    $id= $_GET['groupid'];
        $a=$_POST['titlemari'];
        $b=$_POST['textmari'];
        $c=$_POST['perfectnewsmari'];
        if($a==null||$b==null||$c==null){
        $error="لطفا فیلد را پر نمایید";
    }
    else{
        $e=$_POST['titlemari'];
        $f=$_POST['textmari'];
        $g=$_POST['perfectnewsmari'];
    }
        $query = "update newsdadi SET title='".$e."',text='".$f."',perfectnews='".$g."' where groupid=".$id."";
        $result2 = runupdate($query);
		header("location:manage.php");

    }


    ?>
    <form name="mform" method="post" >

        <table style="margin-right: 20%;border-color: #ffffff"  cellspacing="1">
            <?php
            $m='';
            $id= $_GET['groupid'];
            $qr="select * from newsdadi where groupid=".$id."";
            $result1 = runSelect($qr);
            while ($row =$result1->fetch(PDO::FETCH_ASSOC)) {
                $h=$row['title'];
                $s=$row['text'];
                $m=$row['perfectnews'];
            }
            echo '<tr><td valign="top">'."عنوان خبر"."</td><td><input type='text' name='titlemari' value='$h'></td></tr>";
            echo '<tr><td valign="top">'."خلاصه خبر"."</td><td><textarea rows='20' cols='40' name='textmari'>$s</textarea></td></tr>";
            echo '<tr><td valign="top">'."متن خبر"."</td><td><textarea rows='20' cols='60' name='perfectnewsmari'>$m</textarea><td></tr>";
            echo'<tr><td></td>'.'<td></td>'.'<td><input type="submit" name="sub" value="ویرایش"></td></tr>';
            ?>


</form>
</body>
</html>