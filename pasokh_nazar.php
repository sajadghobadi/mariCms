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
   <form method="post" name="mm">
       <table border="2" style="margin-top: 10%;" cellspacing="8" cellpadding="8">
           <?php

           if($_SERVER['REQUEST_METHOD']=="POST") {
           $id1=$_GET['id'];
           $v=$_POST['ta'];
           $a=$_POST['namepasokh'];
           if($a==null||$v==null){
               $error="لطفا فیلد را پر نمایید";
           }
           else{
               $id=$_GET['id'];
               $h=$_POST['ta'];
               $m=$_POST['namepasokh'];
               $qury ="insert into pasokh(idnazar,pasokhnazar,name) values('" . $id . "','" . $h . "','" . $m . "')";
               $result1 = runInsert($qury);
               $q = "update pasokh SET statuse='false'";
               $result1 = runupdate($q);
           }

           }
           ?>
           <tr>
             <td>نام</td>  <td valign="top"><input type="text" name="namepasokh"></td>
           </tr>
           <tr>

             <td valign="top"> پاسخ به این نظر</td>  <td><textarea name="ta" rows="20" cols="60"> </textarea></td>
           </tr>
           <tr>
               <td></td><td></td><td><input type="submit" name="submit" value="ارسال"></td>
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