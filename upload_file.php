<?php
$tmp_directory = "tmp/";
$imageName = (isset($_POST['upload_img_1'])) ? '001.jpg' : ((isset($_POST['upload_img_2'])) ? '002.jpg' : ((isset($_POST['upload_img_3'])) ? '003.jpg' : null));

if (isset($_POST['register'])) {
    $reged_directory = "registered/";
    if(!file_exists($reged_directory)) {
        mkdir($reged_directory);
    }
    $moved = rename($tmp_directory.$imageName, $reged_directory.$imageName); //should move the file
    if($moved)  {
        header("Location: index.php?status=registered");
    } else {
        header("Location: index.php?e=登録エラー");
    }
    return;
}
$fileName = (isset($_POST['upload_img_1'])) ? 'file1' : ((isset($_POST['upload_img_2'])) ? 'file2' : ((isset($_POST['upload_img_3'])) ? 'file3' : null));

if (!file_exists($tmp_directory)) {
    mkdir($tmp_directory);
}
$filepath = $tmp_directory . $imageName;
$uploadOk = false;

$file = $_FILES[$fileName];
if ($file["size"] > 2000000) {
    header("Location: index.php?e=画像は2MB以内で入力して下さい。");
    return;
}

$target_file=basename($file["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if ($imageFileType != "jpg") {
    header("Location: index.php?e=拡張子はjpgで入力して下さい。");
    return;
}

if (move_uploaded_file($_FILES[$fileName]["tmp_name"], $filepath)) {
    // echo "<img src=" . $filepath . " height=auto width=300 />";
    $uploadOk = true;
} else {
    header("Location: index.php?e=error");
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
                echo "<img src=" . $filepath . " height=auto width=300 />";
            }
            ?>
            <br>
            <br>
            <a href="javascript:history.go(-1);"><input type="button" value="戻る"></a>
            <br>
            <br>
            <input type="submit" name="register" value="登録">
        </form>
    </div>
</center>