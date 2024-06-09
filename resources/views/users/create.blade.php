@extends('layout')
@section('content')

<div class="grid max-w-[900px] gap-4 bg-white rounded-sm my-4 mx-auto p-6">
    <section>
        <div class="flex justify-between items-center text-center">
            <h2 class="text-2xl mb-2 font-semibold text-clr-dark-third inline-block">New User</h2>
            <a href="{{ url('/users')}}" class="cursor-pointer text-2xl mb-2 font-semibold text-clr-dark-third inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-chevron-right">
                    <circle cx="12" cy="12" r="10"/>
                    <path d="m10 8 4 4-4 4"/>
                </svg>
            </a>
        </div>
        <p class="text-clr-dark-gray">Complete all the data to create a new user.</p>
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

    <form action="{{ route('users.store') }}" method="POST" id="form-create" class="grid gap-4 w-full" enctype="multipart/form-data">
        @csrf
        <div class="flex gap-6 justify-stretch w-full">
            <!-- Left section: Drag & Drop area -->
            <div class="w-[50%] flex flex-col gap-4 m-8">
                <div class="drag-area border-2 relative border-gray-400/80 border-dashed h-[24rem] flex flex-col justify-center items-center rounded-full">
                    <img id="preview" class="object-cover w-full h-full rounded-full" src="">
                    <div class="drag-content flex flex-col text-center items-center">
                        <div class="icon"><span class="icon-[material-symbols--cloud-upload] size-16 text-clr-blue/80"></span></div>
                        <span id="drag-text" class="text-clr-light-gray">Drag & Drop to Upload File</span>
                        <span class="text-clr-light-gray">OR</span>
                        <button type="button" id="browse-btn" class="px-2 py-1 mt-2 hover:brightness-90 bg-[#bbc0e1] text-clr-white rounded-sm">Browse File</button>
                    </div>
                    <input id="file-input" type="file" accept=".jpg, .jpeg, .png, .webp" name="image" hidden>
                </div>
            </div>

            <!-- Right section: Name, Username, Lastname1, Lastname2 -->
            <div class="w-[50%] grid gap-4">
                    <div class="w-full">
                        <label class="text-clr-dark" for="name">Name</label>
                        <input type="text" name="name" id="name"
                            class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2"
                            placeholder="Name">
                    </div>
                    <div class="w-full">
                        <label class="text-clr-dark" for="username">Username</label>
                        <input type="text" name="username" id="username"
                            class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2"
                            placeholder="Username">
                    </div>
                    <div class="w-full">
                        <label class="text-clr-dark" for="lastname1">Last Name 1</label>
                        <input type="text" name="lastname1" id="lastname1"
                            class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2"
                            placeholder="Last name">
                    </div>
                    <div class="w-full">
                        <label class="text-clr-dark" for="lastname2">Last Name 2</label>
                        <input type="text" name="lastname2" id="lastname2"
                            class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2"
                            placeholder="Second Last Name">
                    </div>
            </div>
        </div>

        <!-- Bottom section: Email, Password, User Type -->
        <div class="grid grid-cols-3 gap-4 mt-4">
            <div class="col-span-1">
                <label class="text-clr-dark" for="email">Email</label>
                <input type="email" name="email" id="email"
                    class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2"
                    placeholder="Email">
            </div>
            <div class="col-span-1">
                <label class="text-clr-dark" for="password">Password</label>
                <input type="password" name="password" id="password"
                    class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2"
                    placeholder="Password">
            </div>
            <div class="col-span-1">
                <label class="text-clr-dark" for="users-type-select">User Type</label>
                <select name="users_types_id" id="users-type-select"
                    class="w-full p-2 border-2 border-clr-light-gray/40 rounded-md mt-2">
                    @foreach ($users_type as $user_type)
                        <option value="{{ $user_type->id }}">{{ $user_type->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Submit button -->
        <button type="submit"
            class="w-full p-2 bg-clr-blue text-white rounded-sm hover:brightness-[.85] duration-150 mt-4">
            Create user
        </button>
    </form>
</div>

@vite('resources/js/drag-drop.js')
@endsection