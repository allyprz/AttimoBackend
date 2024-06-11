@extends('layout')

@section('content')
    <div class="grid max-w-[900px] gap-4 bg-white rounded-sm my-4 mx-auto p-6">
        <section>
            <div class="flex justify-between items-center text-center">
                <h2 class="text-2xl mb-2 font-semibold text-clr-dark-third inline-block">User's details</h2>
                <a href="{{ url()->previous() }}"
                    class="cursor-pointer text-2xl mb-2 font-semibold text-clr-dark-third inline-block">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-circle-chevron-right">
                        <circle cx="12" cy="12" r="10" />
                        <path d="m10 8 4 4-4 4" />
                    </svg>
                </a>
            </div>
            <p class="text-clr-dark-gray">Here you can see and edit the details of the user.</p>
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

        <form action="{{ route('users.update', $user->id) }}" method="POST" class="grid gap-4 w-full"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="flex gap-6 justify-stretch w-full">
                <div class="flex flex-col items-center justify-center w-[50%]">
                    <div
                        class="relative border-2 border-gray-400/80 border-dashed w-full rounded-sm h-[22rem] flex flex-col justify-center items-center">
                        <img id="preview" class="object-cover w-full h-full" src="{{ asset('images/' . $user->image) }}">
                        <div
                            class="absolute top-0 left-0 w-full h-full flex flex-col text-center items-center justify-center bg-white/70 opacity-0 hover:opacity-100 transition-opacity">
                            <div class="icon mb-2"><span
                                    class="icon-[material-symbols--cloud-upload] size-16 text-clr-blue/80"></span></div>
                            <span id="drag-text" class="text-clr-light-gray mb-2">Drag & Drop to Upload File</span>
                            <span class="text-clr-light-gray mb-2">OR</span>
                            <button type="button" id="browse-btn"
                                class="px-2 py-1 mt-2 hover:brightness-90 bg-[#bbc0e1] text-clr-white rounded-sm">Browse
                                File</button>
                        </div>
                        <input id="file-input" type="file" accept=".jpg, .jpeg, .png, .webp" name="image" hidden>
                        <input type="hidden" name="old_image" value="{{ $user->image }}">
                    </div>
                </div>
                <div class="grid gap-4 w-[50%]">
                    <div class="w-full">
                        <label class="text-clr-dark" for="name">Name</label>
                        <input type="text" name="name"
                            class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2"
                            placeholder="Name" value="{{ $user->name }}">
                    </div>
                    <div class="w-full">
                        <label class="text-clr-dark" for="username">Username</label>
                        <input type="text" name="username"
                            class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2"
                            placeholder="Username" value="{{ $user->username }}">
                    </div>
                    <div class="w-full">
                        <label class="text-clr-dark" for="lastname1">Last Name 1</label>
                        <input type="text" name="lastname1"
                            class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2"
                            placeholder="Last Name 1" value="{{ $user->lastname1 }}">
                    </div>
                    <div class="w-full">
                        <label class="text-clr-dark" for="lastname2">Last Name 2</label>
                        <input type="text" name="lastname2"
                            class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2"
                            placeholder="Last Name 2" value="{{ $user->lastname2 }}">
                    </div>
                </div>
            </div>
            <div class="flex gap-4 justify-center">
                <div class="w-full">
                    <label class="text-clr-dark" for="email">Email</label>
                    <input type="email" name="email"
                        class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2"
                        placeholder="Email" value="{{ $user->email }}">
                </div>
                <div class="w-full">
                    <label class="text-clr-dark" for="password">Password</label>
                    <input type="password" name="password"
                        class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2"
                        placeholder="Password" value="{{ old('password') }}">
                    <small class="text-clr-gray">Leave blank to keep current password.</small>
                </div>
                <div class="w-full">
                    <label class="text-clr-dark" for="user_type">User Type</label>
                    <select name="users_types_id" id="user_type"
                        class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2">
                        @foreach ($users as $userType)
                            <option value="{{ $userType->id }}"
                                {{ $userType->id == $user->users_types_id ? 'selected' : '' }}>
                                {{ $userType->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit"
                class="w-full p-2 bg-[#4958a3] text-white rounded-sm hover:brightness-[.85] duration-150">Save
                Changes</button>
        </form>
    </div>
    @vite('resources/js/hover-drag-drop.js')
@endsection
