<?php
require_once('header.php');
?>

<center id="container">
    <h1>画像アップロード</h1>
    <span style="color: green;"><?php if (isset($_GET["status"]) && $_GET["status"] == "registered") {
                                    echo "登録に成功しました。";
                                } ?></span>
    <span style="color: red;"><?php if (isset($_GET['e']) && !empty($_GET['e'])) {
                                    echo $_GET['e'];
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
</center>

<?php
require_once('footer.php');
?>