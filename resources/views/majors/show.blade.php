@extends('layout')
@section('content')

<div class="grid max-w-[900px] gap-4 bg-white rounded-sm my-4 mx-auto p-6">
    <section>
        <a href="{{ url()->previous() }}" class="cursor-pointer text-2xl mb-2 font-semibold text-clr-dark-third inline-block"><</a>
        <h2 class="text-2xl mb-2 font-semibold text-clr-dark-third inline-block">Show Major</h2>
        <p class="text-clr-dark-gray">Here you can find the major´s details.</p>
    </section>
    <hr class="border-b-2 text-clr-dark-gray">

        <div class="flex gap-6 justify-stretch w-full">
            <div class="grid gap-4 w-full">
                <div class="flex gap-4 items-center">
                    <div class="w-full">
                        <label class="text-clr-dark" for="name">Name</label>
                        <input type="text" name="name" id="name" class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2" placeholder="Name" 
                               value="{{ $major->name }}">
                    </div>
                    <div class="w-full">
                        <label class="text-clr-dark" for="coordinator">Coordinator</label>
                        <input type="text" id="coordinador-select" readonly class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2" 
                            value="{{ $user->name }} {{ $user->lastname1 }} {{ $user->lastname2 }} - {{ $user->users_types_name }}">
                    </div>
                    <div class="w-full">
                        <label class="text-clr-dark" for="code">Code</label>
                        <input type="text" name="code" id="code" class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2" placeholder="Code" 
                               value="{{ $major->code }}">
                    </div>
                </div>
            </div>
        </div>

</div>
@endsection