

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">
            مطالب
        </h3>
    </div>
    <div class="panel-body">
        <?php


        $sql1 = " select *  from newsdadi order by history desc limit 5 ";
        $result1 = runSelect($sql1);
        while ($row = $result1->fetch(PDO::FETCH_ASSOC)) {
            $smallimage = $row['smallImage'];

//                        echo '<div class="news list-group-item"><div style="width: 20%;float: left;padding: 3%"><img src="' . $smallimage . '"/></div>' . '<a  style= "font-size:large" href=showkhabar.php?tid=' . $row['id'] . '>' . $row['title'] . '</a><br/><br/>' . $row['text'] . '</div>';
            echo '<div class="news list-group-item">'.
//                                    '<div class="pull-left">'.
                '<img src="' . $smallimage . '" class="thumbnail pull-left"/>'.
//                                    '</div>' .
                '<a  style= "font-size:large" href="index.php?page=showkhabar&tid=' . $row['id'] . '">' . $row['title'] .
                '</a><br />' . $row['text'] .
                '</div>';

        }
        ?>
    </div>
</div>