<?php
session_start();
?>
<?php
$username=$_SESSION['use1'];
$password=$_SESSION['pass1'];
$level=$_SESSION['level'];
if($level==null||$level==2) {
    header("location:index.php");
}
?>
<html>
<title>Limerick OneLimerick TwoLimerick</title>

<!--<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"/>-->
<link rel="stylesheet" href="script/jquryUi/jquery-ui.min.css"/>
<link rel="stylesheet" href="css/style.css"/>
<!--<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>-->
<!--<script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>-->
<script type="text/javascript" src="script/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="script/jquryUi/jquery-ui.min.js"></script>
<script type="text/javascript" src="C:\xampp\htdocs\mariCms\script\bootstrap.min.js"></script>
<script type="text/javascript" src="C:\xampp\htdocs\mariCms\script\jquery-2.1.1.min"></script>
<link rel="stylesheet" href="C:\xampp\htdocs\mariCms\script\bootstrap.min (1).css"/>
<link rel="stylesheet" href="cC:\xampp\htdocs\mariCms\script\bootstrap-rtl.min.css"/>


<style>
    body {
        font: 0.8em Arial, sans-serif;
    }

    .menu {
        padding: 0;
        clear: both;
    }

    .menu li {
        display: inline;
    }

    .menu li a {
        background: #ccf;
        padding: 10px;
        float: left;
        border-right: 1px solid #ccf;
        border-bottom: none;
        text-decoration: none;
        color: #000;
        font-weight: bold;
    }

    .menu li.active a {
        background: #eef;
    }

    .content {
        float: right;
        clear: both;
        border: 1px solid #ccf;
        border-top: none;
        border-left: none;
        background: #eef;
        padding: 10px 20px 20px;
        width: 400px;
    }

</style>

</head>
<body dir="rtl">
<?php
include('databasedadi.php');
include('headerdadi.php');
?>
<div class='mytabs'>
    <ul id="menu" class="menu">
        <li><a href="#news">مدیریت اخبار</a></li>
        <li><a href="#nazar">مدیریت نظر سنجی</a></li>
        <li><a href="#groups">مدیریت گروه ها</a></li>
        <li><a href="#marquee">مدیریت متن متحرک</a></li>
        <li><a href="#karbar">مدیریت کاربران</a></li>

    </ul>
    <div id="news" class="content">

        <p>
            <?php
            include('managenews.php');
            ?>
        </p>
    </div>

    <div id="nazar" class="content">
        <p>
            <?php
            include('managenazar.php');
            ?>
        </p>
    </div>

    <div id="groups" class="content">

        <p>
            <?php
            include('groupsdadi.php');
            ?>
        </p>
    </div>

    <div id="marquee" class="content">

        <p>
            <?php
            include('manage_marquee.php');
            ?>
        </p>
    </div>

    <div id="karbar" class="content">

        <p>
            <?php
            include('managekarbardadi.php');
            ?>
        </p>
    </div>
</div>


<script>
    $('.mytabs').tabs();

    $('.menu li a').on('click', function () {
        $('.menu li a').css('background-color', '#ccf');
        $(this).css('background-color', '#4682B4');
    });


</script>
<div id="dialog-confirm" title="حذف" style="display: none;">
    <p>
        آیا مطمئن هستید ؟
    </p>
</div>

</body>

</html>