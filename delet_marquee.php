<html>
<head>
    <style>
        .news{
            width:96%;
            border-radius: 8px;
            border-color: black;
            background-color: white;
            float: right;
            margin-right: 2%;
            margin-top: 3%;
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
//include('headerdadi.php');
//echo '<div class="zaminehabi">';
//include('rightmenu.php')
?>

    <form name="nform" method="post">
        <?php
        $error='';
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $id= $_GET['id'];
            $a=$_POST['yourmarquee'];
            if($a==null){
                $error="لطفا فیلد را پر نمایید";
            }
            else{
                $e=$_POST['yourmarquee'];
            }
            $query = "delete from marquee where id=".$id."";
            $result2 = rundelete($query);
                    header("location:manage.php");

        }
        ?>
        <table border="2">
            <?php
            $marquee2='';
            $id= $_GET['id'];
            $sql1= " select *  from marquee where id =".$id."";
            $result1 = runSelect($sql1);
            while ($row =$result1->fetch(PDO::FETCH_ASSOC)) {
                $mp=$row['id'];
                $marquee2=$row['textmarquee'];
            }
            ?>
            <tr>

                <td>
                    <textarea name="yourmarquee" rows="20" cols="70"><?php echo $marquee2; ?> </textarea>

                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <input type="submit" value="حذف">

                </td>
            </tr>
            <tr>
                <td><?php echo $error;?></td>
            </tr>
        </table>
        </form>



</body>
</html>