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

?>



    <form method="post" name="myform">
    <table border="2" style="margin-right: 10%;margin-top: 10%" cellspacing="10">
    <?php
    $sid=$_GET['id'];
    $sql1 = "select * from opinion where id=".$sid." ";
    $result1 = runSelect($sql1);
    while ($row = $result1->fetch(PDO::FETCH_ASSOC)) {
        $iid=$row['idnews'];
       $mm= $row['name'];
        $ss=$row['nazar'];
        echo "<tr><td><input type='text' name='namekarbar' value='$mm'></td></tr>";
        echo "<tr><td><textarea rows='20' cols='60'name='nazarkarbar'>" ."$ss"."</textarea></td></tr>";

    }
    echo "<tr><td></td><td><input type='submit' name='mysub' value='تایید نمایش'></td></tr>";
    ?>
        </table>
        </form>

<?php
$w='';
if($_SERVER['REQUEST_METHOD']=="POST") {
    $sid=$_GET['id'];
    $a=$_POST['namekarbar'];
    $v=$_POST['nazarkarbar'];
    if($a==null){
        $error="لطفا فیلد را پر نمایید";
    }
    else{
        $ssid=$_GET['id'];
        $m=$_POST['namekarbar'];
        $vs=$_POST['nazarkarbar'];


        $qury = "update opinion SET statuse="."true"." where id='".$ssid."'";
        $result1 = runupdate($qury);
        header("location:shownazar.php?id=".$iid);

    }
}
?>

</body>
</html>