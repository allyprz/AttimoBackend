@extends('layout')
@section('content')

<!-- Carga de CSS y JS desde CDN para depuración -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>

<div class="grid max-w-[900px] gap-4 bg-white rounded-sm my-4 mx-auto p-6">
    <section>
        <a href="{{ url()->previous() }}" class="cursor-pointer text-2xl mb-2 font-semibold text-clr-dark-third inline-block"><</a>
            <h2 class="text-2xl mb-2 font-semibold text-clr-dark-third inline-block">Edit course</h2>
            <p class="text-clr-dark-gray">Update the information of the course by filling the form below.</p>
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

    <form action="{{ route('courses.update', $course->id) }}" method="POST" id="form-create" class="grid gap-4 w-full" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="flex gap-6 justify-stretch w-full">
            <div class="drag-area border-2 relative border-gray-400/80 border-dashed w-[50%] rounded-sm h-[19rem] flex flex-col justify-center items-center">
                <img id="preview" class="object-cover w-full h-full" src="{{ asset('images/' . $course->image) }}">
                <div class="drag-content flex flex-col text-center items-center">
                    <div class="icon"><span class="icon-[material-symbols--cloud-upload] size-16 text-clr-blue/80"></span></div>
                    <span id="drag-text" class="text-clr-light-gray">Drag & Drop to Upload File</span>
                    <span class="text-clr-light-gray">OR</span>
                    <button type="button" id="browse-btn" class="px-2 py-1 mt-2 hover:brightness-90 bg-[#bbc0e1] text-clr-white rounded-sm">Browse File</button>
                </div>
                <input id="file-input" type="file" accept=".jpg, .jpeg, .png, .webp" name="image" hidden>
                <input type="hidden" name="old_image" value="{{ $course->image }}">
                <input type="hidden" name="old_majors" value="{{ $selectedMajors }}">
            </div>
            <div class="grid gap-4 w-[50%]">
                <div class="flex gap-4 items-center">
                    <div class="w-full">
                        <label class="text-clr-dark" for="name">Name</label>
                        <input type="text" name="name" required class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2" value="{{$course->name}}" placeholder="Ej. Web design">
                    </div>
                    <div>
                        <label class="text-clr-dark" for="acronyms">Acronyms</label>
                        <input type="text" name="acronyms" required class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2" value="{{$course->acronyms}}" placeholder="Ej. WD">
                    </div>
                </div>
                <div class="w-full flex flex-col gap-2">
                    <label class="text-clr-dark" for="majors">Majors</label>
                    <select id="majors" name="majors[]" required multiple class="w-full overflow-y-scroll focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2">
                        @foreach ($majors as $major)
                        <option value="{{ $major->id }}" {{ $selectedMajors->contains('majors_id', $major->id) ? 'selected' : '' }}>
                            {{ $major->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="text-clr-dark" for="descripton">Description</label>
                    <textarea name="description" required class="w-full focus:outline-none resize-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2" placeholder="Give a brief overview of this course">{{$course->description}}</textarea>
                </div>
            </div>
        </div>
        <button type="submit" class="w-full p-2 bg-[#4958a3] text-white rounded-sm hover:brightness-[.85] duration-150">Update information</button>
    </form>
</div>
@vite('resources/js/drag-drop.js')
<script>
    $(document).ready(function() {
        $('#majors').select2({
            placeholder: 'Select major(s)',
            allowClear: true,
            closeOnSelect: false,
            width: 'resolve'
        });
    });
</script>
@endsection