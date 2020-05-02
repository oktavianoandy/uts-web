(function ($) {

    const berhasil = $('.berhasil').data('flashdata');
    const gagal = $('.gagal').data('flashdata');
    const nama = $('.nama').data('flashdata');
    const login = $('.pesan').data('login');

    if (berhasil) {
        Swal.fire(
            'Data ' + nama,
            'Berhasil ' + berhasil,
            'success'
        )
    } else if (gagal) {
        Swal.fire(
            'Data ' + nama,
            'Gagal ' + gagal,
            'error'
        )
    }

    if (login) {
        Swal.fire(
            login,
            'Pastikan username dan password sudah benar',
            'error'
        )
    } 

    $('.btn-hapus-kandang').on('click', function (e) {
        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data " + nama + " akan dihapus" + ". Data ayam di kandang ini akan terhapus juga.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus data!',
            cancelButtonText: 'Tidak, batalkan!'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(
                    'Dibatalkan',
                    'Data '+nama+' tidak dihapus!',
                    'success'
                )
            }
        })
    });

    $('.btn-hapus-ayam').on('click', function (e) {
        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data " + nama + " akan dihapus" + ". Data produksi ayam ini akan terhapus juga.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus data!',
            cancelButtonText: 'Tidak, batalkan!'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(
                    'Dibatalkan',
                    'Data '+nama+' tidak dihapus!',
                    'success'
                )
            }
        })
    });

    $('.btn-hapus').on('click', function (e) {
        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data " + nama + " akan dihapus.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus data!',
            cancelButtonText: 'Tidak, batalkan!'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(
                    'Dibatalkan',
                    'Data '+nama+' tidak dihapus!',
                    'success'
                )
            }
        })

    });

})(jQuery);