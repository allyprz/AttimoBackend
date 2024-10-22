<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-clr-light-bg max-w-[92%] mx-auto">

    @if ($errors->any())
    <div class="text-blue">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <main class="flex justify-center items-center min-h-screen p-6 w-full">

        <form action="{{ route('admin.check') }}" method="POST" class="bg-white shadow-md p-6 rounded-2xl max-w-[27rem] grid gap-4">
            @csrf
            <section>
                <h1 class="text-clr-blue font-semibold text-center text-2xl">User Login</h1>
                <div>
                    @if ($message = Session::get('fail'))
                    <div class="p-3 text-sm text-center rounded-md my-4 bg-red-100 text-red-500">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                </div>
                <div class="grid gap-4">
                    <div class="w-full">
                        <label class="text-clr-dark" for="email">Email</label>
                        <input type="text" name="email" id="email" class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2" placeholder="Email">
                    </div>
                    <div class="w-full">
                        <label class="text-clr-dark" for="password">Password</label>
                        <input type="password" name="password" id="password" class="w-full focus:outline-none p-2 border-2 border-clr-light-gray/40 rounded-md mt-2" placeholder="Password">
                    </div>
                    <div class="w-full">
                        <button type="submit" class="w-full bg-clr-blue hover:brightness-[.80] duration-75 text-white p-2 rounded-md">Login</button>
                    </div>
                </div>
            </section>
        </form>
    </main>
</body>

</html>