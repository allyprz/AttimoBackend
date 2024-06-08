document.addEventListener('DOMContentLoaded', function() {
    const dragArea = document.querySelector('.drag-area');
    const img = document.getElementById('preview');
    const dragText = document.getElementById('drag-text');
    const fileInput = document.getElementById('file-input');
    const form = document.getElementById('form-create');
    const browseBtn = document.getElementById('browse-btn');
    const dragContent = document.querySelector('.drag-content');

    browseBtn.onclick = () => {
        fileInput.click();
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = function(e) {
                img.setAttribute('src', e.target.result);
                img.style.display = 'block';
                dragContent.style.display = 'none';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function handleImageChange() {
        if (fileInput.files.length > 0) {
            img.style.display = 'block';
            dragContent.style.display = 'none';
            readURL(fileInput);
        } else {
            img.style.display = 'none';
            dragContent.style.display = 'flex';
        }
    }

    fileInput.addEventListener("change", function() {
        dragArea.classList.add("active");
        handleImageChange();
    });

    dragArea.addEventListener("dragover", (event) => {
        event.preventDefault();
        dragArea.classList.add("active");
        dragText.textContent = "Release to Upload File";
    });

    dragArea.addEventListener("dragleave", () => {
        dragArea.classList.remove("active");
        dragText.textContent = "Drag & Drop to Upload File";
    });

    dragArea.addEventListener("drop", (event) => {
        event.preventDefault();
        const file = event.dataTransfer.files[0];
        const validExtensions = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
        if (!validExtensions.includes(file.type)) {
            alert('Please, select a valid image file (.jpg, .jpeg, .png, .webp).');
            return;
        }
        // Use the file only if the extension is valid
        fileInput.files = event.dataTransfer.files;
        handleImageChange();
    });

    fileInput.addEventListener('change', function() {
        const file = fileInput.files[0];
        const validExtensions = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
        if (!validExtensions.includes(file.type)) {
            alert('Please, select a valid image file (.jpg, .jpeg, .png, .webp).');
            fileInput.value = '';
            handleImageChange();
        }
    });

    form.addEventListener('submit', function(event) {
        if (!fileInput.files.length) {
            alert('Please, select an image before sending the information.');
            event.preventDefault();
        }
    });

    handleImageChange();
});
