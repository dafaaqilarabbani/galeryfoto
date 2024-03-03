@extends('nav.nav2')
@section('isi2')
        <div class="flex flex-col gap-4">
            <h3 class="mt-20 text-3xl text-center">ABADIKAN MOMEN ANDA<BR>DISINI
            </h3>
        &nbsp;
        <section>
        <div class="flex justify-center gap-4">
            <div>
                <div class="flex flex-col gap-4">
                        <div class="">
                            <img class= "rounded-lg w-[400px] h-[240px] " src="{{ asset('assets/planet2.jpg') }}" alt=""></div>
                        <div class="">
                            <img class= "rounded-lg w-[400px] h-[240px] " src="{{ asset('assets/planet3.jpg') }}" alt="">
                        </div>
                        </div>
                        </div>
                    <div class="">
                        <img class= "rounded-lg w-[350px] "src="{{ asset('assets/planet.jpg') }}" alt=""> </div>
                </div>
            </div>
        </div>
    </section>
    @include('sweetalert::alert')
@endsection
