@extends('include.master')
@section('content')
<!-- Section Gambar-->
<div class="mt-20">
    @foreach ($album->foto as  $foto)
<section class="flex flex-wrap lg:flex-row max-w-screen-md mx-auto gap-2">
    <div class="max-w-screen-md mx-auto">
        <div class="flex flex-wrap items-center flex-container" >
        <div class="flex mt-2 bg-white">
                <div class="flex flex-col px-2">
                        <div class="w-[363px] h-[192px] bg-bgcolor2 overflow-hidden">
                            <img src="/foto/{{ $foto->url }}" alt="" class="w-full">
                        </div>
                    <div class="flex flex-wrap items-center justify-between px-2 mt-2">
                        <div>
                            <div class="flex flex-col">
                                <div>
                                    {{ $foto->judul_foto }}
                                </div>
                                <div class="text-xs text-abuabu">
                                    {{ $foto->deskripsi }}
                                </div>
                            </div>
                        </div>
                        <div>
                            <form action="{{ route('dalemanalbum.destroy', $foto) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="block px-2 text-sm text-gray-900 bg-blue-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 "  onclick="return confirm(' ingin menghapus foto ini?')">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
                                {{-- <form action="{{ route('dalemanalbum.destroy', $foto) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" onclick="return confirm(' ingin menghapus foto ini?')">Hapus</button>
                            </div>
                        </form> --}}
@endforeach
@include('sweetalert::alert')
@endsection
