
<form name="fm" method="post">

    <table  class="table_managekarbar" cellspacing="8" cellpadding="8" bgcolor="#B0C4DE">
        <tr>
            <td bgcolor="white">انتخاب کاربر</td>
            <td bgcolor="#B0C4DE">
                <select name="select">
                    <option select="selected" bgcolor="white">انتخاب کنید</option>
                    <?php
                    $error='';
                    $sql1="select username from sabtenam ";
                    $result1 = runSelect($sql1);
                    while ($row =$result1->fetch(PDO::FETCH_ASSOC)){
                        echo  '<option>'.$row['username'].'</option>';
                    }
                    ?>
                    </select>
            </td>
                </tr>
           <tr>
            <td bgcolor="white">سطح دسترسی را تعیین کنید</td>
            <td bgcolor="#B0C4DE"><input type="text" name="sath"></td>
        </tr>
        <tr>
            <td></td><td></td><td bgcolor="#B0C4DE"><input type="submit" name="sub"></td><td><?php echo $error; ?></td>
        </tr>
        </table>

    </form>

<?php

if($_SERVER['REQUEST_METHOD']=="POST") {
$a=$_POST['sath'];
$v=$_POST['select'];
if($a==null){
    $error="لطفا فیلد را پر نمایید";
}
else{
$m=$_POST['sath'];
$vs=$_POST['select'];
$qury = "update sabtenam SET level=".$m." where username='".$vs."'";
$result1 = runupdate($qury);
}
}
?>
