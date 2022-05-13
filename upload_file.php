<?php
session_start();
$tmp_directory = "tmp/";

if (isset($_POST['upload_img_1'])) {
    $imageName = '001.jpg';
} elseif (isset($_POST['upload_img_2'])) {
    $imageName = '002.jpg';
} elseif (isset($_POST['upload_img_3'])) {
    $imageName = '003.jpg';
} elseif (isset($_POST['image-name'])) {
    $imageName = $_POST['image-name'];
}

if (isset($_POST['register'])) {
    $reged_directory = "registered/";
    if (!isset($imageName)) {
        $imageName = $_POST['image-name'];
    }
    if (!file_exists($reged_directory)) {
        mkdir($reged_directory);
    }
    $moved = rename($tmp_directory . $imageName, $reged_directory . $imageName); //should move the file
    if ($moved) {
        header("Location: index.php?status=registered");
    } else {
        unlink($reged_directory . $imageName);
        copy($tmp_directory . $imageName, $reged_directory . $imageName);
        unlink($tmp_directory . $imageName);
    }
    return;
}

if (isset($_POST['upload_img_1'])) {
    $fileName = 'file1';
} elseif(isset($_POST['upload_img_2'])) {
    $fileName = 'file2';
} elseif(isset($_POST['upload_img_3'])) {
    $fileName = 'file3';
} else {
    $fileName = null;
}

if (!file_exists($tmp_directory)) {
    mkdir($tmp_directory);
}
$filepath = $tmp_directory . $imageName;
$uploadOk = false;

$file = $_FILES[$fileName];
if ($file["size"] > 2000000) {
    $_SESSION['error'] = '画像は2MB以内で入力して下さい。';
    header("Location: index.php");
    return;
}

$file_mime_type = $file["type"];
$f_info = finfo_open(FILEINFO_MIME_TYPE); 
$mime = finfo_file($f_info, $file['tmp_name']);
finfo_close($f_info);

if ($mime == "image/jpeg" || $mime == "image/jpg") {
    if (move_uploaded_file($_FILES[$fileName]["tmp_name"], $filepath)) {
        $uploadOk = true;
    } else {
        $_SESSION['error'] = 'error';
        header("Location: index.php");
    }
} else {
    $_SESSION['error'] = '拡張子はjpgで入力して下さい。';
    header("Location: index.php");
    return;
}

?>

<center>
    <div id="content">
        <h1>確認画面</h1>
        <br>
        <span>以下の画像を登録します。</span>
        <br>
        <br>
        <form action="" method="post">
            <?php
            if (isset($filepath) && $filepath != '') {
                echo "<img src=" . $filepath . " height='300' width='auto' />";
            }
            ?>
            <br>
            <br>
            <a href="javascript:history.go(-1);"><input type="button" value="戻る"></a>
            <br>
            <br>
            <input type="hidden" name="image-name" value=<?php echo isset($imageName) ? $imageName : '' ?>>
            <input type="submit" name="register" value="登録">
        </form>
    </div>
</center>