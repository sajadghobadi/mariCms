<?php
session_start();
?>
<?php
$error = '';
$ax = '';
$ay = '';
$error8 = '';
$username = '';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $ax = $_POST['username'];
    $ay = $_POST['password'];


    if ($ax == null || $ay == null) {
        $error = "لطفا فیلد را پر نمایید";
    }
     else {

        $b1 = $_POST['username'];
        $b2 = $_POST['password'];
        $query = "select distinct * from sabtenam where username='" . $b1 . "' and password='" . $b2 . "'";
        $result1 = runSelect($query);


        while ($row = $result1->fetch(PDO::FETCH_ASSOC)) {
            $username = $row['username'];
            $password = $row['password'];
            $level = $row['level'];
        }


        if ($username != $b1 || $password != $b2) {
            $error = "نام کاربری یا رمز عبور اشتباه است";

        } else if ($username == $b1 && $password == $b2 && $level == '2') {

            $row = $result1->fetch(PDO::FETCH_ASSOC);
            $_SESSION['use1'] = $b1;
            $_SESSION['pass1'] = $b2;
            $_SESSION['level'] = $level;
            header("location:index.php");

        } else if ($username == $b1 && $password == $b2 && $level == '1') {

            $row = ($result1->fetch(PDO::FETCH_ASSOC));
            $_SESSION['use1'] = $b1;
            $_SESSION['pass1'] = $b2;
            $_SESSION['level'] = $level;
            header("location:manage.php");
        }
    }
}
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">ورود</h3>
    </div>
    <div class="panel-body">
<form method="post">
        <form class="form-horizontal">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">نام کاربری</label>
                <div class="col-sm-10">
                    <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">رمز</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" name="send" value="ورود" class="btn btn-default"></button>
                </div>
            </div>
        </form>
    </div>
    <div class="alert alert-danger" style="<?php if ($error == null) echo 'display:none'; ?>" role="alert">
        <?php echo $error; ?>

    </div>
</div>



