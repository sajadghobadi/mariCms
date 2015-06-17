<?php

function savePostedFileUploaded($postedFile, $destination,$name)
{
    $target_dir = $destination;
    $target_file = $target_dir . $name;
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($postedFile['tmp_name']);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "فایل یک عکس نیست.";
            $uploadOk = 0;
        }
    }
// Check if file already exists
    if (file_exists($target_file)) {
        echo "فایلی با این نام وجود دارد.";
        $uploadOk = 0;
    }
// Check file size
    if ($postedFile["size"] > 50000000) {
        echo "اندازه فایل بیشتر از حد مجاز است.";
        $uploadOk = 0;
    }
// Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo " مورد قبول هستند JPG, JPEG, PNG & GIF فقط پسوند های .";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "فایل آپلود نشد.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($postedFile['tmp_name'], $target_file)) {
            //echo "فایل " . basename($postedFile["name"]) . " آپلود شد.";
        } else {
            echo "خطایی رخ داده است.";
        }
    }

}

class SimpleImage
{
    var $image;
    var $image_type;

    function load($filename)
    {
        $image_info = getimagesize($filename);
        $this->image_type = $image_info[2];
        if ($this->image_type == IMAGETYPE_JPEG) {
            $this->image = imagecreatefromjpeg($filename);
        } elseif ($this->image_type == IMAGETYPE_GIF) {
            $this->image = imagecreatefromgif($filename);
        } elseif ($this->image_type == IMAGETYPE_PNG) {
            $this->image = imagecreatefrompng($filename);
        }
    }

    function save($filename, $image_type = IMAGETYPE_JPEG, $compression = 75, $permissions = null)
    {
        if ($image_type == IMAGETYPE_JPEG) {
            imagejpeg($this->image, $filename, $compression);
        } elseif ($image_type == IMAGETYPE_GIF) {
            imagegif($this->image, $filename);
        } elseif ($image_type == IMAGETYPE_PNG) {
            imagepng($this->image, $filename);
        }
        if ($permissions != null) {
            chmod($filename, $permissions);
        }
    }

    function output($image_type = IMAGETYPE_JPEG)
    {
        if ($image_type == IMAGETYPE_JPEG) {
            imagejpeg($this->image);
        } elseif ($image_type == IMAGETYPE_GIF) {
            imagegif($this->image);
        } elseif ($image_type == IMAGETYPE_PNG) {
            imagepng($this->image);
        }
    }

    function getWidth()
    {
        return imagesx($this->image);
    }

    function getHeight()
    {
        return imagesy($this->image);
    }

    function resizeToHeight($height)
    {
        $ratio = $height / $this->getHeight();
        $width = $this->getWidth() * $ratio;
        $this->resize($width, $height);
    }

    function resizeToWidth($width)
    {
        $ratio = $width / $this->getWidth();
        $height = $this->getheight() * $ratio;
        $this->resize($width, $height);
    }

    function scale($scale)
    {
        $width = $this->getWidth() * $scale / 100;
        $height = $this->getheight() * $scale / 100;
        $this->resize($width, $height);
    }

    function resize($width, $height)
    {
        $new_image = imagecreatetruecolor($width, $height);
        imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
        $this->image = $new_image;
    }
}

function generateThumbnailImage($source, $destination, $width, $height)
{
    $image = new SimpleImage();
    $image->load($source);
    if ($height == 0) {
        $image->resizeToWidth($width);
    } else {
        $image->resize($width, $height);
    }

    $image->save($destination);
//    $image->save($target_dir . basename($postedFile["name"]));

}

//if (is_uploaded_file($_FILES["fileToUpload"]['tmp_name'])) {
//    mkdir('sssss');
//    savePostedFileUploaded($_FILES["fileToUpload"], 'uploads/',basename($_FILES["fileToUpload"]['name']));
//}

//generateThumbnailImage(basename($_FILES["fileToUpload"]["name"]) . "/uploads", 100);

?>