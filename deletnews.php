<html>
<head>
    <?php
    include('link.php');
    ?>
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

    <?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $id1= $_GET['groupid1'];

            $query = "delete from newsdadi where groupid=".$id1."";
            $result2 = runDelete($query);
        header("location:manage.php");


    }

    ?>
    <form name="2m" method="post">
    <?php
    $m='';
    $g=$_GET['groupid1'];
    $v="select perfectnews from newsdadi where groupid=". $g."";
    $result1 = runSelect($v);
    while ($row =$result1->fetch(PDO::FETCH_ASSOC)) {
        $m=$row['perfectnews'];
    }
    echo'<div style="width: 50%;border-radius: 5px;background-color: khaki;height: 70%;text-align: center;margin-right: 25%">';
    echo '<table  class=".table-hover">';
    echo'<tr><td>';

    echo"<textarea rows='20' cols='60' name='perfectnews'>".$m."</textarea>";
    echo'</tr></td>';
    echo'<tr><td></td><td>';
    echo"<input type='submit' name='sub' value='حذف'>";
    echo'</tr></td>';
    echo '</table>';
    echo'</div>';
    ?>
        </form>
</div>




<?php
//include('leftmenu.php');
//echo '</div>';
?>


</body>
</html>