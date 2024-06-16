@extends('layout')
@section('content')

<section class="mt-6 mb-4 text-clr-dark-blue">
    <h2 class="text-2xl font-semibold mb-4">Search Results:</h2>
    <p class="min-w-full text-clr-dark-gray mb-4">Total results found: {{ $total }}</p>
    <div class="mb-4">
        <a href="{{ route('courses.index') }}" class="p-2 bg-gray-200 rounded-md text-clr-dark-gray hover:brightness-[.80] duration-100">
            Go Back
        </a>
    </div>
    @if ($message = Session::get('success'))
        <div class="p-3 text-sm rounded-md bg-[#D0DDEF] text-clr-blue">
            <span>{{ $message }}</span>
        </div>
    @endif
</section>

@if ($message = Session::get('success'))
<div class="p-3 text-sm rounded-md mb-4 bg-[#D0DDEF] text-clr-blue">
    <p>{{ $message }}</p>
</div>
@endif

<div class="bg-white rounded-md my-4">
    <table class="table min-w-full text-center text-sm text-clr-dark-gray">
        <thead class="border-b border-clr-light-gray dark:border-white/10 dark:text-clr-blue">
            <tr>
                <th scope="col" class="px-6 py-3 font-medium">No.</th>
                <th scope="col" class="px-6 py-3 font-medium">Name</th>
                <th scope="col" class="px-6 py-3 font-medium">Acronyms</th>
                <th scope="col" class="px-6 py-3 font-medium" width="280px">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
            <tr class="border-b border-neutral-200 dark:border-white/10">
                <td class="py-2">{{ $course->id }}</td>
                <td class="py-2">{{ $course->name }}</td>
                <td class="py-2">{{ $course->acronyms }}</td>
                <td class="py-2">
                    <form action="{{ route('courses.destroy', $course->id) }}" method="POST">
                        <a class="p-2 bg-blue-100 rounded-md font-regular text-clr-blue me-2 my-2 hover:brightness-[.80] duration-100" href="{{ route('courses.show', $course->id) }}">Show</a>
                        <a class="p-2 bg-gray-200 rounded-md font-regular text-clr-dark-gray me-2 my-2 hover:brightness-[.80] duration-100" href="{{ route('courses.edit', $course->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-2 bg-red-200 rounded-md font-regular text-red-800 me-2 my-2 hover:brightness-[.80] duration-100">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="p-4 flex items-center justify-between">
        <div>
            {{-- First page button --}}
            @if ($courses->onFirstPage())
            <button class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md cursor-not-allowed" disabled>First</button>
            @else
            <a href="{{ $courses->url(1) }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">First</a>
            @endif

            {{-- Previous page button --}}
            @if ($courses->previousPageUrl())
            <a href="{{ $courses->previousPageUrl() }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">Previous</a>
            @else
            <button class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md cursor-not-allowed" disabled>Previous</button>
            @endif
        </div>

        {{-- Pagination numbers --}}
        <div class="flex gap-2">
            @php
            $start = max($courses->currentPage() - 2, 1);
            $end = min($courses->currentPage() + 2, $courses->lastPage());
            @endphp
            @for ($i = $start; $i <= $end; $i++) <a href="{{ $courses->url($i) }}" class="px-4 py-2 hover:bg-gray-300 rounded-full transition duration-300 @if ($courses->currentPage() === $i) text-white bg-clr-dark-blue cursor-not-allowed @endif">{{ $i }}</a>
                @endfor
        </div>

        <div>
            {{-- Next page button --}}
            @if ($courses->hasMorePages())
            <a href="{{ $courses->nextPageUrl() }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:brightness-[.90]">Next</a>
            @else
            <button class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md cursor-not-allowed" disabled>Next</button>
            @endif

            {{-- Last page button --}}
            @if ($courses->hasMorePages())
            <a href="{{ $courses->url($courses->lastPage()) }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:brightness-[.90]">Last</a>
            @else
            <button class="px-4 py-2 bg-gray-400/70 text-gray-800 rounded-md cursor-not-allowed" disabled>Last</button>
            @endif
        </div>
    </div>
</div>
@endsection
