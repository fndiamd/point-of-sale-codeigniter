$(function () {
    $('#data-tables').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
    });

    $(".datepicker").datepicker({
        dateFormat: 'dd-mm-yyyy'
    });

    $(document).on('click', '.delete-button', function () {
        const urlData = $(this).attr('data-url');
        const rowData = $(this).attr('row-data');
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: true
        })

        swalWithBootstrapButtons.fire({
            title: 'Apakah anda yakin?',
            text: "Data yang sudah dihapus nantinya tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, saya yakin!',
            cancelButtonText: 'Tidak, batalkan!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: urlData,
                    method: 'post',
                    success: function () {
                        swalWithBootstrapButtons.fire(
                            'Deleted!',
                            'Data kamu sudah dihapus.',
                            'success'
                        );
                        $('#' + rowData).remove();
                    }
                });
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Datamu tidak jadi dihapus',
                    'error'
                )
            }
        })
    });
})
