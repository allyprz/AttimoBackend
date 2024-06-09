@extends('layout')
@section('content')

<div class="grid max-w-[900px] gap-4 bg-white rounded-sm my-4 mx-auto p-6">
    <section>
        <a href="{{ url()->previous() }}" class="cursor-pointer text-2xl mb-2 font-semibold text-clr-dark-third inline-block"><</a>
                <h2 class="text-2xl mb-2 font-semibold text-clr-dark-third inline-block">Edit activity</h2>
                <p class="text-clr-dark-gray">Update the information of the activity by filling the form below.</p>
    </section>
    <hr class="border-b-2 text-clr-dark-gray">

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

    <form action="{{ route('activities.update', $activity->id) }}" id="form-create" method="POST" class="grid gap-4 w-full" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="flex gap-6 justify-stretch w-full">
            <div class="drag-area border-2 relative border-gray-400/80 border-dashed w-[50%] rounded-sm h-72 flex flex-col justify-center items-center">
                <img id="preview" class="object-cover w-full h-full" src="{{ asset('images/' . $activity->image) }}">
                <div class="drag-content flex flex-col text-center items-center">
                    <div class="icon"><span class="icon-[material-symbols--cloud-upload] size-16 text-clr-blue/80"></span></div>
                    <span id="drag-text" class="text-clr-light-gray">Drag & Drop to Upload File</span>
                    <span class="text-clr-light-gray">OR</span>
                    <button type="button" id="browse-btn" class="px-2 py-1 mt-2 hover:brightness-90 bg-[#bbc0e1] text-clr-white rounded-sm">Browse File</button>
                </div>
                <input id="file-input" type="file" accept=".jpg, .jpeg, .png, .webp" name="image" hidden>
                <input type="hidden" name="old_image" value="{{ $activity->image }}">
                <input type="hidden" name="old_category_id" value="{{ $activity->categories_activities_id }}">
                <input type="hidden" name="old_label_id" value="{{ $activity->labels_activities_id }}">
                <input type="hidden" name="old_group_id" value="{{ $groupDetails ? $groupDetails->id : null }}">
                <input type="hidden" name="old_major_id" value="{{ $activityMajor ? $activityMajor->id : null }}">

            </div>
            <div class="grid gap-4 w-[50%]">
                <div class="flex gap-4 items-center">
                    <div class="w-full">
                        <label class="text-clr-dark" for="name">Title</label>
                        <input type="text" name="name" class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2" placeholder="Title" value="{{$activity->name}}">
                    </div>
                    <div class="grid" id="percent-container">
                        <label class="text-clr-dark" for="percent">Percent</label>
                        <input type="number" name="percent" placeholder="0.0" min="0" max="100" class="w-full p-2 border-2 border-clr-light-gray/40 rounded-md mt-2" placeholder="0" value="{{$activity->percent}}">
                    </div>
                </div>
                <div class="w-full">
                    <label class="text-clr-dark" for="date">Date</label>
                    <input type="date" name="date" class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2" value="{{ date('Y-m-d', strtotime($activity->scheduled_at)) }}">
                </div>
                <div class="w-full">
                    <label class="text-clr-dark" for="time">Starts at</label>
                    <input type="time" name="time" class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2" value="{{ date('H:i:s', strtotime($activity->scheduled_at)) }}">
                </div>
            </div>
        </div>
        <div class="grid gap-4">
            <div>
                <label class="text-clr-dark" for="descripton">Description</label>
                <textarea name="description" class="w-full focus:outline-none resize-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2">{{$activity->description}}</textarea>
            </div>
            <div class="flex gap-4">
                <div class="w-full">
                    <label class="text-clr-dark" for="category">Category</label>
                    <select name="category_id" id="category-select" class="w-full p-2 border-2 border-clr-light-gray/40 rounded-md mt-2">
                        @foreach ($categories as $category)
                        @if ($category->id == $activity->categories_activities_id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="w-full">
                    <label class="text-clr-dark" for="label">Label</label>
                    <select name="label_id" class="w-full p-2 border-2 border-clr-light-gray/40 rounded-md mt-2" id="label-select">
                        @foreach ($labels as $label)
                        @if ($label->id == $activity->labels_activities_id)
                        <option value="{{ $label->id }}" selected>{{ $label->name }}</option>
                        @else
                        <option value="{{ $label->id }}">{{ $label->name }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>

                <div class="w-full" id="group-select-container">
                    <label class="text-clr-dark" for="group">Group</label>
                    <select name="group_id" class="w-full p-2 border-2 border-clr-light-gray/40 rounded-md mt-2">
                        @foreach ($groups as $group)
                        <option value="{{ $group->id }}" {{ $groupDetails && $group->id == $groupDetails->id ? 'selected' : '' }}>
                            {{ $group->course_name }} - {{ $group->number }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="w-full" id="major-select-container">
                    <label class="text-clr-dark" for="major">Major</label>
                    <select name="major_id" class="w-full p-2 border-2 border-clr-light-gray/40 rounded-md mt-2">
                        @foreach ($majors as $major)
                        @if ($activityMajor)
                        <option value="{{ $major->id }}" {{ $major->id == $activityMajor->id ? 'selected' : '' }}>
                            {{ $major->name }}
                        </option>
                        @else
                        <option value="{{ $major->id }}">
                            {{ $major->name }}
                        </option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <button type="submit" class="w-full p-2 bg-clr-blue text-white rounded-sm hover:brightness-[.85] duration-150">Update information</button>
    </form>
</div>
@vite('resources/js/drag-drop.js')
@vite('resources/js/input-visibility.js')
@endsection