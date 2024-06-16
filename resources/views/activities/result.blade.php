@extends('layout')
@section('content')
<div class="grid max-w-[900px] gap-4 bg-white rounded-sm my-4 mx-auto p-6">
    <h2 class="text-2xl font-semibold mb-4">Search Results:</h2>
    <p class="table min-w-full text-clr-dark-gray">Total results found: {{ $total }}</p>
        <div class="mb-4 mt-2">
            <a href="{{ route('activities.index') }}" class="p-2 bg-gray-200 rounded-md text-clr-dark-gray me-2 my-2 hover:brightness-[.80] duration-100">
                Go Back
            </a>
        </div>
    @if ($results->isEmpty())
    <p>No activities found.</p>
    @else
    <table class="table min-w-full text-center text-sm text-clr-dark-gray">
        <thead class="border-b border-clr-light-gray dark:border-white/10 dark:text-clr-blue">
            <tr>
                <th scope="col" class="px-6 py-3 font-medium">No.</th>
                <th scope="col" class="px-6 py-3 font-medium">Title</th>
                <th scope="col" class="px-6 py-3 font-medium">Category</th>
                <th scope="col" class="px-6 py-3 font-medium">Label</th>
                <th scope="col" class="px-6 py-3 font-medium">Status</th>
                <th scope="col" class="px-6 py-3 font-medium" width="280px">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $result)
            <tr class="border-b border-neutral-200 dark:border-white/10">
                <td class="py-2">{{ $result->id }}</td>
                <td class="py-2">{{ $result->title }}</td>
                <td class="py-2">{{ $result->category }}</td>
                <td class="py-2">{{ $result->label}}</td>
                <td class="py-2">{{ $result->isActive ? 'Active' : 'Inactive' }}</td>
                <td class="py-2">
                    <a class="p-2 bg-blue-100 rounded-md text-clr-blue me-2 my-2 hover:brightness-[.80] duration-100" href="{{ route('activities.show', $result->id) }}">Show</a>
                    <a class="p-2 bg-gray-200 rounded-md text-clr-dark-gray me-2 my-2 hover:brightness-[.80] duration-100" href="{{ route('activities.edit', $result->id) }}">Edit</a>
                    <form method="POST" action="{{ route('activities.destroy', $result->id) }}" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-2 bg-red-200 rounded-md text-red-800 me-2 my-2 hover:brightness-[.80] duration-100">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="p-4 flex items-center justify-between">
        <div>
            {{-- First page button --}}
            @if ($results->onFirstPage())
            <button class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md cursor-not-allowed" disabled>First</button>
            @else
            <a href="{{ $results->url(1) }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">First</a>
            @endif

            {{-- Previous page button --}}
            @if ($results->previousPageUrl())
            <a href="{{ $results->previousPageUrl() }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">Previous</a>
            @else
            <button class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md cursor-not-allowed" disabled>Previous</button>
            @endif
        </div>

        {{-- Pagination numbers --}}
        <div class="flex gap-2">
            @php
            $start = max($results->currentPage() - 2, 1);
            $end = min($results->currentPage() + 2, $results->lastPage());
            @endphp
            @for ($i = $start; $i <= $end; $i++) <a href="{{ $results->url($i) }}" class="px-4 py-2 hover:bg-gray-300 rounded-full transition duration-300 @if ($results->currentPage() === $i) text-white bg-clr-dark-blue cursor-not-allowed @endif">{{ $i }}</a>
                @endfor
        </div>

        <div>
            {{-- Next page button --}}
            @if ($results->hasMorePages())
            <a href="{{ $results->nextPageUrl() }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:brightness-[.90]">Next</a>
            @else
            <button class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md cursor-not-allowed" disabled>Next</button>
            @endif

            {{-- Last page button --}}
            @if ($results->hasMorePages())
            <a href="{{ $results->url($results->lastPage()) }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:brightness-[.90]">Last</a>
            @else
            <button class="px-4 py-2 bg-gray-400/70 text-gray-800 rounded-md cursor-not-allowed" disabled>Last</button>
            @endif
        </div>
    </div>
    @endif
</div>
@endsection