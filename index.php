<?php
require_once('header.php');
$files = glob("registered/*.jpg");
?>

<center id="container">
    <h1>画像アップロード</h1>
    <span style="color: green;"><?php if (isset($_GET["status"]) && $_GET["status"] == "registered") {
                                    echo "登録に成功しました。";
                                } ?></span>
    <span class="error"><?php if (isset($_GET['error']) && !empty($_GET['error'])) {
                            echo $_GET['error'];
                        } ?></span>
    <div class="wrapper">

        <div id="img-preview-1" class="image-preview">
        </div>
        <div class="form">
            <form action="upload_file.php" class="form_upload" method="POST" enctype="multipart/form-data">
                <input type="file" id="file1" name="file1">
                <button type="submit" id="upload_img_1" name="upload_img_1">アプロード</button>
            </form>
        </div>
    </div>

    <br>

    <div class="wrapper">
        <div id="img-preview-2" class="image-preview">
        </div>
        <div class="form">
            <form action="upload_file.php" class="form_upload" method="POST" enctype="multipart/form-data">
                <input type="file" name="file2" id="file2">
                <button type="submit" id="upload_img_2" name='upload_img_2'>アプロード</button>
            </form>
        </div>
    </div>

    <br>

    <div class="wrapper">
        <div id="img-preview-3" class="image-preview">
        </div>
        <div class="form">
            <form action="upload_file.php" class="form_upload" method="POST" enctype="multipart/form-data">
                <input type="file" name="file3" id="file3">
                <button type="submit" id="upload_img_3" name='upload_img_3'>アプロード</button>
            </form>
        </div>
    </div>

    <form action="#" name="delete_all">
        <button type="submit">全て削除</button>
    </form>

    <?php
    foreach ($files as $file) {
    ?>
        <form action="index.php" method="post" class="delete-submit">
            <div id="image-frame">
                <div id="image-preview">
                    <img src="<?php echo $file; ?>" height="300" width='auto' />
                </div>
                <input type="hidden" name="image-name" value="<?php echo $file; ?>">
                <input type="submit" name="delete" class="delete" value="削除">
            </div>
        </form>
    <?php
    }
    ?>

</center>

<?php
require_once('footer.php');
?>