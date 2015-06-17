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
echo '<div class="zaminehabi">';
include('rightmenu.php')
?>
<div class="centerdiv">
    <form method="post" name="mform">
    <table border="1">
    <?php
    $error='';
    if($_SERVER['REQUEST_METHOD']=="POST"){
    $id= $_GET['id'];
    $a=$_POST['mymarquee'];
    if($a==null){
        $error="لطفا فیلد را پر نمایید";
    }
    else{
        $e=$_POST['mymarquee'];
    }
    $query = "update marquee SET textmarquee='".$e."' where id=".$id."";
    $result2 = runupdate($query);
        header("location:manage_marquee.php?id=".$mp);

    }
    ?>
        <?php
        $id= $_GET['id'];
        $sql1= " select *  from marquee where id =".$id."";
        $result1 = runSelect($sql1);
        while ($row =$result1->fetch(PDO::FETCH_ASSOC)) {
            $mp=['id'];
           $marquee=$row['textmarquee'];
        }
        ?>
        <tr>

            <td>
                <textarea name="mymarquee" rows="20" cols="60"><?php echo $marquee; ?> </textarea>

            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>
                <input type="submit" value="ارسال">

            </td>
        </tr>
        <tr>
            <td><?php echo $error;?></td>
        </tr>
        </table>
        </form>
</div>

<?php

include('leftmenu.php');
echo '</div>';
?>
</div>
</body>
</html>