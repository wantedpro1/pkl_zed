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