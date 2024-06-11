@extends('layout')

@section('content')
<div class="grid max-w-[900px] gap-4 bg-white rounded-sm my-4 mx-auto p-6">
    <section>
        <a href="{{ url()->previous() }}" class="cursor-pointer text-2xl mb-2 font-semibold text-clr-dark-third inline-block"><</a>
        <h2 class="text-2xl mb-2 font-semibold text-clr-dark-third inline-block">Group</h2>
        <p class="text-clr-dark-gray">Details of the group.</p>
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

    <form action="{{ route('groups.update', $group->id) }}" method="POST" class="grid gap-4 w-full">
        @csrf
        @method('PUT')
        <div class="flex gap-6 justify-stretch w-full">
            <div class="grid gap-4 w-full">
                
            <div class="flex gap-4 items-center">
                <div class="w-full">
                    <label class="text-clr-dark" for="course_name">Course</label>
                    <p class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2" id="course_name">
                        {{ $group->course->name ?? 'Not Assigned' }}
                    </p>
                </div>
                <div class="w-full">
                    <label class="text-clr-dark" for="professor_name">Professor</label>
                    <p class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2" id="professor_name">
                        {{ $group->user->name ?? 'Not Assigned' }} {{ $group->user->lastname1 ?? '' }} {{ $group->user->lastname2 ?? '' }}
                    </p>
                </div>
            </div>

                <div class="flex gap-4 items-center">
                    <div class="w-full">
                        <label for="day-of-week">Consultations days</label>
                        <input type="text" id="day-of-week" name="day_of_week" readonly class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2" 
                        value="{{ explode(' ', $group->consultations)[0] }}">
                    </div>
                    <div class="w-full">
                        <label class="text-clr-dark" for="start_time">Starts at</label>
                        <input type="time" id="start_time" name="start_time" readonly class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2" 
                        value="{{ count(explode('-', $group->consultations)) > 0 && count(explode(' ', explode('-', $group->consultations)[0])) > 1 ? explode(' ', explode('-', $group->consultations)[0])[1] : '' }}">
                    </div>
                    <div class="w-full">
                        <label class="text-clr-dark" for="end_time">Ends at</label>
                        <input type="time" id="end_time" name="end_time" readonly class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2" 
                        value="{{ count(explode('-', $group->consultations)) > 1 && count(explode(' ', explode('-', $group->consultations)[1])) > 1 ? explode(' ', explode('-', $group->consultations)[1])[1] : '' }}">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
