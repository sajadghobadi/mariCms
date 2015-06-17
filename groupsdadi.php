<?php
//session_start();
?>

<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $x = $_POST['insert'];
    if ($x == null) {
        $error = "لطفا فیلد را پر نمایید";
    } else {

        $y = $_POST['insert'];

        $qury = "insert into groups(name) values('" . $y . "')";
        $result1 = runinsert($qury);
    }
}
?>


<?php

$error = '';
$counter = '';
echo "<table class='table_groups' cellspacing='8' cellpadding='8' bgcolor='#B0C4DE'>";
$sql1 = "select * from groups";
$result1 = runSelect($sql1);
while ($row = $result1->fetch(PDO::FETCH_ASSOC)) {
    $counter = $counter + 1;
    echo "<tr><td bgcolor='white'>$counter.</td><td bgcolor='white'>." . $row['name'] . "</td><td bgcolor=' #B0C4DE'><a href='editdelet.php?id=" . $row['id'] . "'>" . "ویرایش" . "</a></td><td bgcolor='#B0C4DE'><a href='delete.php?id=" . $row['id'] . "'>" . "حذف" . "</td></tr>";
}
echo "</table>";
echo '<div style="margin-right: 30%;width: 40%">';
echo '<form name="mariform" method="post">';

echo '<tr><td>' . 'افزودن گروه' . '<input type="text" name="insert">' . '</td><td><input type="submit" name="submari"></td><td>' . $error . '</td></tr>';
echo '</div>';
echo '</form>';
?>
<script type="text/javascript">
    //function confirm(id) {
       // $("#dialog-confirm").dialog({
           // resizable: false,
           // height: 140,
            //modal: true,
           // buttons: {
              //  "حذف": function () {
                   // window.location = 'java.php?operation=delete&type=group&id=' + id.toString();
               // },
                //"انصراف": function () {
                    //$(this).dialog("close");
                //}
           // }
       // });
   // }
</script>