@extends('layout')
@section('content')

<div class="grid max-w-[900px] gap-4 bg-white rounded-sm my-4 mx-auto p-6">
    <section>
        <a href="{{ url()->previous() }}" class="cursor-pointer text-2xl mb-2 font-semibold text-clr-dark-third inline-block"><</a>
        <h2 class="text-2xl mb-2 font-semibold text-clr-dark-third inline-block">New activity</h2>
        <p class="text-clr-dark-gray">Complete all the data to create a new activity.</p>
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

    <form action="{{ route('activities.store') }}" method="POST" class="grid gap-4 w-full">
        @csrf
        <div class="flex gap-6 justify-stretch w-full">
            <div class="bg-gray-300 w-[50%] rounded-sm min-h-full"></div>
            <div class="grid gap-4 w-[50%]">
                <div class="flex gap-4 items-center">
                    <div class="w-full">
                        <label class="text-clr-dark" for="name">Title</label>
                        <input type="text" name="name" class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2" placeholder="Title">
                    </div>
                    <div class="grid" id="percent-container" style="display: none;">
                        <label class="text-clr-dark" for="percent">Percent</label>
                        <input type="number" name="percent" placeholder="0.0" min="0" max="100" class="w-full p-2 border-2 border-clr-light-gray/40 rounded-md mt-2" placeholder="0">
                    </div>
                </div>
                <div class="w-full">
                    <label class="text-clr-dark" for="date">Date</label>
                    <input type="date" name="date" class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2" placeholder="Activity's name">
                </div>
                <div class="w-full">
                    <label class="text-clr-dark" for="time">Starts at</label>
                    <input type="time" name="time" class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2" placeholder="Activity's name">
                </div>
            </div>
        </div>
        <div class="grid gap-4">
            <div>
                <label class="text-clr-dark" for="descripton">Description</label>
                <textarea name="description" class="w-full focus:outline-none resize-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2"></textarea>
            </div>
            <div class="flex gap-4">
                <div class="w-full">
                    <label class="text-clr-dark" for="category">Category</label>
                    <select name="category_id" id="category-select" class="w-full p-2 border-2 border-clr-light-gray/40 rounded-md mt-2">
                        <option value="option">Select a category</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" data-category-id="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full">
                    <label class="text-clr-dark" for="label">Label</label>
                    <select name="label_id" class="w-full p-2 border-2 border-clr-light-gray/40 rounded-md mt-2" id="label-select">
                        <option value="option">Select a label</option>
                        @foreach ($labels as $label)
                        <option value="{{ $label->id }}">{{ $label->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="w-full" id="group-select-container" style="display: none;">
                    <label class="text-clr-dark" for="group">Group</label>
                    <select name="group_id" class="w-full p-2 border-2 border-clr-light-gray/40 rounded-md mt-2">
                        <option value="">Select a group</option>
                        @foreach ($groups as $group)
                        <option value="{{ $group->id }}">{{ $group->course_name }} - {{ $group->number }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="w-full" id="major-select-container" style="display: none;">
                    <label class="text-clr-dark" for="major">Major</label>
                    <select name="major_id" class="w-full p-2 border-2 border-clr-light-gray/40 rounded-md mt-2">
                        <option value="">Select a major</option>
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

        categorySelect.addEventListener('change', function() {
            const selectedCategory = categorySelect.options[categorySelect.selectedIndex].getAttribute('data-category-id');
            if (selectedCategory == '1') { // 1 == category course
                groupSelectContainer.style.display = 'block';
            } else {
                groupSelectContainer.style.display = 'none';
            }

            if (selectedCategory == '4') { // 4 == category major
                majorSelectContainer.style.display = 'block';
            } else {
                majorSelectContainer.style.display = 'none';
            }
        });

        labelSelect.addEventListener('change', function() {
            const selectedLabel = labelSelect.options[labelSelect.selectedIndex].value;
            if (selectedLabel == '2') { // 2 == label homework
                percentContainer.style.display = 'block';
            } else {
                percentContainer.style.display = 'none';
            }
        });
    });
</script>
@endsection