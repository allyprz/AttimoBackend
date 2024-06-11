@extends('layout')
@section('content')

<div class="grid max-w-[900px] gap-4 bg-white rounded-sm my-4 mx-auto p-6">
    <section>
        <a href="{{ url()->previous() }}" class="cursor-pointer text-2xl mb-2 font-semibold text-clr-dark-third inline-block"><</a>
        <h2 class="text-2xl mb-2 font-semibold text-clr-dark-third inline-block">New Group</h2>
        <p class="text-clr-dark-gray">Complete all the data to create a new group.</p>
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

    <form action="{{ route('groups.store') }}" method="POST" class="grid gap-4 w-full">
        @csrf
        <div class="flex gap-6 justify-stretch w-full">
            <div class="grid gap-4 w-full">
                <div class="flex gap-4 items-center">
                    <div class="w-full">
                        <label class="text-clr-dark" for="course_name">Course</label>
                        <select class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2" name="courses_id" id="course">
                            @foreach ($courses as $course)
                            <option value="{{$course->id}}">{{$course->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full">
                        <label class="text-clr-dark" for="professor">Professor</label>
                        <select name="users_id" id="professor" class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2">
                            @foreach ($users as $user)
                                @if($user->users_types_id == 2)
                                <option value="{{$user->id}}">{{$user->name}} {{$user->lastname1}} {{$user->lastname2}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="flex gap-4 items-center">
                    <div class="w-full">
                        <label for="day-of-week">Consultations days</label>
                        <select id="day-of-week" name="day_of_week" class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2">
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                            <option value="Sunday">Sunday</option>
                        </select>
                    </div>
                    <div class="w-full">
                        <label class="text-clr-dark" for="start_time">Starts at</label>
                        <input type="time" name="start_time" required class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2">
                    </div>
                    <div class="w-full">
                        <label class="text-clr-dark" for="ends_time">Ends at</label>
                        <input type="time" name="end_time" required class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2">
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <section class="flex justify-between items-center">
                <h2>Users list</h2>
                <span class="px-2 py-1 bg-clr-light-secondary-bg/40 border-clr-light-secondary-bg border-2 rounded-md mb-4 text-clr-blue">Members selected: 
                    <span id="selectedCount">0</span>
                </span>
            </section>
            <table class="table min-w-full text-center text-sm text-clr-dark-gray">
                <thead class="border-b border-clr-light-gray dark:border-white/10 dark:text-clr-blue">
                    <tr>
                        <th scope="col" class="px-6 py-3 font-medium">Picture</th>
                        <th scope="col" class="px-6 py-3 font-medium">Name</th>
                        <th scope="col" class="px-6 py-3 font-medium">Last names</th>
                        <th scope="col" class="px-6 py-3 font-medium">Role</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr class="border-b border-neutral-200 dark:border-white/10">
                        <td class="py-2"><input type="checkbox" name="student_ids[]" value="{{ $user->id }}"></td>
                        <td class="py-2"> <img src="https://i.pinimg.com/564x/07/21/38/072138a5acc89f7dd25ede025365bba7.jpg" class="size-10 mx-auto object-cover rounded-full"></img></td>
                        <td class="py-2"> {{ $user->name }}</td>
                        <td class="py-2">{{$user->lastname1}} {{$user->lastname2}}</td>
                        <td class="py-2">{{$user->users_types_name}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <button type="submit" class="w-full p-2 bg-clr-blue text-white rounded-sm hover:brightness-[.85] duration-150">
            Create Group
        </button>
    </form>
</div>
@vite('resources/js/user-count.js')
@endsection
