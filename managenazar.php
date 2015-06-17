
    <table  class="table_managenazar" cellspacing="8" cellpadding="8">
        <?php
        $error='';
        $counter = '';

        $sql1 = "select * from newsdadi";
        $result1 = runSelect($sql1);
        while ($row = $result1->fetch(PDO::FETCH_ASSOC)) {
            $counter = $counter + 1;
            echo "<tr><td bgcolor='white'>.$counter.</td><td bgcolor='white'>." . $row['title'] . "</td><td bgcolor='#B0C4DE'><a href='shownazar.php?id=" . $row['id'] . "'>" ."نظرات این خبر";
        }

        ?>
        </table>



