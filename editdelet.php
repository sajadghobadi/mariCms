<?php
session_start();
?>
<html>
<head>
    <style>
        .divtable3{
            width: 60%;
            margin-right:30%;
            margin-top: 20%;
        }
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
include('rightmenu.php');

 echo  " <div class='centerdiv'>";
    ?>
<?php

$error='';
$q='';

if($_SERVER['REQUEST_METHOD']=="POST"){
    $q= $_GET['id'];
    $s=$_POST['edit'];
    if($s==null){
        $error="لطفا فیلد را پر نمایید";
    }

    else{
       $mn= $_POST['edit'];
       $query = "update groups SET name='".$mn."' where id=".$q."";
       $result2 = runupdate($query);
	   header("location:manage.php");

    }

}

$q= $_GET['id'];

echo'<form method="post"  name="myform">';
$qr="select name from groups where id=".$q."";
$result1 = runSelect($qr);
    while ($row =$result1->fetch(PDO::FETCH_ASSOC)) {

    $m=$row['name'];
        echo '<div class="divtable3">';
 echo  "<input type='text' name='edit' value='$m'>";
    echo $error;

  echo  "<input type='submit' name='sub' value='ویرایش'>";
        echo '</div>';
    }

?>
    </form>
    </div>
<?php

include('leftmenu.php');
echo '</div>';
?>

</body>
</html>