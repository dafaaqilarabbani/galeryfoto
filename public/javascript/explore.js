var paginate = 1;
var dataExplore = [];
loadMoreData(paginate);
$(window).scroll(function(){
    if($(window).scrollTop() + $(window).height() >= $(document).height()){
        paginate++;
        loadMoreData(paginate);
    }
})
function loadMoreData(paginate) {
    var urlnya = window.location.href.split("?")[1];
    var parameter = new URLSearchParams(urlnya);
    var carivalue = parameter.get('cari');
    var url;

    if (carivalue == 'null') {
        url = window.location.origin + '/getDataExplore' + '?page=' + paginate;
    } else {
        url = window.location.origin + '/getDataExplore?cari=' + carivalue + '&page=' + paginate;
    }

    $.ajax({
        url: url,
        type: "GET",
        dataType: "JSON",
        success: function (e) {
            console.log(e);
            idUser = e.idUser; // menyimpan nilai idUser
            dataExplore = e.data.data.map(x => ({
                id: x.id,
                judul_foto: x.judul_foto,
                deksripsi_foto: x.deksripsi,
                foto: x.url,
                waktu: x.created_at,
                jml_komen: x.komentar_count || 0, // menggunakan nilai default 0 jika komentar tidak ada
                jml_like: x.like.filter(like => like.users_id === idUser).length, // menghitung jumlah like berdasarkan idUser
                idUserLike: x.like.some(like => like.users_id === idUser),
                useractive: idUser,
                users_id: x.users_id,
            }));
            getExplore();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error("Error:", textStatus, errorThrown);
        }
    });
}

//pengulangan data
const getExplore =()=>{
    $('#exploredata').html('')
    dataExplore.map((x, i)=>{
        $('#exploredata').append(
            `
            <div class="flex mt-2 bg-gray-500">
            <div class="flex flex-col px-2">
                <a href="/detail_foto/${x.id}">
                    <div class="w-[363px] h-[192px] bg-bgcolor2 overflow-hidden">
                        <img src="/foto/${x.foto}" alt="" class="w-full transition duration-500 ease-in-out">
                    </div>
                </a>
                <div class="flex flex-wrap items-center justify-between px-2 mt-2">
                    <div>
                        <div class="flex flex-col">
                            <div>
                                ${x.judul_foto}
                            </div>
                            <div class="text-xs text-abuabu">
                                ${new Date(x.waktu).toLocaleDateString("id")}
                            </div>
                        </div>
                    </div>
                    <div>
                        <!-- Tampilkan tombol "Report" hanya untuk pengguna publik -->
                        ${x.user_id !== x.useractive ? `<a href="/report/${x.id}" class="px-4 rounded-md bg-gray-300">Report</a>` : ''}

                        <a href="/detail_foto/${x.id}" class="bi bi-chat-left-text"></a>
                        <small>${x.jml_komen}</small>

                        <span class="bi ${x.idUserLike === x.useractive ? 'bi-heart-fill text-red-500 ': 'bi-heart' }" onclick="likes(this, ${x.id})"></span>
                        <small>${x.jml_like}</small>
                    </div>
                </div>
            </div>
        </div>

`
        )
    })
}

//likefoto
    function likes(txt, id){
        console.log(id)
        $.ajax({
            url: window.location.origin +'/likesfoto',
            dataType: "JSON",
            type: "POST",
            data: {
                _token: $('input[name="_token"]').val(),
                idfoto: id
            },
            success:function(res){
                console.log(res)
                location.reload(    )
            },
            error:function(jqXHR, textStatus, errorThrown){
                alert('gagal')

        }
    })
}
