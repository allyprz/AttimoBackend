@extends('layout')
@section('content')

<section class="flex mt-6 mb-4 items-center justify-between text-clr-dark-blue">
    <h2 class="text-2xl font-semibold">Activities</h2>
    <a href="{{ route('activities.create')}}" class="p-2 border-2 duration-150 border-clr-blue font-medium rounded-md text-clr-blue hover:bg-clr-blue hover:text-clr-white">+ Add new activity</a>
</section>

@if ($message = Session::get('success'))
<div class="p-3 text-sm rounded-md mb-4 bg-blue-200/65 text-clr-blue">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table min-w-full text-center text-sm text-clr-dark-gray bg-white">
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
            <td class="py-2">{{ $result->name }}</td>
            @foreach ($categories as $category)
                @if ($category->id == $result->categories_activities_id)
                <td class="py-2">{{ $category->name }}</td>
                @endif
            @endforeach 

            @foreach ($labels as $label)
                @if ($label->id == $result->labels_activities_id)
                <td class="py-2">{{ $label->name }}</td>
                @endif
            @endforeach

            @foreach ($status as $statu)
                @if ($statu->id == $result->status_activities_id)
                <td class="py-2">{{ $statu->isActive==1 ? 'Active' : 'Inactive' }}</td>
                @endif
            @endforeach
            
            <td class="py-2">
                <form action="{{ route('activities.destroy', $result->id) }}" method="POST">
                    <a class="p-2 bg-blue-100 rounded-md font-regular text-clr-blue me-2 my-2 hover:brightness-[.80] duration-100" href="{{ route('activities.show',$result->id) }}">Show</a>
                    <a class="p-2 bg-gray-200 rounded-md font-regular text-clr-dark-gray me-2 my-2 hover:brightness-[.80] duration-100" href="">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="p-2 bg-red-200 rounded-md font-regular text-red-800 me-2 my-2 hover:brightness-[.80] duration-100">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection