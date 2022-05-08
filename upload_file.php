<?php
include_once('header.php');
?>
<center>
    <div id="content">
        <h1>確認画面</h1>
        <br>
        <span>以下の画像を登録します。</span><br>
        <form action="" method="post">
            <?php
            if (isset($_POST['upload_img_1'])) {
                $tmp_directory = "tmp/";
                if(!file_exists($tmp_directory)){
                    mkdir($tmp_directory);
                }
                $filepath = $tmp_directory . '001.jpg';

                if (move_uploaded_file($_FILES["file1"]["tmp_name"], $filepath)) {
                    echo "<img src=" . $filepath . " height=auto width=300 />";
                } else {
                    echo "Error !!";
                }
            }
            ?>
            <br>
            <a href="javascript:history.go(-1);"><input type="button" value="戻る"></a>
            <br>
            <input type="submit" name="register" value="登録">
        </form>
    </div>
</center>
<?php
include_once('footer.php');
?>