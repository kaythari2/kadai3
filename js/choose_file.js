$(document).ready (function() {
    const file1 = document.getElementById("file1");
    const imgPreview1 = document.getElementById("img-preview-1");
    
    file1.addEventListener("change", function () {
        console.log("FIle 1 >>> Changed");
        getImgData(file1, imgPreview1);
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

function getImageData(input) {
    if (input.files && input.files[0]) {
    
      var reader = new FileReader();
      reader.onload = function (e) { 
        document.querySelector("#img").setAttribute("src",e.target.result);
      };

      reader.readAsDataURL(input.files[0]); 
    }
  }