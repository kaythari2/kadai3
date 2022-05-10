<?php
require_once('header.php');

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
?>

<center id="container">
    <h1>画像アップロード</h1>
    <span style="color: green;"><?php if (isset($_GET["status"]) && $_GET["status"] == "registered") {
                                    echo "登録に成功しました。";
                                } ?></span>
    <span class="error"><?php if (isset($_GET['error']) && !empty($_GET['error'])) {
                            echo $_GET['error'];
                        } ?></span>

    <div class="<?php echo in_array('1', $cleaned) ? 'hide' : 'wrapper' ?>">
        <div class="form">
            <form action="upload_file.php" class="form_upload" method="POST" enctype="multipart/form-data">
                <input type="file" id="file1" name="file1">
                <button type="submit" id="upload_img_1" name="upload_img_1">アプロード</button>
            </form>
        </div>
    </div>

    <br>

    <div class="<?php echo in_array('2', $cleaned) ? 'hide' : 'wrapper' ?>">
        <div class="form">
            <form action="upload_file.php" class="form_upload" method="POST" enctype="multipart/form-data">
                <input type="file" name="file2" id="file2">
                <button type="submit" id="upload_img_2" name='upload_img_2'>アプロード</button>
            </form>
        </div>
    </div>

    <br>

    <div class="<?php echo in_array('3', $cleaned) ? 'hide' : 'wrapper' ?>">
        <div class="form">
            <form action="upload_file.php" class="form_upload" method="POST" enctype="multipart/form-data">
                <input type="file" name="file3" id="file3">
                <button type="submit" id="upload_img_3" name='upload_img_3'>アプロード</button>
            </form>
        </div>
    </div>

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