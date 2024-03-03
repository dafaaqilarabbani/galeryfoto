@extends('include.master')
@section('content')
<section class="mt-20">
    </section>
    <div >
        <form action="/prosesup_password" method="post">
            @csrf
        <section class="max-w-[500px] mx-auto ">
            <div class="max-[480px]:w-full">
                <div class="bg-white rounded-md shadow-lg ">
                    <div class="flex flex-col px-4 py-4 mt-5">
                        <h5 class="text-3xl text-center font-hurricane mb-4">Change Your Password</h5>
                        <h5>Old Password</h5>
                        <input type="password" class="py-1 rounded-md bg-cari border border-black" name="current_password">
                        <h5>New Password</h5>
                        <input type="password" class="py-1 rounded-md bg-cari border border-black" name="new_password">
                        <h5>Confirm Password</h5>
                        <input type="password" class="py-1 rounded-md bg-cari border border-black" name="confirm_password">
                        <button class="py-2 mt-4 text-white rounded-md bg-biru-tua">Perbaharui</button>
                    </div>
                </div>
            </div>
    </section>
    </div>
    
@endsection