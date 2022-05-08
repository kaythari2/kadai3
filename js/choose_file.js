$(document).ready (function() {
    const file1 = document.getElementById("file1");
    const imgPreview1 = document.getElementById("img-preview-1");
    
    file1.addEventListener("change", function () {
        // getImgData(file1, imgPreview1);
    });

    const file2 = document.getElementById("file2");
    const imgPreview2 = document.getElementById("img-preview-2");
    
    file2.addEventListener("change", function () {
        getImgData(file2, imgPreview2);
    });

    const file3 = document.getElementById("file3");
    const imgPreview3 = document.getElementById("img-preview-3");
    
    file3.addEventListener("change", function () {
        getImgData(file3, imgPreview3);
    });
})


function getImgData(file, imagePreview) {
    const files = file.files[0];
    console.log("getting imgData " + files);
    if (files) {
        const fileReader = new FileReader();
        fileReader.readAsDataURL(files);
        fileReader.addEventListener("load", function () {
            imagePreview.style.display = "block";
            imagePreview.innerHTML = '<img src="' + this.result + '" />';
        });
    }
}

function validImgSize(file) {
    if (typeof (file.files) != "undefined") {
        var size = parseFloat(file.files[0].size / 1024).toFixed(2);
        if (size > 2000) alert("ファイルサイズは2MBまでです。");
        else {
            saveImgTmp();
            window.location = "confirm.php";
            return;
        }
    } else {
        alert("This browser does not support HTML5.");
    }
}

function saveImgTmp() {
    alert("Image Will be saved");
}