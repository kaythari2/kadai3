<?php
require_once('header.php');
?>

<center>
    <h1>画像アップロード</h1>
    <div class="wrapper-1">
        <div id="img-preview-1" class="image-preview">
        </div>
        <div class="form">
            <form action="#" name="upload1" class="form_upload">
                <input type="file" name="file1" id="file1" accept=".jpg">
                <!-- <label for="file1">ファイルを選択</label> -->
                <button type="submit">アプロード</button>
            </form>
        </div>
    </div>

    <!-- <form action="#" name="upload1" class="form_upload"> -->
        <!-- <div id="img-preview-1" class="image-preview"></div> -->
        <!-- <img src="" alt="No Image" id="img" style='height:150px;'> -->
        <!-- <input type="file" name="file1" id="file1" accept=".jpg"> -->
        <!-- <label for="file1">ファイルを選択</label> -->
        <!-- <button type="submit">アプロード</button> -->
    <!-- </form> -->
    
    <form action="#" name="upload2" class="form_upload">
        <input type="file" name="file2" accept=".jpg" value="ファイルを選択">
        <button type="submit">アプロード</button>
    </form>
    <form action="#" name="upload3" class="form_upload">
        <input type="file" name="file3" accept=".jpg" value="ファイルを選択" onchange="">
        <button type="submit">アプロード</button>
    </form>
    <form action="#" name="delete_all">
        <button type="submit">全て削除</button>
    </form>
</center>

<?php
require_once('footer.php');
?>