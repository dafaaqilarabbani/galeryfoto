<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/build.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
    <nav class="py-2 px-2 fixed z-20 top-0 left-0 bg-white w-full shadow-lg">
        <div class=" m-auto flex justify-between items-center text-gray-700    ">
            <form action="/beranda_user" method="get">
            <input type="w-50 text" class="rounded-full mr-32 w-[300px] bg-cari text-justify px-4 " placeholder="Search ..." name="cari">
        </form>
            <ul class="hidden md:flex items-center pr-10 text-base font-semibold cursor-pointer ml-auto">
                <a href="/upload_foto" class="hover:bg-gray-200 py-4 px-6">Unggah Foto</a>
                <a href="/album" class="hover:bg-gray-200 py-4 px-6">Album</a>
                <a href="/beranda_user" class="hover:bg-gray-200 py-4 px-6">Beranda</a>
            </ul>

            <button type="button"
            class=" md:hidden flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
            id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
            data-dropdown-placement="bottom">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-justify" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5"/>
            </svg>
        </button>
        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                id="user-dropdown">
                <div class="px-4 py-3">
                    <span class="block text-sm text-gray-900 dark:text-white"></span>
                    <span class="block text-sm  text-gray-500 truncate dark:text-gray-400"></span>
                </div>
                <ul class="py-2" aria-labelledby="user-menu-button">
                    <li>
                        <a href="/beranda_user"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            Beranda</a>
                    </li>
                        <a href="/upload_foto"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            Upload Foto</a>
                    </li>
                        <a href="/album"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            Album & Foto</a>
                    </li>
                        <a href="/profile"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            Profil</a>
                    </li>
                        <a href="/update_password"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            Change Password</a>
                    </li>
                        <a href="/logout"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            Logout</a>
                    </li>
        </div>
        {{-- /foto/{{ old('foto', Auth::User()->url) }} --}}
       <div class=" items-center space-x-1 px-2 hidden md:flex">
        <img src="/foto/{{ old('foto_profil', Auth::User()->url) }}" alt="" class="w-10 h-10 right-[200px] rounded-full " data-dropdown-toggle="user-dropdown-menu">
        <!-- Drop Down -->
        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow "
            id="user-dropdown-menu">
            <ul class="py-2" role="none">
                <li>
                    <a href="/profile"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                    Profil</a>
                    </a>
                </li>
                <li>
                    <a href="/update_password"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                    Change Password</a>
                    </a>
                </li>
                <li>
                    <a href="/logout"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                    Logout</a>
                    </a>
                        </div>
                    </a>
                </li>
            </ul>
        </div>

        </div>
    </nav>
