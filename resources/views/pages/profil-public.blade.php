@extends('include.master')
@push('cssjsexternal')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>

@endpush
@section('content')
<section class="mt-20">
    @csrf
    <div class="items-center max-w-screen-md mx-auto ">
        <h3 class="text-5xl text-center font-hurricane">PROFILE </h3>
    </div>
</section>
<section>
    <div class="flex flex-col items-center max-w-screen-md px-2 mx-auto mt-4">
        <div>
            <img src="/foto/{{ $url }}" alt="" class="rounded-full w-36 h-36 mt-3">
        </div>
        <h3 class="text-xl font-semibold">
            {{ $username }}
        </h3>
        <div class="mb-4"></div>
        <div class="flex justify-center gap-4">
            @if ($user_id != auth()->user()->id)
        @if (in_array(auth()->user()->id, $followers_id))
            <button  type="button" class="block px-2 text-sm text-gray-900 bg-blue-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 " onclick="ikuti(this, {{ $user_id }})">
                <h3 class="text-1xl font-semibold">
                    Unfollow
                </h3>
            </button>
        @else
        <button  type="button" class="block px-2 text-sm text-gray-900 bg-blue-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 " onclick="ikuti(this, {{ $user_id }})">
            <h3 class="text-1xl font-semibold">
                Follow
            </h3>
        </button>
        @endif
        </div>
        @endif
        <div class="mb-4"></div>
        <small class="text-center text-xs "></small>
        <div class="flex flex-row mt-3 gap-4">
            <small class="mr-4 text-abuabu">Followers {{ $followers_count }}</small>
            <small class="text-abuabu">Following {{ $following_count }}</small>
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
                    <input type = "hidden" value="{{ $user_id }}" id="input-user_id">
                    <div class="flex flex-wrap items-center flex-container" id="publicfoto">
                        @csrf
                                {{-- <div class="w-[363px] h-[192px] bg-bgcolor2 overflow-hidden">
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
                                    <div> --}}
                                        {{-- <form action="{{ route('dalemanalbum.destroy', $foto) }}" method="POST"> --}}
                                            {{-- @csrf
                                            @method('delete') --}}
                                            {{-- <button type="submit" class="block px-2 text-sm text-gray-900 bg-blue-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 "  onclick="return confirm(' ingin menghapus foto ini?')">Hapus</button> --}}
                                        {{-- </form> --}}
                                    </div>
                                </div>
                            </div>
                    </div>
                </section>
        </div>
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800 " id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
            @foreach($dataalbum as $album)
            <a href="/dalemanpublic/{{$user_id}}">
                <div class="w-[363px] h-[192px] bg-bgcolor2 overflow-hidden">
                    <img src="/assets/folder.jpg" alt="" class="w-full transition duration-500 ease-in-out hover:scale-105">
                </div>
                <h3>{{ $album->judul_album }}</h3>
            </a>
        @endforeach
        
            
        </div>
    
    </div>
    
    <section class="mt-5 flex flex-wrap lg:flex-row max-w-screen-md mx-auto gap-2">
        <div class="max-w-screen-md mx-auto">
            <div class="flex flex-wrap items-center flex-container">
              
                    
            
               
        {{-- <section class="mt-5 flex flex-wrap lg:flex-row max-w-screen-md mx-auto gap-2">
        <div class="max-w-screen-md mx-auto">
            <input type = "hidden" value="{{ $users_id }}" id="input-user_id">
            <div class="flex flex-wrap items-center flex-container" id="publicfoto">
                @csrf    --}}
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
                        </div>--}}
                    </div>
        </div>
</section>
@push('footerjsexternal')
    <script src="/javascript/profilepublic.js"></script>
@endpush
    @endsection
