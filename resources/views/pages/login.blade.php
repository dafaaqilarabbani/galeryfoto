@extends('nav.nav2')
@section('isi2')   
    &nbsp;
    <div class="shadow-lg -gray-300 max-w-[360px] mx-auto mt-[100px] w-full">
    <div class="p-4 pb-8 shadow-md bg-gray-300 max-w-[360px] mx-auto mt-[100px] w-full">
        <div class="flex flex-col gap-4">
            <form action="/proses_login" method="post">
                @csrf
            <h3 class=" text-3xl text-center font-medium ">LOGIN</h3>
        <div class="mb-2">
            <label for="default-input" class="mb-2 text-sm font-medium dark:text-white">Username</label>
            <input type="text" id="default-input" name="username" class=" border border-black text-sm rounded-lg w-full p-2.5 " placeholder="Isi Username Anda Disini">
        </div>  
        <div class="mb-2">
            <label for="default-input" class="mb-2 text-sm font-medium dark:text-white">Password</label>
            <input type="password" id="default-input" name="password" class=" border border-black text-sm rounded-lg w-full p-2.5 " placeholder="Isi Password Anda Disini">
        </div>  
        <div class="text-center">
            <button type="submit" class=" border border-black bg-biru-tua p-2.5 w-full items-center text-white">Login</button>
            <div = class="mb-4"></div>
            <p><a href="/register" class="text-center font-medium hover:text-white">Belum punya akun? Register</p>
    </div>
    </div>
    </div>
    </div>
    @include('sweetalert::alert')
    @endsection