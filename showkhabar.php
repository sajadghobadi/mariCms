<div class="well newsText" style="height: 700px;">
    <?php
    $id2 = $_GET['tid'];
    $mm = "select * from newsdadi where id='" . $id2 . "'";
    $result2 = runSelect($mm);
    // echo 'rresult:'.$result2->rowCount();
    while ($row = $result2->fetch(PDO::FETCH_ASSOC)) {
        $m = $row['perfectnews'];
        $big_image = $row['image'];

        echo '<div style="width: 210px;float: left;">' .
            '<img style="width: 200px" src="' . $big_image . '"/>' .
            '</div>';
        echo $m;
    }
    ?>

</div>

<?php

$error = '';
$id3 = '';
$alert = '';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id2 = $_GET['tid'];
    $a = $_POST['namenazar'];
    $v = $_POST['emailnazar'];
    $j = $_POST['textnazar'];
    if ($a == null || $v == null || $j == null) {
        $error = "لطفا فیلد را پر نمایید";
    } else {
        $id3 = $_GET['tid'];

        $m = $_POST['namenazar'];
        $h = $_POST['textnazar'];
        $j1 = $_POST['emailnazar'];
        $query = "insert into opinion(idnews,name,nazar,email,statuse) values('" . $id3 . "','" . $m . "','" . $h . "','" . $j1 . "',false)";
        $result1 = runInsert($query);
        $error = "ارسال شد";
    }
}
?>

<div class="well">
    <form method="POST" name="form">
        <div class="form-group">
            <label for="exampleInputEmail1">
                نام
            </label>
            <input type="text" class="form-control" name="namenazar" id="exampleInputEmail1"
                   placeholder="نام خود را وارد نمایید"/>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">
                ایمیل شما
            </label>
            <input type="email" class="form-control" name="emailnazar" id="exampleInputPassword1"
                   placeholder="ایمیل خود را وارد نمایید"/>
        </div>
        <div class="form-group">
            <label for="exampleInputFile">
                متن نظر
            </label>
            <textarea class="form-control" name="textnazar" rows="5" id="exampleInputFile"></textarea>

        </div>
        <button type="submit" class="btn btn-default">
            ارسال نظر
        </button>

        <div class="alert alert-danger" style="<?php if ($error == null) echo 'display:none'; ?>" role="alert">
            <?php echo $error; ?>

    </form>
</div>


<?php
$id3 = $_GET['tid'];

$s = '';
$sql1 = " select *  from opinion where statuse=1 && idnews=" . $id3 . "";
$result1 = runSelect($sql1);
while ($row = $result1->fetch(PDO::FETCH_ASSOC)) {
    //$a = $row['statuse'];
    $b = $row['name'];
    $c = $row['nazar'];
    // $id=$row['id'];
    echo '<div class="divnazar">';
    echo $b . ":";
    echo '<br/>';
    echo '<br/>';
    echo $c;
    //  echo '<br/>';
    // echo '<br/>';
    // echo "<a style='font-size:large;font-color:red' href='#' onclick='win_open();'>" . "پاسخ به این نظر" . "</a>";
    // echo "<button onclick='on();'>"."پاسخ به این نظر"."</button>";
    //  echo '<br/>';
    echo '</div>';
}

echo '</div>';
?>
