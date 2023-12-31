$(document).ready(function() {
    $('#dtHorizontalExample').DataTable({
        "scrollX": true
    });
    $('.dataTables_length').addClass('bs-select');

});

function button_aktif(){
    var aktif = document.getElementById('button_aktif');
    var waktu = new Date();
    var jam = 06;

    if(jam >=7 && jam <=8){
        aktif.style.display = 'blok';
    }else{
        aktif.style.display='none';
    }
    
    // var status = 'Aktif';

    // if (status = 'Aktif'){
    //     aktif.style.display = 'blok';
    // }else{
    //     aktif.style.display = 'none';
    // }
}


function detail(id) {
    var base_url = $('#baseurl').val();
    window.location.href = base_url + "barang/detail/" + id;

}

function konfirmasi(id) {
    var base_url = $('#baseurl').val();

    swal.fire({
        title: "Hapus Data ini?",
        icon: "warning",
        closeOnClickOutside: false,
        showCancelButton: true,
        confirmButtonText: 'Iya',
        confirmButtonColor: '#4e73df',
        cancelButtonText: 'Batal',
        cancelButtonColor: '#d33',
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: "Memuat...",
                onBeforeOpen: () => {
                    Swal.showLoading()
                },
                timer: 1000,
                showConfirmButton: false,
            }).then(
                function() {
                    window.location.href = base_url + "barang/proses_hapus/" + id;
                }
            );
        }
    });

}