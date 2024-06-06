@extends('layout')
@section('content')

<div class="grid max-w-[900px] gap-4 bg-white rounded-sm my-4 mx-auto p-6">
    <section>
        <a href="{{ route('activities.index') }}" class="cursor-pointer text-2xl mb-2 font-semibold text-clr-dark-third inline-block"><</a>
        <h2 class="text-2xl mb-2 font-semibold text-clr-dark-third inline-block">Activity's details</h2>
        <p class="text-clr-dark-gray">Here you can see the details of the activity.</p>
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

    <div class="grid gap-4 w-full">
        <div class="flex gap-6 justify-stretch w-full">
            <div class="bg-gray-300 w-[50%] rounded-sm min-h-full"></div>
            <div class="grid gap-4 w-[50%]">
                <div class="flex gap-4 items-center">
                    <div class="w-full">
                        <label class="text-clr-dark" for="name">Title</label>
                        <input type="text" name="name" readonly class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2" value="{{ $activity->name }}">
                    </div>
                    @if ($activity->percent > 0)
                    <div class="grid" id="percent-container">
                        <label class="text-clr-dark" for="percent">Percent</label>
                        <input type="number" name="percent" readonly placeholder="0.0" min="0" max="100" class="focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2" value="{{ $activity->percent }}">
                    </div>
                    @endif
                </div>
                <div class="w-full">
                    <label class="text-clr-dark" for="date">Date</label>
                    <input type="date" name="date" readonly class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2" value="{{ date('Y-m-d', strtotime($activity->scheduled_at)) }}">
                </div>
                <div class="w-full">
                    <label class="text-clr-dark" for="time">Starts at</label>
                    <input type="time" name="time" readonly class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2" value="{{ date('H:i:s', strtotime($activity->scheduled_at)) }}">
                </div>
            </div>
        </div>
        <div class="grid gap-4">
            <div>
                <label class="text-clr-dark" for="descripton">Description</label>
                <textarea name="description" readonly class="w-full focus:outline-none resize-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2">{{ $activity->description }}</textarea>
            </div>
            <div class="flex gap-4">
                <div class="w-full">
                    <label class="text-clr-dark" for="category">Category</label>
                    <input type="text" id="category-select" readonly class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2" value="{{ $activity->category_name }}">
                </div>
                <div class="w-full">
                    <label class="text-clr-dark" for="label">Label</label>
                    <input type="text" readonly class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2" id="label-select" value="{{ $activity->label_name }}">
                </div>

                @isset($groupDetails)
                <div class="w-full" id="group-select-container">
                    <label class="text-clr-dark" for="group">Group</label>
                    <input type="text" readonly class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2" value="{{ $groupDetails->course_name }} - {{ $groupDetails->group_number }}">
                </div>
                @endisset
                
                @isset($major)
                <div class="w-full" id="major-select-container">
                    <label class="text-clr-dark" for="major">Major</label>
                    <input type="text" readonly class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2" value="{{ $major ? $major : '' }}">
                </div>
                @endisset
            </div>
        </div>
    </div>
</div>

@endsection