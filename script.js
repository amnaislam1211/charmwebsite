const fileInput = document.getElementById("photoInput");
const previewContainer = document.getElementById("previewContainer");
let uploadedFiles = [];

fileInput.addEventListener("change", function () {
  const files = Array.from(fileInput.files);

  files.forEach(f => {
    // Avoid duplicate previews
    if (uploadedFiles.includes(f)) return;
    uploadedFiles.push(f);

    const reader = new FileReader();
    reader.onload = (function(file) { 
      return function(e) {
        const box = document.createElement("div");
        box.classList.add("preview-box");

        const img = document.createElement("img");
        img.src = e.target.result;

        const removeBtn = document.createElement("div");
        removeBtn.classList.add("remove-btn");
        removeBtn.textContent = "×";

        removeBtn.addEventListener("click", () => {
          const index = uploadedFiles.indexOf(file);
          if (index > -1) uploadedFiles.splice(index, 1);
          box.remove();
          updateFileInput();
        });

        box.appendChild(img);
        box.appendChild(removeBtn);
        previewContainer.appendChild(box);
      };
    })(f);

    reader.readAsDataURL(f);
  });

  updateFileInput();
});

function updateFileInput() {
  const dataTransfer = new DataTransfer();
  uploadedFiles.forEach(f => dataTransfer.items.add(f));
  fileInput.files = dataTransfer.files;
}
