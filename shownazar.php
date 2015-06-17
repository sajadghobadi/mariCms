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
?>
<div class="centerdiv">
    <table border="2px" cellspacing="5" cellpading="5" style="margin-top: 5%">
    <?php

    $mid=$_GET['id'];

    $sql1 = "select * from opinion where idnews=".$mid." ";
    $result1 = runSelect($sql1);
    while ($row = $result1->fetch(PDO::FETCH_ASSOC)) {
       // $ma=$row['nazar'];
        //$mb=$row['name'];
        echo "<tr bgcolor='white'><td>".$row['nazar']."</td><td><a href='oknazar.php?id=" . $row['id'] . "'>" ."تایید نمایش نظر". "</a></td><td><a href='deleteNazar.php?id1=" . $row['id'] . "'>"."حذف نظر"."</td></tr>";
    }

    ?>
        </table>
</div>

<?php
echo '</div>';
?>
</div>
</body>
</html>