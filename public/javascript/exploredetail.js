var segmentTerakhir = window.location.href.split('/').pop();

$.ajax({
    url: window.location.origin +'/explore-detail/'+ segmentTerakhir +'/getdatadetail',
    type: "GET",
    dataType: "JSON",
    success: function(res){
        console.log(res)
        $('#fotodetail').prop('src', '/foto/'+res.dataDetailFoto.url)
        $('#fotoprofile').prop('src', '/foto/'+res.dataDetailFoto.user.url)
        $('#judulfoto').html(res.dataDetailFoto.judul_foto)
// Misalkan 'created_at' dalam format ISO 8601 seperti "2024-02-29T12:34:56Z"
var createdAt = res.dataDetailFoto.created_at;

// Ubah 'created_at' menjadi objek Date
var createdDate = new Date(createdAt);

// Format tanggal sesuai kebutuhan, misalnya: "29 Februari 2024"
var formattedDate = createdDate.getDate() + ' ' + 
    getMonthName(createdDate.getMonth()) + ' ' +
    createdDate.getFullYear();

// Setel HTML elemen dengan id 'tanggal' dengan tanggal yang diformat
$('#tanggal').html(formattedDate);

// Fungsi untuk mendapatkan nama bulan dari indeks bulan
function getMonthName(monthIndex) {
    var months = [
        "Januari", "Februari", "Maret", "April", "Mei", "Juni", 
        "Juli", "Agustus", "September", "Oktober", "November", "Desember"
    ];
    return months[monthIndex];
}

        $('#username').html(res.dataDetailFoto.user.username)
        $('#deskripsifoto').html(res.dataDetailFoto.deskripsi)
        ambilKomentar()
        var idUser ;
        if(res.dataFollow == null){
            idUser=""
        } else {
            idUser = res.dataFollow.users_id
        }
        if(res.dataDetailFoto.users_id === res.dataUser){
            $('#tombolfollow').html('')
        } else {
            if(res.dataDetailFoto.users_id === res.dataUser){
                $('#tombolfollow').html('')
            } else {
                if(idUser == res.dataUser){
                    $('#tombolfollow').html(' <button class="px-4 rounded-full bg-biru-tua  text-white" onclick = "ikuti(this, '+res.dataDetailFoto.users_id+')">Unfollow</button>')
                } else {
                    $('#tombolfollow').html(' <button class="px-4 rounded-full bg-biru-tua  text-white" onclick = "ikuti(this, '+res.dataDetailFoto.users_id+')">Follow</button>')
                }
            }
        }


    },
    error: function(jqXHR, textStatus, errorThrown){
        alert('gagal')
    }
})


//datakomentar
function ambilKomentar(){
    $.getJSON(window.location.origin +'/explore-detail/getkomen/'+segmentTerakhir, function(res){
        console.log(res)
        if(res.data.lenght === 0){
            $('#komentar').html('<div>Belum ada komentar</div>')
        } else {
            komen= []
            res.data.map((x)=>{
                let datakomentar = {
                    idUser: x.user.id,
                    pengirim: x.user.username,
                    waktu: x.created_at,
                    isikomentar: x.isi_komentar,
                    potopengirim: x.user.url,
                }
                komen.push(datakomentar);
            })
            tampilkankomentar()
        }
    })
}

//menampilkan komentar
const tampilkankomentar = ()=>{
    $('#komentar').html('')
    komen.map((x, i)=>{
        $('#komentar').append(`
        <div class="flex flex-row justify-start mt-4">
            <div class="w-1/4">
                <img src="/foto/${x.potopengirim}" class="w-8 h-auto" alt="">
            </div>
            <div class="flex flex-col mr-2">
            <div class="flex flex-row gap-4">
            <small class="text-sm">${x.pengirim}</small>|
                <small class="text-sm">${new Date(x.waktu).toLocaleDateString("id")}</small>
                </div>
                <h2 class="text-xs text-abuabu">${x.isikomentar}</h2>
            </div>
        </div>
    </div>
`)

    })

}

//buatkomentar
function kirimkomentar(){
    $.ajax({
        url: window.location.origin +'/explore-detail/kirimkomentar',
        dataType: "JSON",
        type: "POST",
        data: {
            _token: $('input[name="_token"]').val(),
            idfoto: segmentTerakhir,
            isi_komentar: $('input[name="isi_komentar"]').val()
        },
        success: function(res){
            $('input[name="isi_komentar"]').val('')
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('gagal mengirim komentar')
        }
    })
}
setInterval(ambilKomentar, 500);

//follow
function ikuti(txt, idfollow){
    $.ajax({
        url: window.location.origin +'/explore-detail/ikuti',
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
