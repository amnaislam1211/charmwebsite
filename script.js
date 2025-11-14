// Live Preview of Uploaded Photo
const photoInput = document.getElementById('photoInput');
const previewImage = document.getElementById('previewImage');
const recipientName = document.getElementById('recipientInput').value;
const recipientNumber = document.getElementById('numberInput').value;

photoInput.addEventListener('change', (e) => {
  const file = e.target.files[0];
  if(file){
    const reader = new FileReader();
    reader.onload = function(event){
      previewImage.src = event.target.result;
    }
    reader.readAsDataURL(file);
  }
});
const refInput = document.getElementById("refImage");
const previewImg = document.getElementById("preview-img");

refInput.addEventListener("change", function() {
  const file = this.files[0];
  if (file) {
    previewImg.src = URL.createObjectURL(file);
    previewImg.style.display = "block";
  }
});
