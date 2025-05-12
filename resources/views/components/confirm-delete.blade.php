<div x-data="{ open: false }" x-show="open"
    @confirm-delete.window="
    const get_id = event.detail.get_id;
    const data = event.detail.data;
    Swal.fire({
    title: 'Apakah anda yakin menghapus data ' + data + '?',
    text: 'Kamu tidak akan melihat data ini lagi!',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya, hapus itu!'
    }).then((result) => {
    if (result.isConfirmed) {
        $wire.confirmDelete(get_id).then(result => {
            Swal.fire({
                title: 'Dihapus!',
                text: 'Data ' + data + ' telah dihapus.',
                icon: 'success'
            });
        });
    } else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire({
        title: 'Tidak Jadi',
        text: 'Data ' + data + ' masih ada :)',
        icon: 'error'
        })
    }
    });
    ">

</div>
