<table  cellspacing="10px" class="table_managemarquee" cellpadding="5px">
    <?php
   // include('databasedadi.php');
   // $mid = $_GET['id'];
    $sql1 = " select *  from marquee";
    $result1 = runSelect($sql1);
    while ($row = $result1->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td style='width: 95%' bgcolor='white'>" . $row['textmarquee'] . "</td><td><a href='edit_marquee.php?id=" . $row['id'] . "'>" . "ویرایش" . "</a></td><td><a href='delet_marquee.php?id=" . $row['id'] . "'>" . "حذف" . "</td></tr>";
    }
    ?>
    <tr>
        <td><a style="font-size: large;font-family: sans-serif" href="insert_marquee.php"> افزودن متن متحرک</a></td>
    </tr>
</table>



