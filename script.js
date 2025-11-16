// Order Form Preview
const photoInput = document.getElementById('photoInput');
const previewImage = document.getElementById('previewImage');

if (photoInput && previewImage) {
  photoInput.addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
      previewImage.src = URL.createObjectURL(file);
    } else {
      previewImage.src = '';
    }
  });
}

// Custom Design Preview
const refInput = document.getElementById("refImage");
const previewImg = document.getElementById("preview-img"); // make sure this exists in HTML

if (refInput && previewImg) {
  refInput.addEventListener("change", function() {
    const file = this.files[0];
    if (file) {
      previewImg.src = URL.createObjectURL(file);
      previewImg.style.display = "block"; // optional
    } else {
      previewImg.src = '';
      previewImg.style.display = "none";
    }
  });
}
