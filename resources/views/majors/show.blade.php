@extends('layout')
@section('content')

<div class="grid max-w-[900px] gap-4 bg-white rounded-sm my-4 mx-auto p-6">
    <section>
        <a href="{{ url()->previous() }}" class="cursor-pointer text-2xl mb-2 font-semibold text-clr-dark-third inline-block"><</a>
        <h2 class="text-2xl mb-2 font-semibold text-clr-dark-third inline-block">Show Major</h2>
        <p class="text-clr-dark-gray">Here you can find the major's details.</p>
    </section>
    <hr class="border-b-2 text-clr-dark-gray">

    <div class="flex gap-6 justify-stretch w-full">
        <div class="grid gap-4 w-full">
            <div class="flex gap-4 items-center">
                <div class="w-full">
                    <label class="text-clr-dark" for="name">Major Name</label>
                    <input type="text" name="name" id="major_name" class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2" placeholder="" 
                           value="{{ $major->major_name }}" readonly>
                </div>
                <div class="w-full">
                    <label class="text-clr-dark" for="coordinator">Coordinator</label>
                    <input type="text" id="coordinator-select" readonly class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2" 
                        value="{{ $major->coordinator_name }} {{ $major->coordinator_lastname1 }} {{ $major->coordinator_lastname2 }} - {{ $major->users_types_name }}">
                    </div>

                <div class="w-full">
                    <label class="text-clr-dark" for="code">Major Code</label>
                    <input type="text" name="code" id="code" class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2" placeholder="" 
                           value="{{ $major->major_code }}" readonly>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-8">
            <section class="flex justify-between items-center">
                <h2>Users list</h2>
            </section>
            <table class="table min-w-full text-center text-sm text-clr-dark-gray">
                <thead class="border-b border-clr-light-gray dark:border-white/10 dark:text-clr-blue">
                    <tr>
                        <th scope="col" class="px-6 py-3 font-medium"></th>
                        <th scope="col" class="px-6 py-3 font-medium">Picture</th>
                        <th scope="col" class="px-6 py-3 font-medium">Name</th>
                        <th scope="col" class="px-6 py-3 font-medium">Last names</th>
                        <th scope="col" class="px-6 py-3 font-medium">Role</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($students as $student)
                    <tr class="border-b border-neutral-200 dark:border-white/10">
                        <td class="py-2">
                            <input type="checkbox" 
                                name="student_ids[]" 
                                value="{{ $student->id }}" 
                                id="student_{{ $student->id }}" 
                                {{ $major->students->contains($student->id) ? 'checked' : '' }}>
                        </td>
                        <td class="py-2">
                            <img src="https://i.pinimg.com/564x/07/21/38/072138a5acc89f7dd25ede025365bba7.jpg" 
                                class="size-10 mx-auto object-cover rounded-full">
                        </td>
                        <td class="py-2">{{ $student->name }}</td>
                        <td class="py-2">{{ $student->lastname1 }} {{ $student->lastname2 }}</td>
                        <td class="py-2">{{ $student->users_types_name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>


</div>
@vite('resources/js/user-count.js')
@endsection
