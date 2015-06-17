<div  cellspacing="8">
    <?php
    $error = '';
    $counter = '';
    echo "<table  cellspacing='10' cellpadding='10px' class='table_managenews'>";
    $sql1 = "select * from newsdadi";
    $result1 = runSelect($sql1);
    while ($row = $result1->fetch(PDO::FETCH_ASSOC)) {
        $counter = $counter + 1;

        echo '<tr bgcolor="white"><td>' . $counter . '</td><td>' . $row['title'] . '</td><td bgcolor="#B0C4DE"><a  href="editnews.php?groupid=' . $row['groupid'] . ' ">' . "ویرایش" . "</a></td><td bgcolor='#B0C4DE'><a href='deletnews.php?groupid1=" . $row['groupid'] . "'>" . "حذف" . "</td></tr>";
    }

    echo "<tr><td padding='10px' bgcolor='white'><a href='addNews.php'>" . "افزودن خبر" . "</a></td></tr></table>";
    ?>
</div>

