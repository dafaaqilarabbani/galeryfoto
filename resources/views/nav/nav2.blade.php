<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/build.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="fixed z-20 w-full bg-white shadow-md dark:bg-gray-900">
        <div class="flex flex-wrap items-center justify-between max-w-screen-md p-4 mx-auto">
            <div class="text-3xl font-hurricane"></div                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  >
            <div class="flex gap-1">
                <a href= "/login" class="bg-biru-tua px-5 py-1 text-white rounded-lg">Login</a>
                <a href= "/register" class="px-5 py-1 bg-gray-300 rounded-lg">Register</a>
            </div>
        </div>
    </nav>
@yield('isi2')
</body>
</html>