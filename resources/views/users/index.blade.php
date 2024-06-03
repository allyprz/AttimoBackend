@extends('layout')
@section('content')

    <section class="flex mt-6 mb-4 items-center justify-between text-clr-dark-blue">
        <h2 class="text-2xl font-semibold">Users</h2>
        <a href="{{ route('users.create') }}"
            class="p-2 border-2 duration-150 border-clr-blue font-medium rounded-md text-clr-blue hover:bg-clr-blue hover:text-clr-white">+
            Add new User</a>
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
                <th scope="col" class="px-6 py-3 font-medium">User Type</th>
                <th scope="col" class="px-6 py-3 font-medium">Name</th>
                <th scope="col" class="px-6 py-3 font-medium">First Last Name</th>
                <th scope="col" class="px-6 py-3 font-medium" width="280px">Second Last Name</th>
                <th scope="col" class="px-6 py-3 font-medium" width="280px">Username</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $result)
                <tr class="border-b border-neutral-200 dark:border-white/10">
                    <td class="py-6">{{ $result->id }}</td>
                    @foreach ($users as $user)
                        @if ($user->id == $result->users_types_id)
                            <td class="py-6">{{ $user->name }}</td>
                        @endif
                    @endforeach
                    <td class="py-6">{{ $result->name }}</td>
                    <td class="py-6">{{ $result->lastname1 }}</td>
                    <td class="py-6">{{ $result->lastname2 }}</td>
                    <td class="py-6">{{ $result->username }}</td>

                    <td class="py-6">
                        <form action="" method="POST">
                            <a class="p-2 bg-blue-100 rounded-md font-regular text-clr-blue me-2 my-2 hover:brightness-[.80] duration-100"
                                href="">Show</a>
                            <a class="p-2 bg-gray-200 rounded-md font-regular text-clr-dark-gray me-2 my-2 hover:brightness-[.80] duration-100"
                                href="">Edit</a>
                            @csrf
                            @method('DELETE')
                            <a class="p-2 bg-red-200 rounded-md font-regular text-red-800 me-2 my-2 hover:brightness-[.80] duration-100"
                                href="">Delete</a>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
