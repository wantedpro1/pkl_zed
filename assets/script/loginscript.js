var flashData = $('.flash-data').data('flashdata');

if ((flashData == "Username atau Password tidak boleh kosong") || (flashData == "Username atau Password tidak boleh kosong") || (flashData == "Akun belum terdaftar. Silahkan Hubungi Admin") || (flashData == "Password Baru atau Konfirmasi Password tidak sama") || (flashData == "Password Baru atau Konfirmasi Password tidak boleh kosong") || (flashData == "Username atau Email tidak ditemukan")){
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