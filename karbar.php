<form name="fm" method="post">
    <div class="divtable">
        <table>
            <tr>
                <td>انتخاب کاربر</td>
                <td>
                    <select name="select">
                        <option select="selected">انتخاب کنید</option>
                        <?php
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
                <td>سطح دسترسی را تعیین کنید</td>
                <td><input type="text" name="sath"></td>
            </tr>
            <tr>
                <td></td><td></td><td><input type="submit" name="sub"></td><td><?php echo $error; ?></td>
            </tr>
        </table>
    </div>
</form>
</div>
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