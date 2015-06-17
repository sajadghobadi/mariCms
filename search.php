<html>
<head>
</head>
<body class="body">
<?php
include('databasedadi.php');
include('clientLibs.php');
?>
<div>
    <div class="row">
        <div class="col-md-12 ">
            <?php
            include('headerdadi.php');
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">منو</h3>
                </div>
                <div class="panel-body">
                    <?php
                    include('rightmenu.php')
                    ?>
                </div>

        </div>
        <div class="col-md-6">
                <?php
                $b=$_GET['textsearch'];
                if($b==null)
                {
                    header("location:index.php");
                }
                else {
                    $qu = "select * from newsdadi where perfectnews like '% " . $b . " %' ";

                    $result1 = runSelect($qu);
                    if ($result1->rowCount()) {
                        while ($row = $result1->fetch(PDO::FETCH_ASSOC)) {
                            echo '<div class="news">' . '<a href=showsearch.php?groupid1=' . $row['groupid'] . '>' . $row['title'] . '</a>.<br/>' . $row['text'] . '</div>';
                        }
                    } else {
                        $error = "موجود نمی باشد";
                    }
                }
                ?>
                <?php echo $error;?>
        <div class="col-md-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">قسمتها</h3>
                </div>
                <div class="panel-body">
                    <?php
                    include('leftmenu.php');
                    ?>
                </div>
            </div>
        </div>
    <div class="row">
        <div class="col-md-12 alert alert-info">
            <span class="pull-left" style="direction: ltr">
                designed by m.ghobadi.all right resevred.
            </span>
        </div>
    </div>
</body>
</html>
<?php
include('leftmenu.php');
echo '</div>';
?>
</body>
</html>