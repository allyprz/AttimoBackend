@extends('layout')
@section('content')
    <section class="flex mt-6 mb-4 items-center justify-between text-clr-dark-blue">
        <h2 class="text-2xl font-semibold">Groups</h2>
        <a href="{{ route('groups.create') }}"
            class="p-2 border-2 duration-150 border-clr-blue font-medium rounded-md text-clr-blue hover:bg-clr-blue hover:text-clr-white">+
            Add new group</a>
    </section>

    @if ($message = Session::get('success'))
        <div class="p-3 text-sm rounded-md mb-4 bg-[#D0DDEF] text-clr-blue">
            <p>{{ $message }}</p>
        </div>
    @endif

    <form action="{{ route('groups.search') }}" method="GET" class="p-4 dark:bg-gray-800 rounded-lg">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-6">
                <div>
                    <label for="group_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Group
                        No.:</label>
                    <input type="text" id="group_number" name="group_number"
                        class="mt-1 block w-60 px-3 py-2 rounded-md shadow-sm border-gray-300 focus:border-clr-blue focus:ring focus:ring-clr-blue focus:ring-opacity-50 transition duration-150 ease-in-out" placeholder="Search...">
                </div>
                <div>
                    <label for="course_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Course
                        Name:</label>
                    <input type="text" id="course_name" name="course_name"
                        class="mt-1 block w-60 px-3 py-2 rounded-md shadow-sm border-gray-300 focus:border-clr-blue focus:ring focus:ring-clr-blue focus:ring-opacity-50 transition duration-150 ease-in-out" placeholder="Search...">
                </div>
                <div>
                    <label for="professor_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Professor
                        Name:</label>
                    <select id="professor_name" name="professor_name"
                        class="mt-1 block w-60 px-3 py-2 rounded-md shadow-sm border-gray-300 focus:border-clr-blue focus:ring focus:ring-clr-blue focus:ring-opacity-50 bg-white dark:bg-gray-700 dark:text-gray-300 transition duration-150 ease-in-out">
                        <option value="">All</option>
                        @foreach ($professors as $professor)
                            <option value="{{ $professor->id }}">{{ $professor->name }} {{ $professor->lastname1 }}
                                {{ $professor->lastname2 }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit"
                class="p-2 px-4 bg-clr-dark-blue rounded-lg text-white hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 shadow-lg transition duration-200 ease-in-out">
                Search
            </button>
        </div>
    </form>


    <div class="bg-white rounded-md my-4">
        <table class="table min-w-full text-center text-sm text-clr-dark-gray">
            <thead class="border-b border-clr-light-gray dark:border-white/10 dark:text-clr-blue">
                <tr>
                    <th scope="col" class="px-6 py-3 font-medium">No.</th>
                    <th scope="col" class="px-6 py-3 font-medium">Course Name</th>
                    <th scope="col" class="px-6 py-3 font-medium">Professor Name</th>
                    <th scope="col" class="px-6 py-3 font-medium">Group No.</th>
                    <th scope="col" class="px-6 py-3 font-medium" width="280px">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($groups as $group)
                    <tr class="border-b border-neutral-200 dark:border-white/10">
                        <td class="py-2">{{ $group->id }}</td>
                        <td class="py-2">{{ $group->course_name }}</td>
                        <td class="py-2">{{ $group->professor_name }} {{ $group->lastname1 }} {{ $group->lastname2 }}
                        </td>
                        <td class="py-2">{{ $group->number }}</td>
                        <td class="py-2">
                            <form action="{{ route('groups.destroy', $group->id) }}" method="POST">
                                <a class="p-2 bg-blue-100 rounded-md font-regular text-clr-blue me-2 my-2 hover:brightness-[.80] duration-100"
                                    href="{{ route('groups.show', $group->id) }}">Show</a>
                                <a class="p-2 bg-gray-200 rounded-md font-regular text-clr-dark-gray me-2 my-2 hover:brightness-[.80] duration-100"
                                    href="{{ route('groups.edit', $group->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="p-2 bg-red-200 rounded-md font-regular text-red-800 me-2 my-2 hover:brightness-[.80] duration-100">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="p-4 flex items-center justify-between">
            <div>
                {{-- First page button --}}
                @if ($groups->onFirstPage())
                    <button class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md cursor-not-allowed"
                        disabled>First</button>
                @else
                    <a href="{{ $groups->url(1) }}"
                        class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">First</a>
                @endif

                {{-- Previous page button --}}
                @if ($groups->previousPageUrl())
                    <a href="{{ $groups->previousPageUrl() }}"
                        class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">Previous</a>
                @else
                    <button class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md cursor-not-allowed"
                        disabled>Previous</button>
                @endif
            </div>

            {{-- Pagination numbers --}}
            <div class="flex gap-2">
                @php
                    $start = max($groups->currentPage() - 2, 1);
                    $end = min($groups->currentPage() + 2, $groups->lastPage());
                @endphp
                @for ($i = $start; $i <= $end; $i++)
                    <a href="{{ $groups->url($i) }}"
                        class="px-4 py-2 hover:bg-gray-300 rounded-full transition duration-300 @if ($groups->currentPage() === $i) text-white bg-clr-dark-blue cursor-not-allowed @endif">{{ $i }}</a>
                @endfor
            </div>

            <div>
                {{-- Next page button --}}
                @if ($groups->hasMorePages())
                    <a href="{{ $groups->nextPageUrl() }}"
                        class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:brightness-[.90]">Next</a>
                @else
                    <button class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md cursor-not-allowed" disabled>Next</button>
                @endif
            </div>
        </div>
    </div>
@endsection
