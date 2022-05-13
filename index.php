<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$files = glob("registered/*.jpg");

if (isset($_POST["delete"])) {
    unlink($_POST["image-name"]);
    header('Location: index.php');
}

if (isset($_POST["delete-all"])) {
    foreach ($files as $file) {
        unlink($file);
    }
    header('Location: index.php');
}

$cleaned = array_map(function ($file) {
    return intval(basename($file, ".jpg"));
}, $files);

require_once('header.php');
?>

<center id="container">
    <h1>画像アップロード</h1>
    <span style="color: green;"><?php if (isset($_SESSION["status"]) && $_SESSION["status"] == "registered") {
                                    echo "登録に成功しました。";
                                    unset($_SESSION['status']);
                                } ?></span>
    <span class="error"><?php if (!empty($_SESSION['error'])) {
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        } ?></span>

    <?php
    for ($i = 1; $i <= 3; $i++) {
    ?>
        <div class="<?php echo in_array($i, $cleaned) ? 'hide' : 'wrapper' ?>">
            <div class="form">
                <form action="upload_file.php" class="form_upload" method="POST" enctype="multipart/form-data">
                    <input type="file" id="<?php echo 'file' . $i ?>" name="<?php echo 'file' . $i ?>">
                    <button type="submit" id="<?php echo 'upload_img_' . $i ?>" name="<?php echo 'upload_img_' . $i ?>">アプロード</button>
                </form>
            </div>
        </div>
    <?php
    }
    ?>

    <form action="index.php" class="<?php echo empty($files) ? 'hide' : 'delete-all-form' ?>" method="POST">
        <button type="submit" name='delete-all'>すべて削除</button>
    </form>

    <?php
    foreach ($files as $file) {
    ?>
        <div class="uploaded-wrapper">
            <div id="img-preview" class="image-preview">
                <img src="<?php echo $file; ?>" height="300" width='auto' />
            </div>
            <div class="form">
                <form action="index.php" method="POST" class="delete-form">
                    <input type="hidden" name="image-name" value="<?php echo $file; ?>">
                    <button type="submit" name='delete'>削除</button>
                </form>
            </div>
        </div>

    <?php
    }
    ?>

</center>

<?php
require_once('footer.php');
?>