@extends('layout')
@section('content')
<div class="grid max-w-[900px] gap-4 bg-white rounded-sm my-4 mx-auto p-6">
    <section>
        <a href="{{ url()->previous() }}" class="cursor-pointer text-2xl mb-2 font-semibold text-clr-dark-third inline-block"><</a>
        <h2 class="text-2xl mb-2 font-semibold text-clr-dark-third inline-block">Edit Group</h2>
        <p class="text-clr-dark-gray">Update the data for the group.</p>
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
                        <select class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2" name="courses_id" id="course">
                            @foreach ($courses as $course)
                                <option value="{{$course->id}}" {{ $course->id == $group->courses_id ? 'selected' : '' }}>{{$course->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full">
                        <label class="text-clr-dark" for="professor">Professor</label>
                        <select name="users_id" id="professor" class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2">
                            @foreach ($users as $user)
                                @if($user->users_types_id == 2)
                                    <option value="{{$user->id}}" {{ $user->id == $group->users_id ? 'selected' : '' }}>{{$user->name}} {{$user->lastname1}} {{$user->lastname2}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="flex gap-4 items-center">
                    <div class="w-full">
                        <label for="day-of-week">Consultations days</label>
                        <select id="day-of-week" name="day_of_week" class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2">
                            <option value="Monday" {{ explode(' ', $group->consultations)[0] == 'Monday' ? 'selected' : '' }}>Monday</option>
                            <option value="Tuesday" {{ explode(' ', $group->consultations)[0] == 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
                            <option value="Wednesday" {{ explode(' ', $group->consultations)[0] == 'Wednesday' ? 'selected' : '' }}>Wednesday</option>
                            <option value="Thursday" {{ explode(' ', $group->consultations)[0] == 'Thursday' ? 'selected' : '' }}>Thursday</option>
                            <option value="Friday" {{ explode(' ', $group->consultations)[0] == 'Friday' ? 'selected' : '' }}>Friday</option>
                            <option value="Saturday" {{ explode(' ', $group->consultations)[0] == 'Saturday' ? 'selected' : '' }}>Saturday</option>
                            <option value="Sunday" {{ explode(' ', $group->consultations)[0] == 'Sunday' ? 'selected' : '' }}>Sunday</option>
                        </select>
                    </div>
                    <div class="w-full">
                        <label class="text-clr-dark" for="start_time">Starts at</label>
                        <input type="time" name="start_time" required class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2" 
                        @if(count(explode('-', $group->consultations)) > 0 && count(explode(' ', explode('-', $group->consultations)[0])) > 1)
                            value="{{ explode(' ', explode('-', $group->consultations)[0])[1] }}"
                        @endif>
                    </div>
                    <div class="w-full">
                        <label class="text-clr-dark" for="end_time">Ends at</label>
                        <input type="time" name="end_time" required class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2" 
                        @if(count(explode('-', $group->consultations)) > 1 && count(explode(' ', explode('-', $group->consultations)[1])) > 1)
                            value="{{ explode(' ', explode('-', $group->consultations)[1])[1] }}"
                        @endif>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="w-full p-2 bg-clr-blue text-white rounded-sm hover:brightness-[.85] duration-150">
            Update Group
        </button>
    </form>
</div>
@endsection
