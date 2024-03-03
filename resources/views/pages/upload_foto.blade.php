@extends('include.master')
@section('content')
<section class="mt-20 flex flex-wrap lg:flex-row max-w-screen-md mx-auto ">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

* {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	font-family: 'Poppins', sans-serif;
}


.container {
	max-width: 400px;
	width: 100%;
	background: #e6e3e3;
	padding: 30px;
	border-radius: 30px;
	border : orangered;
}
.img-area {
	position: relative;
	width: 100%;
	height: 240px;
	background: var(--grey);
	margin-bottom: 10px;
	border-radius: 15px;
	overflow: hidden;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
}
.img-area .icon {
	font-size: 100px;
}
.img-area h3 {
	font-size: 20px;
	font-weight: 500;
	margin-bottom: 6px;
}
.img-area p {
	color: #999;
}
.img-area p span {
	font-weight: 600;
}
.img-area img {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	object-fit: cover;
	object-position: center;
	z-index: 100;
}
.img-area::before {
	content: attr(data-img);
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background: rgba(0, 0, 0, .5);
	color: #fff;
	font-weight: 500;
	text-align: center;
	display: flex;
	justify-content: center;
	align-items: center;
	pointer-events: none;
	opacity: 0;
	transition: all .3s ease;
	z-index: 200;
}
.img-area.active:hover::before {
	opacity: 1;
}
</style>

        <div class="ml-3 ">
            <h3 class="mt-5 text-3xl font-semibold">UPLOAD FOTO</h3>
        </div>
    </div>
    <form action="/proses_upload" method="post" enctype="multipart/form-data">
        @csrf
        <div class="max-w-screen-md mx-auto">
            <div class="flex flex-wrap items-center flex-container">
                <div class="flex mt-2 bg-white">
                    <div class="flex flex-col px-2">
                         <div class="w-[363px] h-[192px] bg-bgcolor2">
                            <div class="w-3/5 max-[480px]:w-full">
                                <div class="flex justify-center px-3">
                                    <div class="flex items-center justify-center w-full">
                                        <div class="container">
                                            <input type="file" id="file" accept="image/*" name="foto" hidden/>
                                            <div class="img-area select-image" data-img="">
                                                <i class='bx bxs-cloud-upload icon'></i>
                                                <h3>Upload Image</h3>
                                                <p>Image size must be less than <span>5MB</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="flex items-center justify-center w-full">
                                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/></svg>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                        </div>
                                        <input id="dropzone-file" type="file" class="hidden" name="foto">
                                    </label>
                                </div> --}}
                                </div></div></div>
                <div class="flex mt-20 bg-white">
                    <div class="flex flex-col px-2">
                            <div class="w-[363px] h-[192px] bg-bgcolor2 ">
                                <div class="mb-2">
                                    <label for="default-input" class="mb-2 text-sm font-medium dark:text-white">Judul Foto</label>
                                    <input type="text" id="default-input" name="judul_foto" class="  block p-2 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 ">
                                </div>
                                <div class="mb-2">
                                    <form class="max-w-sm mx-auto">
                                      <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi Foto</label>
                                        <textarea id="message" rows="4" name="deskripsi" class="block p-2 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""></textarea>
                                    </form>
                                </div>
                                <div class="mb-2 ">
                                    <label for="default-input" class="flex mb-1 text-sm font-medium dark:text-white">Album</label>
                                <div class="flex flex-row">
                                    {{-- <input type="text" id="default-input" class=" block p-2 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 "> --}}
                                    <select type="text" class="form form-control block p-2 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 " id="selectKategoriPengaduan" name="album" required>
                                        <option value="" >-- Pilih Album --</option>
                                        @foreach ( $dataalbum as $item)
                                        <option value="{{ $item->id}}">{{ $item->judul_album}}</option>
                                        @endforeach
                                    </select>
                                    <button type="button" data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                                    class= "block px-2 text-sm text-gray-900 bg-blue-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 bi bi-plus" type="button">
                                </button>
                                </div>
                                <div class="">
                                </div>
                                    <div class="mt-2">
                                        <Button type="text" id="default-input" class="rounded-lg block p-2 w-full text-sm bg-biru-tua text-white ">Unggah</Button>
                                    </div>
                                </form>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                        </div>
                        <div>
        </section>
    <form action="/proses_simpan_album" method="post">
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
    <script>
        const selectImage = document.querySelector('.select-image');
        const inputFile = document.querySelector('#file');
        const imgArea = document.querySelector('.img-area');

        selectImage.addEventListener('click', function () {
            inputFile.click();
        })

        inputFile.addEventListener('change', function () {
            const image = this.files[0]
            if(image.size < 5000000) {
                const reader = new FileReader();
                reader.onload = ()=> {
                    const allImg = imgArea.querySelectorAll('img');
                    allImg.forEach(item=> item.remove());
                    const imgUrl = reader.result;
                    const img = document.createElement('img');
                    img.src = imgUrl;
                    imgArea.appendChild(img);
                    imgArea.classList.add('active');
                    imgArea.dataset.img = image.name;
                }
                reader.readAsDataURL(image);
            } else {
                alert("Image size more than 2MB");
            }
        })
        </script>
        @include('sweetalert::alert')
        @endsection

