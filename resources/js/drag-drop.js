document.addEventListener("DOMContentLoaded", function () {
    const dragArea = document.querySelector(".drag-area");
    const img = document.getElementById("preview");
    const dragText = document.getElementById("drag-text");
    const fileInput = document.getElementById("file-input");
    const form = document.getElementById("form-create");
    const browseBtn = document.getElementById("browse-btn");
    const dragContent = document.querySelector(".drag-content");

    // Event for browse button click
    browseBtn.onclick = () => {
        fileInput.click();
    };

    // Function to read URL of the image
    function readURL(input) {
        if (input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = function (e) {
                img.setAttribute("src", e.target.result);
                img.style.display = "block";
                dragContent.style.display = "none";
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Function to handle image change
    function handleImageChange() {
        if (fileInput.files.length > 0) {
            readURL(fileInput);
        } else if (img.getAttribute("src") && img.getAttribute("src") !== "") {
            // If there's an image src, show the image and hide dragContent (edit case)
            img.style.display = "block";
            dragContent.style.display = "none";
        } else {
            // If no image src, hide the image and show dragContent (create case)
            img.style.display = "none";
            dragContent.style.display = "flex";
        }
    }

    // Function to validate image file
    function isValidImageFile(file) {
        const validExtensions = [
            "image/jpeg",
            "image/jpg",
            "image/png",
            "image/webp",
        ];
        return validExtensions.includes(file.type);
    }

    // Initial check to show or hide elements based on image presence
    handleImageChange();

    // Event for file input change
    fileInput.addEventListener("change", function () {
        dragArea.classList.add("active");
        handleImageChange();
    });

    // Event for drag over the drag area
    dragArea.addEventListener("dragover", (event) => {
        event.preventDefault();
        dragArea.classList.add("active");
        dragText.textContent = "Release to Upload File";
    });

    // Event for drag leave from the drag area
    dragArea.addEventListener("dragleave", () => {
        dragArea.classList.remove("active");
        dragText.textContent = "Drag & Drop to Upload File";
    });

    // Event for drop file in the drag area
    dragArea.addEventListener("drop", (event) => {
        event.preventDefault();
        const file = event.dataTransfer.files[0];
        if (!isValidImageFile(file)) {
            alert(
                "Please, select a valid image file (.jpg, .jpeg, .png, .webp)."
            );
            return;
        }
        // Use the file only if the extension is valid
        fileInput.files = event.dataTransfer.files;
        handleImageChange();
    });

    // Event for file input validation on change
    fileInput.addEventListener("change", function () {
        const file = fileInput.files[0];
        if (!isValidImageFile(file)) {
            alert(
                "Please, select a valid image file (.jpg, .jpeg, .png, .webp)."
            );
            fileInput.value = "";
            handleImageChange();
        }
    });

    // Validate that an image is selected before form submission
    form.addEventListener("submit", function (event) {
        if (!fileInput.files.length && !img.getAttribute("src")) {
            alert("Please, select an image before sending the information.");
            event.preventDefault();
        }
    });
});