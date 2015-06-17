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
  <form name="ms" method="post">
      <table border="2px">
          <?php
          $error='';
          if($_SERVER['REQUEST_METHOD']=="POST") {
          $a=$_POST['marquee'];
          if($a==null){
              $error="لطفا فیلد را پر نمایید";
          }
          else{
              $v=$_POST['marquee'];
              $qury = "insert into marquee(textmarquee) values('".$v."')";
              $result1 = runinsert($qury);
              $q="update marquee SET statuse=true ";
              $result1 = runupdate($q);
          }

          }
          ?>
          <tr>
              <td valign="top"> افزودن متن</td>
              <td>
                  <textarea name="marquee" rows="20" cols="60"> </textarea>

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