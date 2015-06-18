<div class="well">
    <div>﻿
        <script type='text/javascript' src='script\azan\azan.js'></script>
        <script language=javascript>
            init();
            document.getElementById('cities').selectedIndex = 12;
            coord();
            main();
        </script>
    </div>
</div>
<div class="well">
        <img
            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTl_nI8QXoOxGLACnp8dM4Ny5_COFRMVtU5Z1ctipQFjnr4Y1Oe"
            style="height:1%;width:10%">
        <br/>
        <?php
        $error2 = '';
        $error3 = '';
        $search = '';
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $mm = $_POST['search'];
            if ($mm == null) {
                $error3 = "لطفا فیلد را پرنمایید";
            } else {
                $mj = $_POST['search'];

                header("location:search.php?textsearch='". $mj);
            }
        }
        ?>
        <form name="searchform" action="search.php" method="post">
            <input type="text" size="10%" name="search">
            <input type="submit" name="submari" value="بگرد">
        </form>
        <?php echo $error2; ?>
        <?php echo $error3; ?>
</div>
<div class="well">
    <!-- Statistics by www.1abzar.com --->
    <script type="text/javascript" src="http://1abzar.ir/abzar/tools/stat/amar-v3.php?color=333333&bg=F3E3F7&kc=156DA1&kadr=1&amar=vv6joses8e8l7is1rxq3ptbe6gnmi8&show=1|1|1|1|0|0|0"></script><div style="display:none"></div>
    <!-- Statistics by www.1abzar.com --->
    <script type="text/javascript">
        $(document).ready(function(){
           $('div.ali').on('load',function(){
               console.log(this);
           });

        });
    </script>
</div>