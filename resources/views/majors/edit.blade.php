@extends('layout')
@section('content')

<div class="grid max-w-[900px] gap-4 bg-white rounded-sm my-4 mx-auto p-6">
    <section>
        <a href="{{ url()->previous() }}" class="cursor-pointer text-2xl mb-2 font-semibold text-clr-dark-third inline-block"><</a>
            <h2 class="text-2xl mb-2 font-semibold text-clr-dark-third inline-block">Edit Major</h2>
            <p class="text-clr-dark-gray">Update the information for your major.</p>
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

    <form action="{{ route('majors.update', $major->id) }}" method="POST" class="grid gap-4 w-full">
        @csrf
        @method('PUT')
        <div class="flex gap-6 justify-stretch w-full">
            <div class="grid gap-4 w-full">
                <div class="flex gap-4 items-center">
                    <div class="w-full">
                        <label class="text-clr-dark" for="name">Name</label>
                        <input type="text" name="name" id="name" class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2" placeholder="Name" value="{{ old('name', $major->name) }}">
                    </div>
                    <div class="w-full">
                        <label class="text-clr-dark" for="coordinator">Coordinator</label>
                        <select name="users_id" id="coordinator" class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2">
                            @foreach ($users as $user)
                            @if ($user->users_types_id == 2)
                            <option value="{{ $user->id }}" {{ $user->id == $major->users_id ? 'selected' : '' }}>{{ $user->name }} {{ $user->lastname1 }} {{ $user->lastname2 }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full">
                        <label class="text-clr-dark" for="code">Code</label>
                        <input type="text" name="code" id="code" class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2" placeholder="Code" value="{{ old('code', $major->code) }}">
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
                        <th scope="col" class="px-6 py-3 font-medium"></th>
                        <th scope="col" class="px-6 py-3 font-medium">Picture</th>
                        <th scope="col" class="px-6 py-3 font-medium">Name</th>
                        <th scope="col" class="px-6 py-3 font-medium">Last names</th>
                        <th scope="col" class="px-6 py-3 font-medium">Role</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    @if ($user->users_types_id != 3)
                    <tr class="border-b border-neutral-200 dark:border-white/10">
                        <td class="py-2"><input type="checkbox" name="student_ids[]" value="{{ $user->id }}" id="student_{{ $user->id }}" {{ $major->students->contains($user->id) ? 'checked' : '' }}></td>
                        <td class="py-2"> <img src="{{ asset('images/' . $user->image) }}" class="size-10 mx-auto object-cover rounded-full"></td>
                        <td class="py-2"> {{ $user->name }}</td>
                        <td class="py-2">{{ $user->lastname1 }} {{ $user->lastname2 }}</td>
                        <td class="py-2">{{ $user->users_types_name }}</td>
                    </tr>
                    @endif
                    @endforeach

                </tbody>
            </table>
        </div>
        <button type="submit" class="w-full p-2 bg-[#4958a3] text-white rounded-sm hover:brightness-[.85] duration-150">
            Update information
        </button>
    </form>
</div>
@vite('resources/js/user-count.js')
@endsection