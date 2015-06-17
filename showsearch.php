<html>
<head>
    <style>
        .news {
            width: 96%;
            border-radius: 8px;
            border-color: black;
            background-color: white;
            float: right;
            margin-right: 2%;
            margin-top: 3%;
        }

        .centerdiv {
            width: 65%;
            height: 40%;
            border: 1px solid;
            border-color: black;
            float: right;
        }

        .centerdiv2 {
            width: 90%;
            height: 40%;
            border-radius: 7px;
            border-color: black;
            float: right;
            background-color: white;
            margin-top: 2%;
            margin-right: 3%;

        }
    </style>
    <link href="css/style.css" type="text/css" rel="stylesheet"/>
</head>


<body class="body">

<?php
include('databasedadi.php');
include('headerdadi.php');
echo '<div class="zaminehabi">';
include('rightmenu.php')
?>
<div class="centerdiv">
    <div class="centerdiv2">
        <?php
        $groupid = $_GET['groupid1'];
        $qr = "select perfectnews from newsdadi where groupid='" . $groupid . "";
        $result2 = runSelect($qr);
        // echo 'rresult:'.$result2->rowCount();
        while ($row = $result2->fetch(PDO::FETCH_ASSOC)) {
            $mx = $row['perfectnews'];
            echo $mx;
        }

        //aaaaaa
        ?>
    </div>
</div>


<?php
include('leftmenu.php');
echo '</div>';
?>
</body>
</html>