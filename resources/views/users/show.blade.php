@extends('layout')
@section('content')

    <div class="grid max-w-[900px] gap-4 bg-white rounded-sm my-4 mx-auto p-6">
        <section>
            <div class="flex justify-between items-center text-center">
                <h2 class="text-2xl mb-2 font-semibold text-clr-dark-third inline-block">User's details</h2>
                <a href="{{ url()->previous() }}" class="cursor-pointer text-2xl mb-2 font-semibold text-clr-dark-third inline-block">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-chevron-right">
                        <circle cx="12" cy="12" r="10"/>
                        <path d="m10 8 4 4-4 4"/>
                    </svg>
                </a>
            </div>
                    <p class="text-clr-dark-gray">Here you can see the details of the user.</p>
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
            {{-- <div class="drag-area border-2 relative border-gray-400/80 border-dashed w-[50%] rounded-sm h-72 flex flex-col justify-center items-center">
            <img id="preview" class="object-cover w-full h-full" src="{{ asset('images/' . $user->image) }}">
            <div class="drag-content flex flex-col text-center items-center">
                <div class="icon"><span class="icon-[material-symbols--cloud-upload] size-16 text-clr-blue/80"></span></div>
            </div>
        </div> --}}
            <div class="bg-gray-300 w-[50%] rounded-sm min-h-full"></div>

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
