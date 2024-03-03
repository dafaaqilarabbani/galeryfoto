@extends('include.master')
@section('content')
<section class="mt-20">
    <div class="items-center max-w-screen-md mx-auto ">
        <h3 class="text-5xl text-center font-hurricane">PROFILE </h3>
    </div>
</section>
<section>
    <div class="flex flex-col items-center max-w-screen-md px-2 mx-auto mt-4">
        <div>
            <img src="/foto/{{ old('foto_profil', Auth::User()->url) }}" alt="" class="rounded-full w-36 h-36 mt-3">
        </div>
        <h3 class="text-xl font-semibold">
            {{ old('username', Auth::User()->username) }}
        </h3>
        <div class="mb-4"></div>
        <div class="flex justify-between gap-4">
            <button type="button" data-modal-target="crud-modal" data-modal-toggle="crud-modal"
            class= "block px-2 text-sm text-gray-900 bg-blue-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 " type="button">
            <h3 class="text-1xl font-semibold">
                Tambah Album
            </h3>
        </button>
            <a href="/profile" type="button" class="block px-2 text-sm text-gray-900 bg-blue-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 ">
                <h3 class="text-1xl font-semibold">
                    Edit Profil
                </h3>
            </a>
        </div>
        <div class="mb-4"></div>
        <small class="text-center text-xs "></small>
        <div class="flex flex-row mt-3 gap-4">
            <small class="mr-4 text-abuabu">Followers : {{ $datafollowers }}</small>
            <small class="text-abuabu">Following : {{ $datafollowCount }}</small>
        </div>
    </div>


    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center h-96" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Upload</button>
            </li>
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Album</button>
            </li>
        </ul>
    </div>
    <div id="default-tab-content">
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <section class="mt-5 flex flex-wrap lg:flex-row max-w-screen-md mx-auto gap-2">
                <div class="max-w-screen-md mx-auto">
                    <div class="flex flex-wrap items-center flex-container">
                        @foreach ($tampilUpload as $data)
                    <div class="flex mt-2 bg-white">
                            <div class="flex flex-col px-2">
                                    <div class="w-[363px] h-[192px] bg-bgcolor2 overflow-hidden">
                                        <img src="/foto/{{ $data->url }}" alt="" class="w-full">
                                    </div>
                                <div class="flex flex-wrap items-center justify-between px-2 mt-2">
                                    <div>
                                        <div class="flex flex-col">
                                            <div>
                                                {{ $data->judul_foto }}
                                            </div>
                                            <div class="text-xs text-abuabu">
                                                {{ $data->deskripsi }}
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <form action="{{ route('album.destroy', $data) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="block px-2 text-sm text-gray-900 bg-blue-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 "  onclick="return confirm(' ingin menghapus foto ini?')">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    </div>
                    @endforeach
                </section>
        </div>
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800 " id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
            <section class="mt-5 flex flex-wrap lg:flex-row max-w-screen-md mx-auto gap-2">
                <div class="max-w-screen-md mx-auto">
                    <div class="flex flex-wrap items-center flex-container">
                        @foreach ($tampilAlbum as $data)
                    <div class="flex mt-2 bg-white">
                            <div class="flex flex-col px-2">
                                <a href="/dalemanalbum/{{$data->id}}">
                                    <div class="w-[363px] h-[192px] bg-bgcolor2 overflow-hidden">
                                        <img src="/assets/folder.jpg" alt="" class="w-full">
                                        </a>
                                    </div>
                                    <div class="flex flex-wrap items-center justify-between px-2 mt-2">
                                        <div>
                                            <div class="flex flex-col">
                                                <div>
                                                    {{ $data->judul_album }}
                                                </div>
                                                <div class="text-xs text-abuabu">
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <form action="/hapusalbuma/{{ $data->id }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="block px-2 text-sm text-gray-900 bg-blue-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 "  onclick="return confirm(' ingin menghapus foto ini?')">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        </div>
            @endforeach
        </div>
    </section>

    </div>

    <section class="mt-20">
        <div class="flex mt-2 bg-white">
            <div class="flex flex-col px-2">

                 {{-- <div class="flex mt-2 bg-white">
                    <div class="flex flex-col px-2">
                        <a href="">
                            <div class="w-[363px] h-[192px] bg-bgcolor2 overflow-hidden">
                                <img src="{{ asset('assets/03.JPG') }}" alt="" class="w-full transition duration-500 ease-in-out hover:scale-105">
                            </div>
                        </a>
                        <div class="flex flex-wrap items-center justify-between px-2 mt-2">
                            <div>
                                <div class="flex flex-col">
                                    <div>
                                        ngakak cik
                                    </div>
                                    <div class="text-xs text-abuabu">
                                        21:12
                                    </div>
                                </div>
                            </div>
                            <div>
                                <span class="bi bi-tag-fill"></span>
                                <small>21</small>
                                <span class="bi bi-chat-left-text"></span>
                                <small>12</small>
                                <span class="bi bi-heart">1</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex mt-2 bg-white">
                    <div class="flex flex-col px-2">
                        <a href="">
                            <div class="w-[363px] h-[192px] bg-bgcolor2 overflow-hidden">
                                <img src="{{ asset('assets/03.JPG') }}" alt="" class="w-full transition duration-500 ease-in-out hover:scale-105">
                            </div>
                        </a>
                        <div class="flex flex-wrap items-center justify-between px-2 mt-2">
                            <div>
                                <div class="flex flex-col">
                                    <div>
                                        joko kesayangan ayu
                                    </div>
                                    <div class="text-xs text-abuabu">
                                        18:00
                                    </div>
                                </div>
                            </div>
                            <div>
                                <span class="bi bi-tag-fill"></span>
                                <small>50</small>
                                <span class="bi bi-chat-left-text"></span>
                                <small>74</small>
                                <span class="bi bi-heart"></span>
                            </div>
                        </div>
                    </div> --}}
        </div>
</section>
    <!--album-->
    </div>
    <form action="/proses_simpan_album1" method="post">
        @csrf
        <div id="crud-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Album
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="crud-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5">
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="nama"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                    Album</label>
                                <input type="text" name="album" id="album"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Masukan Album Baru Disini" required="">
                                <br>
                            </div>
                        </div>
                        <button type="submit" class="w-full py-2 text-white rounded-full bg-biru-tua">Tambah</button>
                    </div>
    </form>
@include('sweetalert::alert')
@endsection
