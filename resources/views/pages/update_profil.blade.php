@extends('include.master')
@section('content')
<div>
    <section class="max-w-screen-md mx-auto mt-20">
        <div class="flex flex-wrap justify-center w-full px-5">
            <form action="/foto_profile" method="post" enctype="multipart/form-data">
                @csrf
            <div class="flex flex-col items-center  bg-white rounded-md shadow-lg w-[266px] h-[288px]">
                <img src="/foto/{{ old('url', Auth::User()->url) }}" alt="" class="rounded-full w-36 h-36 mt-3">
                <input type="file" class="items-center w-48 border border-black mt-2" name="foto">
                <button class="w-48 py-1 mt-2 text-white rounded-md bg-biru-tua">Ubah Photo</button>
            </form>
            </div>
            <div class="w-[450px] h-[555px] shadow-md">
                <div class="bg-white rounded-md shadow-md ">
                    <div class="flex flex-col px-4 py-4 ">
                        <form action="/update_profile" method="post">
                            @csrf
                        <h5 class="text-3xl text-center font-bold mt-3">YOUR PROFILE</h5>
                        <h5 class="mt-3">Nama Lengkap</h5>
                        <input type="text" class="border border-gray-400 py-1 rounded-md mb-2  w-full p-2.5" name="nama" value="{{ $dataprofile->nama }}">
                        <h5>Username</h5>
                        <input type="text" class="py-1 rounded-md border border-gray-400 mb-2  w-full p-2.5" name="username" value="{{ $dataprofile->username }}">
                        <h5>Jenis Kelamin</h5>
                        <select type="text" class="py-1 rounded-md border border-gray-400 mb-2  w-full p-2.5 " id="jenis_kelamin" name="jenis_kelamin">
                            <option value="">{{ $dataprofile->jenis_kelamin }}</option>
                            <option value="Laki-Laki" <?php if ($dataprofile->jenis_kelamin == "Laki-Laki") echo "selected"; ?>>Laki-Laki</option>
                            <option value="Perempuan" <?php if ($dataprofile->jenis_kelamin == "Perempuan") echo "selected"; ?>>Perempuan</option>
                        </select>                        
                        <h5>Alamat</h5>
                        <input type="text" class="py-1 rounded-md border border-gray-400 mb-2  w-full p-2.5" name="alamat" value="{{ $dataprofile->alamat }}">

                        </textarea>
                        <h5>Birthday</h5>
                        <input type="date" id="default-input" name="tgl_lahir" class=" border border-black rounded-lg w-full p-2.5 " value="{{ $dataprofile->tgl_lahir }}">
                        <button class="py-2 w-full mt-4 text-white rounded-md bg-biru-tua">Perbaharui</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </section>
</div>
@include('sweetalert::alert')
@endsection
