@extends('layout')
@section('content')

<div class="grid max-w-[900px] gap-4 bg-white rounded-sm my-4 mx-auto p-6">
    <section>
        <a href="{{ url()->previous() }}" class="cursor-pointer text-2xl mb-2 font-semibold text-clr-dark-third inline-block"><</a>
        <h2 class="text-2xl mb-2 font-semibold text-clr-dark-third inline-block">New activity</h2>
        <p class="text-clr-dark-gray">Complete all the data to create a new activity.</p>
    </section>
    <hr class="border-b-[1.5px] text-clr-dark-gray">

    @if ($errors->any())
    <div class="text-clr-blue font-regular bg-clr-blue/20 p-2 rounded-md">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('activities.store') }}" method="POST" id="form-create" class="grid gap-4 w-full">
        @csrf
        <div class="flex gap-6 justify-stretch w-full">
            <div class="drag-area border-2 relative border-gray-400/80 border-dashed w-[50%] rounded-sm h-72 flex flex-col justify-center items-center">
                <button type="button" id="close-img" style="display:none" class="p-1 flex justify-center items-center rounded-full bg-clr-light-gray/45 z-20 absolute right-2 top-2"><span class="icon-[material-symbols--close-rounded]"></span></button>
                <div class="icon"><span class="icon-[material-symbols--cloud-upload] size-16 text-clr-blue/80"></span></div>
                <span id="drag-text" class="text-clr-light-gray">Drag & Drop to Upload File</span>
                <span class="text-clr-light-gray">OR</span>
                <button type="button" id="browse-btn" class="px-2 py-1 mt-2 hover:brightness-90 bg-[#bbc0e1] text-clr-white rounded-sm">Browse File</button>
                <input id="file-input" type="file" accept=".jpg, .jpeg, .png, .webp" hidden>
            </div>
            <div class="grid gap-4 w-[50%]">
                <div class="flex gap-4 items-center">
                    <div class="w-full">
                        <label class="text-clr-dark" for="name">Title</label>
                        <input type="text" name="name" required class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2" placeholder="Name of the activity">
                    </div>
                    <div class="grid" id="percent-container" style="display: none;">
                        <label class="text-clr-dark" for="percent">Percent</label>
                        <input type="number" name="percent" required placeholder="0.0" min="0" max="100" class="w-full p-2 border-2 border-clr-light-gray/40 rounded-md mt-2" placeholder="0">
                    </div>
                </div>
                <div class="w-full">
                    <label class="text-clr-dark" for="date">Date</label>
                    <input type="date" name="date" required class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2">
                </div>
                <div class="w-full">
                    <label class="text-clr-dark" for="time">Starts at</label>
                    <input type="time" name="time" required class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2">
                </div>
            </div>
        </div>
        <div class="grid gap-4">
            <div>
                <label class="text-clr-dark" for="descripton">Description</label>
                <textarea name="description" required class="w-full focus:outline-none resize-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2" placeholder="Give a brief overview of your activity"></textarea>
            </div>
            <div class="flex gap-4">
                <div class="w-full">
                    <label class="text-clr-dark" for="category">Category</label>
                    <select name="category_id" required id="category-select" class="w-full p-2 border-2 border-clr-light-gray/40 rounded-md mt-2">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full">
                    <label class="text-clr-dark" for="label">Label</label>
                    <select name="label_id" required class="w-full p-2 border-2 border-clr-light-gray/40 rounded-md mt-2" id="label-select">
                        @foreach ($labels as $label)
                        <option value="{{ $label->id }}">{{ $label->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="w-full" id="group-select-container" style="display: none;">
                    <label class="text-clr-dark" for="group">Group</label>
                    <select name="group_id" class="w-full p-2 border-2 border-clr-light-gray/40 rounded-md mt-2" required>
                        @foreach ($groups as $group)
                        <option value="{{ $group->id }}">{{ $group->course_name }} - {{ $group->number }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="w-full" id="major-select-container" style="display: none;">
                    <label class="text-clr-dark" for="major">Major</label>
                    <select name="major_id" class="w-full p-2 border-2 border-clr-light-gray/40 rounded-md mt-2" required>
                        @foreach ($majors as $major)
                        <option value="{{ $major->id }}">{{ $major->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <button type="submit" class="w-full p-2 bg-clr-blue text-white rounded-sm hover:brightness-[.85] duration-150">Create activity</button>
    </form>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const categorySelect = document.getElementById('category-select');
        const groupSelectContainer = document.getElementById('group-select-container');
        const majorSelectContainer = document.getElementById('major-select-container');
        const labelSelect = document.getElementById('label-select');
        const percentContainer = document.getElementById('percent-container');

        function handleCategoryChange() {
            let selectedCategory = categorySelect.value;
            switch (selectedCategory) {
                case '1': // 1 == category course
                    groupSelectContainer.style.display = 'block';
                    majorSelectContainer.style.display = 'none';
                    break;
                case '4': // 4 == category major
                    majorSelectContainer.style.display = 'block';
                    groupSelectContainer.style.display = 'none';
                    break;

                default:
                    groupSelectContainer.style.display = 'none';
                    majorSelectContainer.style.display = 'none';
            }
        }

        function handleLabelChange() {
            const selectedLabel = labelSelect.value;
            const percentInput = document.querySelector('input[name="percent"]');
            if (selectedLabel == '2') { // 2 == label homework
                percentContainer.style.display = 'block';
                percentInput.required = true; // Add required attribute
            } else {
                percentContainer.style.display = 'none';
                percentInput.required = false; // Remove required attribute
            }
        }

        categorySelect.addEventListener('change', handleCategoryChange);
        labelSelect.addEventListener('change', handleLabelChange);

        //Drag and drop
        const dragArea = document.querySelector('.drag-area');
        const dragText = document.getElementById('drag-text');
        const fileInput = document.getElementById('file-input');
        const browseBtn = document.getElementById('browse-btn');
        const closeImgBtn = document.getElementById('close-img');
        const form = document.getElementById('form-create');

        browseBtn.onclick = () => {
            fileInput.click(); //if user click on the button then the input also clicked
        }

        fileInput.addEventListener("change", function() {
            //getting user select file and [0] this means if user select multiple files then we'll select only the first one
            file = this.files[0];
            dragArea.classList.add("active");
            showFile(); //calling function
        });

        //If user Drag File Over DropArea
        dragArea.addEventListener("dragover", (event) => {
            event.preventDefault(); //preventing from default behaviour
            dragArea.classList.add("active");
            dragText.textContent = "Release to Upload File";
        });

        //If user leave dragged File from DropArea
        dragArea.addEventListener("dragleave", () => {
            dragArea.classList.remove("active");
            dragText.textContent = "Drag & Drop to Upload File";
        });

        //If user drop File on DropArea
        dragArea.addEventListener("drop", (event) => {
            event.preventDefault(); //preventing from default behaviour
            //getting user select file and [0] this means if user select multiple files then we'll select only the first one
            file = event.dataTransfer.files[0];
            showFile(); //calling function
        });

        function showFile() {
            let fileType = file.type; //getting selected file type
            let validExtensions = ["image/jpeg", "image/jpg", "image/png", "image/webp"]; //adding some valid image extensions in array
            if (validExtensions.includes(fileType)) { //if user selected file is an image file
                let fileReader = new FileReader(); //creating new FileReader object
                fileReader.onload = () => {
                    let fileURL = fileReader.result; //passing user file source in fileURL variable
                    let imgTag = `<img src="${fileURL}" alt="image" class="w-full h-full object-cover">`; //creating an img tag and passing user selected file source inside src attribute
                    dragArea.innerHTML = imgTag; //adding that created img tag inside dropArea container
                    closeImgBtn.style.display = 'block'; // show the close button
                }
                fileReader.readAsDataURL(file);
            } else {
                alert("This is not an Image File!");
                dragArea.classList.remove("active");
                dragText.textContent = "Drag & Drop to Upload File";
            }
        }

        closeImgBtn.addEventListener('click', function() {
            // remove the image
            dragArea.innerHTML = '';
            // hide the close button
            closeImgBtn.style.display = 'none';
            // reset the drag text
            dragText.textContent = "Drag & Drop to Upload File";
        });

        form.addEventListener('submit', function(event) {
            if (!fileInput.files.length) {
                alert('Please, select an image before sending the information.');
                event.preventDefault(); // prevent the form from being submitted
            }
        });

        // Initial check
        handleCategoryChange();
        handleLabelChange();
    });
</script>
@endsection