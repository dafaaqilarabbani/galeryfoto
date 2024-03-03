@extends('include.master')
@push('cssjsexternal')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
@endpush
@section('content')
   <div class="mt-20 mx-auto font-semibold text-xl text-center">Selamat Datang<br>{{ $datausers->username}}</div>
    <section class="mt-5 flex flex-wrap lg:flex-row max-w-screen-md mx-auto gap-2">
        <div class="max-w-screen-md mx-auto">
            <div class="flex flex-wrap items-center flex-container" id="exploredata">
                @csrf
                
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
                    </div>
                </div>
                <div class="flex mt-2 bg-white">
                    <div class="flex flex-col px-2">
                        <a href="explore-detail.html">
                            <div class="w-[363px] h-[192px] bg-bgcolor2 overflow-hidden">
                                <img src="{{ asset('assets/01.JPG') }}" alt="" class="w-full transition duration-500 ease-in-out hover:scale-105">
                            </div>
                        </a>
                        <div class="flex flex-wrap items-center justify-between px-2 mt-2">
                            <div>
                                <div class="flex flex-col">
                                    <div>
                                        adudu turun
                                    </div>
                                    <div class="text-xs text-abuabu">
                                        15:30
                                    </div>
                                </div>
                            </div>
                            <div>
                                <span class="bi bi-tag-fill"></span>
                                <small>23</small>
                                <span class="bi bi-chat-left-text"></span>
                                <small>64</small>
                                <span class="bi bi-heart"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex mt-2 bg-white">
                    <div class="flex flex-col px-2">
                        <a href="explore-detail.html">
                            <div class="w-[363px] h-[192px] bg-bgcolor2 overflow-hidden">
                                <img src="{{ asset('assets/01.JPG') }}" alt="" class="w-full transition duration-500 ease-in-out hover:scale-105">
                            </div>
                        </a>
                        <div class="flex flex-wrap items-center justify-between px-2 mt-2">
                            <div>
                                <div class="flex flex-col">
                                    <div>
                                        kentunk turu
                                    </div>
                                    <div class="text-xs text-abuabu">
                                        02:00
                                    </div>
                                </div>
                            </div>
                            <div>
                                <span class="bi bi-tag-fill"></span>
                                <small>12</small>
                                <span class="bi bi-chat-left-text"></span>
                                <small>14</small>
                                <span class="bi bi-heart"></span>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>

        </section>
        @include('sweetalert::alert')
        @endsection
        @push('footerjsexternal')
        <script src="/javascript/explore.js"></script>
    @endpush
