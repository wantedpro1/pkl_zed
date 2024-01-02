var flashData = $('.flash-data').data('flashdata');

if ((flashData == "Username telah terdaftar sebelumnya") || (flashData == "Password Baru atau Konfirmasi Password tidak sama") || (flashData == "Password Lama tidak sesuai")){
    Swal.fire({
        title : flashData, 
        icon  : 'warning',
        // showConfirmButton: false,
        // timer : 1200
    });
} else if (flashData) {
    Swal.fire({
        title : flashData, 
        icon  : 'success',
        // showConfirmButton: false,
        // timer : 1200
    });
}


// tombol-logout
$(document).on('click', '#tombol-logout', function (e) {

    e.preventDefault();
    var link = $(this).attr('href');

    Swal.fire({
        title : 'Apakah Anda Yakin?',
        text  : "Anda harus login kembali untuk mengakses halaman ini!",
        icon  : 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Logout!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = link;
        }
    })
});

// tombol-hapus
$(document).on('click', '#tombol-hapus', function (e) {

    e.preventDefault();
    var link = $(this).attr('href');

    Swal.fire({
        title : 'Apakah Anda Yakin?',
        text  : "Data yang Dihapus tidak akan kembali!",
        icon  : 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus Data!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = link;
        }
    })
});

// jadser-selesai
$(document).on('click', '#jadser-selesai', function (e) {

    e.preventDefault();
    var link = $(this).attr('href');

    Swal.fire({
        title : 'Apakah Anda Yakin?',
        text  : "Jadwal Service Selesai!",
        icon  : 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Jadwal Selesai!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = link;
        }
    })
});

// jadser-batal
$(document).on('click', '#jadser-batal', function (e) {

    e.preventDefault();
    var link = $(this).attr('href');

    Swal.fire({
        title : 'Apakah Anda Yakin?',
        text  : "Jadwal Service Dibatalkan!",
        icon  : 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Jadwal Dibatalkan!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = link;
        }
    })
});

// dokgampek-setuju
$(document).on('click', '#dokgampek-setuju', function (e) {

    e.preventDefault();
    var link = $(this).attr('href');

    Swal.fire({
        title : 'Apakah Anda Yakin?',
        text  : "Dokumentasi Pekerjaan Disetujui!",
        icon  : 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Data Disetujui!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = link;
        }
    })
});

// dokgampek-tolak
$(document).on('click', '#dokgampek-tolak', function (e) {

    e.preventDefault();
    var link = $(this).attr('href');

    Swal.fire({
        title : 'Apakah Anda Yakin?',
        text  : "Dokumentasi Pekerjaan Ditolak!",
        icon  : 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Data Ditolak!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = link;
        }
    })
});

// tombol-ditolak
$(document).on('click', '#tombol-ditolak', function (e) {

    e.preventDefault();
    var link = $(this).attr('href');

    Swal.fire({
        title : 'Apakah Anda Yakin?',
        text  : "Data Request Peminjaman Ditolak!",
        icon  : 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Tolak Data!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = link;
        }
    })
});

// tombol-kembalikan
$(document).on('click', '#tombol-kembalikan', function (e) {

    e.preventDefault();
    var link = $(this).attr('href');

    Swal.fire({
        title : 'Apakah Anda Yakin?',
        text  : "Data Peminjaman Ditolak Dikembalikan ke Request!",
        icon  : 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Kembalikan Data!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = link;
        }
    })
});

// // tombol-selesai
// $(document).on('click', '#tombol-selesai', function (e) {

//     e.preventDefault();
//     var link = $(this).attr('href');

//     Swal.fire({
//         title : 'Apakah Anda Yakin?',
//         text  : "Data Peminjaman Selesai Dikembalikan!",
//         icon  : 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Ya, Kembalikan Data!'
//     }).then((result) => {
//         if (result.isConfirmed) {
//             document.location.href = link;
//         }
//     })
// });

// // tombol-tambah
// $(document).on('click', '#tombol-tambah', function (e) {

//     e.preventDefault();
//     var link = $(this).attr('href');

//     Swal.fire({
//         title : 'Apakah Anda Yakin?',
//         text  : "Data Peminjaman Ditambah!",
//         icon  : 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Ya, Tambah Data!'
//     }).then((result) => {
//         if (result.isConfirmed) {
//             document.location.href = link;
//         }
//     })
// });