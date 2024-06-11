document.getElementById('browse-btn').addEventListener('click', function () {
    document.getElementById('file-input').click();
});

document.getElementById('file-input').addEventListener('change', function (e) {
    const file = e.target.files[0];
    const preview = document.getElementById('preview');
    const reader = new FileReader();

    reader.onloadend = function () {
        preview.src = reader.result;
    };

    if (file) {
        // Read the file content as a data URL
        reader.readAsDataURL(file);
    } else {
        // If no file is selected, set the source of the preview image to the user's original image
        preview.src = "{{ asset('images/' . $user->image) }}";
    }
});