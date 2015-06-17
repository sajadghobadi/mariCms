<?php

$error = '';
$a1 = '';
$a2 = '';
$a3 = '';
$a4 = '';
$a5 = '';
$b1 = '';
$b3 = '';
$b4 = '';
$b5 = '';
$username = '';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $a1 = $_POST['name'];
    $a2 = $_POST['username1'];
    $a3 = $_POST['pass'];
    $a5 = $_POST['email'];
    $a4 = $_POST['mm'];

    $error = null;

    if ($a1 == null || $a2 == null || $a3 == null || $a4 == null || $a5 == null) {
        $error = "لطفا فیلدرا پر نمایید";
    } else {
        $b1 = $a1;
       $b2 = $a2;
        $b3 = $a3;
        $b4 = $a4;
        $b5 = $a5;

        $query = "select distinct * from sabtenam where username = '" . $b2."'";
        $result1 = runSelect($query);
        while ($row = $result1->fetch(PDO::FETCH_ASSOC)) {
            $username = $row['username'];
        }

        if ($username == $b2) {
            $error = "موجود میباشد";
        } else {

            $qury = "insert into sabtenam(name,username,password,mail,gender,level) values('" . $b1 . "','" . $b2 . "','" . $b3 . "','" . $b4 . "','" . $b5 . "',2)";
            $result1 = runInsert($qury);
            $error = "ارسال شد";
        }
    }
}

?>


<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">ثبت نام در سایت</h3>
    </div>
    <div class="panel-body">
        <form method="post" name="myform">
            <div class="form-group">
                <label for="exampleName2">نام</label>
                <input type="text" name="name" class="form-control" id="exampleInputName2" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="exampleInputUsername">نام کاربری</label>
                <input type="text" name="username1" class="form-control" id="exampleInputUsername"
                       placeholder="enter username">
            </div>


            <div class="form-group">
                <label for="inputPassword2" ">رمز</label>
                <input type="password" name="pass" class="form-control" id="inputpassword2"
                       placeholder="enter password">
            </div>
            <div class="form-group">
                <label for="inputEmail2">ایمیل</label>
                <input type="email" name="email" class="form-control" id="inputEmail2" placeholder=" enter Email">
            </div>
            <div class="form-group">

                <label class="radio-inline">
                    <input type="radio" name="mm" id="inlineRadio1" checked value="3"> مذکر
                </label>
                <label class="radio-inline">
                    <input type="radio" name="mm" id="inlineRadio2" value="4"> مونث
                </label>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
        <div class="alert alert-danger" style="<?php if ($error == null) echo 'display:none'; ?>" role="alert">
            <?php echo $error; ?>
        </div>
    </div>


</div>








