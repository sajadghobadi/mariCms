<html>
<head>
    <meta name="robots" content="index, follow">
    <meta name="GOOGLEBOT" content="noarchive">
    <meta http-equiv="Content-Language" content="fa">
    <META content=all name=robots>
    <META NAME="author" CONTENT="مریم قبادی">
    <META NAME="طراحی و برنامه نویسی وب سایت" CONTENT="رضا قربانی,mehr-design.ir">
    <meta name="keywords" content="محمد,قبادی زاده,محمد قبادی,انتخابات,انتخابات مجلس,سیاسی"/>
    <meta name="description" content="وب سایت شخصی محمد قبادی"/>

</head>
<title>
    وب سایت شخصی محمد قبادی
    </title>
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
        </div>
        <div class="col-md-6">
            <?php
            if ($_GET && $_GET['page'] != null) {
                $pageSelected = $_GET['page'];
                $includeParts = array();
                switch ($pageSelected) {
                    case 'login' :
                        $includeParts[0] = "dadivorod.php";
                        break;
                    case 'gallery':
                        $includeParts[0] = "gallery.php";
                        break;
                    case 'showkhabar':
                        $includeParts[0] = "showkhabar.php";

                        break;
                    case 'sabtenam':
                        $includeParts[0] = "sabtenamkarbar.php";
                        break;
                    case 'search':
                        $includeParts[0] = "search.php?search=$textsearch";
                        break;
                    case 'showsearch':
                        $includeParts[0] = "showsearchsearch.php?groupid2=$groupid";
                        break;

                    default :
                        $includeParts[0] = "news.php";
                }

                for ($i = 0; $i < count($includeParts); $i++) {
                    include $includeParts[$i];
                }
            }else {
               include('news.php');
            }
            ?>
        </div>
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
    </div>
    <div class="row">
        <div class="col-md-12 alert alert-info">


            <span class="pull-left" style="direction: ltr">
                designed by m.ghobadi.all right resevred.
            </span>
        </div>
    </div>
</div>
</body>
</html>