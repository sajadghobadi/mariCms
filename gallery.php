<html>
<head>
    <title>
        </title>
    <script type="text/javascript">
        var images=['ax/1_p.jpg','ax/2_p.jpg','ax/3_p.jpg','ax/4_p.jpg','ax/5_p.jpg','ax/6_p.jpg','ax/7_p.jpg'];

        function nextImage() {
            var img = document.getElementById("slideimage");
            var imgname = img.name.split("_");
            var index = imgname[1];
            if (index == images.length - 1) {
                index = 0;
            } else {
                index++;
            }
            document.getElementById('slideimage').src = images[index];
            img.name = "image_" + index;
        }

        function prevImage() {
            var img = document.getElementById("slideimage");
            var imgname = img.name.split("_");
            var index = imgname[1];
            if (index == 0) {
                index = images.length - 1;
            } else {
                index--;
            }
            img.src = images[index];
            img.name = "image_" + index;
        }
        function x(){
            setInterval("nextImage()",3000);
        }


    </script>
</head>

<body onLoad="x();">
<div  style="margin:30px auto; width:30%; height:30%;text-align:center;">
    <p><img title="محمد قبادی" alt="محمد قبادی"    id="slideimage" name="image_0" src="ax/1_p.jpg"></p>

    <button onClick="prevImage();"> Previous </button>
    <button onClick="nextImage();"> Next </button>

</div>

</body>
</html>