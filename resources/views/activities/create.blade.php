@extends('activities.layout')
@section('content')
<div class="grid max-w-[900px] gap-4 bg-white rounded-sm my-4 mx-auto p-6">
    <section>
        <h2 class="text-2xl mb-2 font-semibold text-clr-dark-third">New activity</h2>
        <p class="text-clr-dark-gray">Complete all the data to create a new activity.</p>
    </section>
    <hr class="border-b-2 text-clr-dark-gray">

    <form action="" class="grid gap-4 w-full ">
        <div class="flex gap-6 justify-stretch w-full">
            <div class="bg-gray-300 w-[50%] rounded-sm min-h-full"></div>
            <div class="grid gap-4 w-[50%]">
                <div class="w-full">
                    <label class="text-clr-dark" for="">Title</label>
                    <input type="text" class="w-full p-2 border-2 border-clr-light-gray rounded-md mt-2" placeholder="Title">
                </div>
                <div class="w-full">
                    <label class="text-clr-dark" for="">Date</label>
                    <input type="date" class="w-full p-2 border-2 border-clr-light-gray rounded-md mt-2" placeholder="Activity's name">
                </div>
                <div class="w-full">
                    <label class="text-clr-dark" for="">Starts at</label>
                    <input type="time" class="w-full p-2 border-2 border-clr-light-gray rounded-md mt-2" placeholder="Activity's name">
                </div>
            </div>
        </div>
        <div class="grid gap-4">
            <div>
                <label class="text-clr-dark" for="">Description</label>
                <textarea name="description" id="" class="w-full p-2 border-2 border-clr-light-gray rounded-md mt-2"></textarea>
            </div>
            <div class="flex gap-4">
                <div class="w-full">
                    <label class="text-clr-dark" for="">Category</label>
                    <select name="category" class="w-full p-2 border-2 border-clr-light-gray rounded-md mt-2" id="">
                        <option value="option">Select a category</option>
                    </select>
                </div>
                <div class="w-full">
                    <label class="text-clr-dark" for="">Label</label>
                    <select name="category" class="w-full p-2 border-2 border-clr-light-gray rounded-md mt-2" id="">
                        <option value="option">Select a label</option>
                    </select>
                </div>
            </div>
        </div>
        <button type="submit" class="w-full p-2 bg-clr-blue text-white rounded-sm hover:brightness-[.85] duration-150">Create activity</button>
    </form>
</div>
@endsection