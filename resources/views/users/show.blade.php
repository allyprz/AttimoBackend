@extends('layout')
@section('content')

    <div class="grid max-w-[900px] gap-4 bg-white rounded-sm my-4 mx-auto p-6">
        <section>
            <a href="{{ url()->previous() }}" class="cursor-pointer text-2xl mb-2 font-semibold text-clr-dark-third inline-block"><</a>
            <h2 class="text-2xl mb-2 font-semibold text-clr-dark-third inline-block">Edit user</h2>
            <p class="text-clr-dark-gray">Update the information of the user by filling the form below.</p>
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

        <div class="flex gap-6 justify-stretch w-full">
            <div
                class="drag-area border-2 relative border-gray-400/80 border-dashed w-[50%] overflow-hidden rounded-sm h-[22rem] flex flex-col justify-center items-center">
                <img id="preview" src="{{ asset('images/' . $user->image) }}" class="object-cover w-full h-full">
                <input id="file-input" type="file" accept=".jpg, .jpeg, .png, .webp" name="image" hidden>
            </div>

            <div class="grid gap-4 w-[50%]">
                <div class="w-full">
                    <label class="text-clr-dark" for="name">Name</label>
                    <input type="text" name="name" readonly
                        class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2"
                        value="{{ $user->name }}">
                </div>
                <div class="w-full">
                    <label class="text-clr-dark" for="username">Username</label>
                    <input type="text" name="username" readonly
                        class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2"
                        value="{{ $user->username }}">
                </div>
                <div class="w-full">
                    <label class="text-clr-dark" for="lastname1">Last Name 1</label>
                    <input type="text" name="lastname1" readonly
                        class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2"
                        value="{{ $user->lastname1 }}">
                </div>
                <div class="w-full">
                    <label class="text-clr-dark" for="lastname2">Last Name 2</label>
                    <input type="text" name="lastname2" readonly
                        class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2"
                        value="{{ $user->lastname2 }}">
                </div>
            </div>
        </div>
        <div class="flex gap-4 justify-center">
            <div class="flex gap-4 items-center">
                <div class="w-full">
                    <label class="text-clr-dark" for="email">Email</label>
                    <input type="email" name="email" readonly
                        class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2"
                        value="{{ $user->email }}">
                </div>
                <div class="w-full">
                    <label class="text-clr-dark" for="password">Password</label>
                    <input type="password" name="password" readonly
                        class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2"
                        value="{{ $user->password }}">
                </div>
            </div>
            <div class="flex gap-4 items-center">
                <div class="w-full">
                    <label class="text-clr-dark" for="user_type">User Type</label>
                    <input type="text" name="user_type" readonly
                        class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2"
                        value="{{ $userType->name }}">
                </div>
            </div>
        </div>

    </div>
@endsection
