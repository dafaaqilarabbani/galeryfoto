@extends('include.master')
@push('cssjsexternal')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
@endpush
@section('content')
    <section class="mt-20">
        <div class="max-w-screen-md mx-auto">
            <div class="ml-3 mb-2">
                <h3 class="mt-5 text-3xl font-semibold">DETAIL FOTO</h3>
            </div>
            <div class="flex flex-wrap px-2 flex-container" >
                <div class="w-3/5 max-[480px]:w-full">
                    <div class="flex justify-center overflow-hidden">
                        <img  alt="" class="w-full h-auto max-w-xl px-2 transition duration-500 ease-in-out hover:scale-105" id="fotodetail">
                    </div>
                    <div class="flex flex-col px-2">
                        <div class="font-semibold" id="judulfoto">
                        </div>
                        <div>
                            <small class="text-abuabu" id="deskripsifoto"> </small>
                        </div>
                        <div>
                            <small class="text-abuabu" id="tanggal"> </small>
                        </div>

                    </div>
                </div>
                <div class="w-2/5  max-[480px]:w-full">
                    <div class="flex flex-wrap items-center justify-between ">
                        <div class="flex flex-row items-center gap-2">
                            <div>
                                <img src="" class="w-10" alt="" id="fotoprofile">
                            </div>
                            <div class="flex flex-col">
                                <input type="text">
                                <a href="/profile_public/{{ $foto->users_id }}" class="text-md" id="username"></a>

                            </div>
                            <div id="tombolfollow">
                                {{-- <button class="px-4 rounded-full bg-biru-tua text-white">IKUTI</button> --}}
                            </div>
                        </div>
                    </div>
                    <div class="mt-[33px]">
                        Komentar
                    </div>
                    <div class="relative flex flex-col overflow-y-auto h-[200px] scrollbar-hidden" id="komentar">
                        {{-- <div class="flex flex-row justify-start mt-4">
                            <div class="w-1/4">
                                <img src="" class="w-8 h-auto" alt="">
                            </div>
                            <div class="flex flex-col mr-2">
                                <h5 class="text-sm">Atas</h5>
                                <small class="text-xs text-abuabu">Bawah</small>
                            </div>
                            <h5 class="text-sm">Fotonya sangat Bagus Sekali, apakah saya bisa memintanya</h5> --}}
                        </div>
                        <div class="flex gap-2 mt-2">
                        @csrf
                        <div class="w-3/4">
                            <input type="text" name="isi_komentar" id="" class="w-full px-2 py-1 rounded-lg bg-cari">
                        </div>
                        <button onclick="kirimkomentar()" class="px-4 rounded-lg bg-biru-tua"><span class="text-white bi bi-send"></span></button>
                    </div>
                </div>
            </div>
            </div>
                    </section>
@endsection
@push('footerjsexternal')
<script src="/javascript/exploredetail.js"></script>
@endpush
