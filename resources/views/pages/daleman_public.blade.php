@extends('include.master')
@push('cssjsexternal')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>

@endpush
@section('content')
<section class="mt-20">
    <div class="items-center max-w-screen-md mx-auto ">
        <h3 class="text-5xl text-center font-hurricane">PROFILE </h3>
    </div>
</section>
<section>
        <div class="mb-4"></div>
        <small class="text-center text-xs "></small>
        <div class="flex flex-row mt-3 gap-4">
            {{-- <small class="mr-4 text-abuabu">Followers {{ $followers_count }}</small>
            <small class="text-abuabu">Following {{ $following_count }}</small> --}}
        </div>
    </div>
        <section class="mt-5 flex flex-wrap lg:flex-row max-w-screen-md mx-auto gap-2">
        <div class="max-w-screen-md mx-auto">
            <input type = "hidden" value="{{ $users_id }}" id="input-user_id">
            <div class="flex flex-wrap items-center flex-container" id="publicfoto">
                @csrf

                    </div>
        </div>
</section>
@push('footerjsexternal')
    <script src="/javascript/profilepublic.js"></script>
@endpush
    @endsection
