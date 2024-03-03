var paginate = 1;
var dataExplore = [];
loadMoreData(paginate);
$(window).scroll(function(){
    if($(window).scrollTop() + $(window).height() >= $(document).height()){
        paginate++;
        loadMoreData(paginate);
    }
})
function loadMoreData(paginate){
    let user_id = $('#input-user_id').val();
    $.ajax({
        url: window.location.origin +'/getDataPublic/'+ user_id + '?page='+paginate,
        type: "GET",
        dataType: "JSON",
        success: function(e){
            console.log(e)
            e.data.data.map((x)=>{
                var hasilPencarian = x.like.filter(function(hasil){
                    return hasil.users_id === e.idUser
                })
                if(hasilPencarian.length <= 0){
                    userlike = 0;
                } else {
                    userlike = hasilPencarian[0].users_id;
                }

                        let datanya = {
                            id: x.id,
                            judul_foto: x.judul_foto,
                            deksripsi_foto: x.deksripsi,
                            foto: x.url,
                            tanggal: x.created_at,
                            jml_komen: x.komentar_count,
                            jml_like: x.like_count,
                            idUserLike: userlike,
                            useractive: e.idUser,
                            users_id: x.users_id,
             }
             dataExplore.push(datanya)
             console.log(userlike)
             console.log(e.idUser)
         })
         getExplore()
     },
     error: function(jqXHR, textStatus, errorThrown){

     }
 })
}

//pengulangan data
const getExplore =() => {
    $('#publicfoto').html('')
    dataExplore.map((x, i)=>{
        $('#publicfoto').append(
            `
            <div class="flex mt-2 bg-white">
            <div class="flex flex-col px-2">
                <a href="/detail_foto/${x.id}">
                    <div class="w-[363px] h-[192px] bg-bgcolor2 overflow-hidden">
                        <img src="/foto/${x.foto}" alt="" class="w-full transition duration-500 ease-in-out hover:scale-105">
                    </div>
                </a>
                <div class="flex flex-wrap items-center justify-between px-2 mt-2">
                    <div>
                        <div class="flex flex-col">
                            <div>
                                ${x.judul_foto}
                            </div>
                            <div class="text-xs text-abuabu">
                            ${new Date(x.tanggal).toLocaleDateString("id")}
                            </div>
                        </div>
                    </div>
                    <div>
                        <span class="bi bi-chat-left-text"></span>
                        <small>${x.jml_komen}</small>
                        <span class="bi ${x.idUserLike === x.useractive ? 'bi-heart-fill' : 'bi-heart' }"
                        onclick="likes(this, ${x.id})"></span>
                         <small>${x.jml_like}</small>
                    </div>
                </div>
            </div>
        </div>
            `
            )
        });
    }

    // like foto
    function likes(txt, id){
        console.log(id)
        $.ajax({
            url: window.location.origin +'/likesfotopublic',
            dataType: "JSON",
            type: "POST",
            data: {
                _token: $('input[name="_token"]').val(),
                idfoto: id
            },
            success:function(res){
                console.log(res)
                location.reload()
            },
            error:function(jqXHR, textStatus, errorThrown){
                alert('gagal')

            }
        })
    }
    function ikuti(txt, idfollow){
        $.ajax({
            url: window.location.origin +'/explore-detail/ikutidiprofile',
            dataType: "JSON",
            type: "POST",
            data: {
                _token: $('input[name="_token"]').val(),
                idfollow: idfollow
            },
            success:function(res){
                location.reload()
            },
            error:function(jqXHR, textStatus, errorThrown){
                alert('gagal')
    
            }
        })
    }
