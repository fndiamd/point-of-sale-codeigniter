const url = window.location.pathname
const page = url.substr(15)

function setHtmlValue(id, value) {
    document.getElementById(id).innerHTML = value
}

function setInputValue(id, value) {
    document.getElementById(id).value = value
}

function getInputValue(id) {
    return document.getElementById(id).value
}

function currencyFormat(x) {
    return 'Rp' + x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

function generateDataTable(is_ajax, url = null) {
    if (is_ajax == true) {
        $('#data-tables').DataTable({
            "bAutoWidth": false,
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "ajax": {
                url: url,
                type: "GET"
            },
            "columnDefs": [
                { "className": "dt-center", "targets": -1 }
            ]
        });
    } else {
        $('#data-tables').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
        });
    }
}

async function loadSelect2Toko() {
    $.ajax({
        method: 'post',
        url: base_url + 'toko/getAll',
        success: function (data) {
            const select = $('.select2-toko')
            for (let i = 0; i < data.length; i++) {
                select.append("<option value='" + data[i].user + "'>" + data[i].nama_toko + "</option>")
            }
        }
    })
}

async function loadSelect2TokoTransaction() {
    $.ajax({
        method: 'post',
        url: base_url + 'toko/getAll',
        success: function (data) {
            const select = $('.select2-toko-transaction')
            for (let i = 0; i < data.length; i++) {
                select.append("<option value='" + data[i].id_toko + "'>" + data[i].nama_toko + "</option>")
            }
        }
    })
}

// function detail

function detailDataPenjualan(data) {
    setHtmlValue('modal-title', 'Data Penjualan - ' + data.no_invoice)
    setHtmlValue('nama_toko', data.nama_toko)
    setHtmlValue('nama_pelanggan', data.nama_pelanggan)
    setHtmlValue('no_invoice', data.no_invoice)
    setHtmlValue('tanggal_transaksi', data.tanggal)
    setHtmlValue('pembayaran', data.pembayaran)
    setHtmlValue('keterangan', data.keterangan)
    setHtmlValue('total_order', currencyFormat(data.totalorder))
    setHtmlValue('total_bayar', currencyFormat(data.totalbayar))
    setHtmlValue('kembalian', currencyFormat(data.kembalian))
    setHtmlValue('status_transaksi', data.status)
    setHtmlValue('jatuh_tempo', data.jatuh_tempo)
    setHtmlValue('operator', data.operator)
}

function detailPenjualan(data) {
    setHtmlValue('modal-title', 'Detail Penjualan - ' + data.no_invoice)
    setHtmlValue('nama_toko', data.nama_toko)
    setHtmlValue('nama_pelanggan', data.nama_pelanggan)
    setHtmlValue('nama_barang', data.nama_barang)
    setHtmlValue('no_invoice', data.no_invoice)
    setHtmlValue('jumlah_barang', data.jumlah)
    setHtmlValue('harga_barang', currencyFormat(data.harga))
    setHtmlValue('total_harga', currencyFormat(data.totalharga))
    setHtmlValue('total_modal', currencyFormat(data.totalmodal))
    setHtmlValue('tanggal_transaksi', data.tanggal)
    setHtmlValue('catatan', data.catatan)
    setHtmlValue('sisa_stok', data.sisa_stok)
    setHtmlValue('status_transaksi', data.status)
}

function detailDataPembelian(data) {
    setHtmlValue('modal-title', 'Data Pembelian - ' + data.no_invoice)
    setHtmlValue('nama_toko', data.nama_toko)
    setHtmlValue('nama_supplier', data.nama_supplier)
    setHtmlValue('no_invoice', data.no_invoice)
    setHtmlValue('tanggal_transaksi', data.tanggal)
    setHtmlValue('pembayaran', data.pembayaran)
    setHtmlValue('keterangan', data.keterangan)
    setHtmlValue('total_order', currencyFormat(data.totalorder))
    setHtmlValue('total_bayar', currencyFormat(data.totalbayar))
    setHtmlValue('kembalian', currencyFormat(data.kembalian))
    setHtmlValue('status_transaksi', data.status)
    setHtmlValue('jatuh_tempo', data.jatuh_tempo)
    setHtmlValue('operator', data.operator)
}

function detailPembelian(data) {
    setHtmlValue('modal-title', 'Detail Pembelian - ' + data.no_invoice)
    setHtmlValue('nama_toko', data.nama_toko)
    setHtmlValue('nama_supplier', data.nama_supplier)
    setHtmlValue('nama_barang', data.nama_barang)
    setHtmlValue('no_invoice', data.no_invoice)
    setHtmlValue('jumlah_barang', data.jumlah)
    setHtmlValue('harga_barang', currencyFormat(data.harga))
    setHtmlValue('total_harga', currencyFormat(data.totalharga))
    setHtmlValue('tanggal_transaksi', data.tanggal)
    setHtmlValue('catatan', data.catatan)
    setHtmlValue('status_transaksi', data.status)
}

function detailKategori(data) {
    setHtmlValue('modal-title', 'Edit - ' + data.nama_kategori)
    setInputValue('modalnama_kategori', data.nama_kategori)
    setInputValue('modaljenis_kategori', data.jenis_kategori)
    setInputValue('modalid_kategori', data.id_kategori)
    setInputValue('modaluser', data.user)
}

function detailToko(data) {
    setHtmlValue('modal-title', 'Detail ' + data.nama_toko)
    setHtmlValue('nama_toko', data.nama_toko)
    setHtmlValue('email', data.email)
    setHtmlValue('no_hp', data.nohp)
    setHtmlValue('user', data.user)
    setHtmlValue('alamat', data.alamat)
}

function detailBarang(data) {
    setHtmlValue('modal-title', data.nama_barang)
    setHtmlValue('nama_barang', data.nama_barang)
    setHtmlValue('kategori_barang', data.nama_kategori)
    setHtmlValue('kode_barang', data.kodebarang)
    setHtmlValue('harga_beli', currencyFormat(data.hargabeli))
    setHtmlValue('harga_jual', currencyFormat(data.hargajual))
    setHtmlValue('stok', data.stok + ' pcs')
    setHtmlValue('min_stok', data.minimalstok + ' pcs')
    setHtmlValue('diskon', data.diskon + '%')
    setHtmlValue('deskripsi', data.deskripsi)
}

function detailPelanggan(data){
    setHtmlValue('modal-title', 'Pelanggan ' + data.nama_pelanggan)
    setHtmlValue('nama_toko', data.nama_toko)
    setHtmlValue('nama_pelanggan', data.nama_pelanggan)
    setHtmlValue('email', data.email)
    setHtmlValue('telepon', data.telpon)
    setHtmlValue('status', data.status)
    setHtmlValue('aktif', data.aktiv)
    setHtmlValue('hutang', currencyFormat(data.hutang))
    setHtmlValue('alamat', data.alamat)
}

function detailSupplier(data){
    setHtmlValue('modal-title', 'Supplier ' + data.nama_supplier)
    setHtmlValue('nama_toko', data.nama_toko)
    setHtmlValue('nama_supplier', data.nama_supplier)
    setHtmlValue('email', data.email)
    setHtmlValue('telepon', data.telpon)
    setHtmlValue('aktif', data.aktiv)
    setHtmlValue('hutang', currencyFormat(data.hutang))
    setHtmlValue('provinsi', data.profinsi)
    setHtmlValue('kota', data.kota)
    setHtmlValue('alamat', data.alamat)
}

function detailUser(data){
    setHtmlValue('modal-title', 'User ' + data.nama_lengkap)
    setHtmlValue('nama_lengkap', data.nama_lengkap)
    setHtmlValue('email', data.email)
    setHtmlValue('telepon', data.no_telp)
    setHtmlValue('kota', data.kota)
    setHtmlValue('alamat', data.alamat)
    setHtmlValue('level', data.level)
    setHtmlValue('paket', data.paket)
}

// detail ajax
function getDetail(url, detailFunction) {
    $(document).on('click', '.detail-button', function () {
        const dataId = $(this).attr('data-id')
        $.ajax({
            method: "post",
            url: url,
            data: { id: dataId },
            success: function (data) {
                detailFunction(data)
            }
        })
    })
}

function editKategori() {
    $(document).on('click', '.btn-submit', function (e) {
        e.preventDefault();
        const user = getInputValue('modaluser')
        const kategori = getInputValue('modalnama_kategori')
        const jenis = getInputValue('modaljenis_kategori')
        const id = getInputValue('modalid_kategori')

        $.ajax({
            url: 'kategori/update/' + id,
            method: 'post',
            data: {
                user_kategori: user,
                nama_kategori: kategori,
                jenis_kategori: jenis
            },
            success: function () {
                $('#data-tables').DataTable().ajax.reload();
                $('#modal-edit').modal('hide');
                Swal.fire({
                    icon: 'success',
                    title: 'Kategori berhasil diupdate',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        })
    });
}

// select kategori by toko
$('#toko-user').on('change', function () {
    const kategori = $('#kategori');
    $.ajax({
        method: 'post',
        url: base_url + "kategori/searchByUser",
        data: {
            user: this.value
        },
        success: function (data) {
            kategori.empty();
            $('#kategori').val(null).trigger('change')
            $('#select2-kategori-container').attr('title', '--- Pilih Kategori ---')
            setHtmlValue('select2-kategori-container', '--- Pilih Kategori ---')
            kategori.append("<option value='' disabled selected>--- Pilih Kategori ---</option>")
            for (let i = 0; i < data.length; i++) {
                kategori.append("<option value='" + data[i].id_kategori + "'>" + data[i].nama_kategori + "</option>")
            }
        }
    })
})

$(document).ready(function () {

    $(function () {
        $('.select-plugin').select2();
    });

    $(".datepicker").datepicker({
        dateFormat: 'dd-mm-yyyy'
    });

    switch (page) {
        case 'history/piutang-pelanggan':
            generateDataTable(true, 'piutang-pelanggan/load')
            loadSelect2TokoTransaction()
            break;
        case 'history/piutang-supplier':
            generateDataTable(true, 'piutang-supplier/load')
            loadSelect2TokoTransaction()
            break;
        case 'log-pembayaran/hutang-pelanggan':
            generateDataTable(true, 'hutang-pelanggan/load')
            loadSelect2TokoTransaction()
            break;
        case 'log-pembayaran/hutang-supplier':
            generateDataTable(true, 'hutang-supplier/load')
            loadSelect2TokoTransaction()
            break;
        case 'penjualan/data-penjualan':
            generateDataTable(true, 'data-penjualan/load')
            getDetail('data-penjualan/detail', detailDataPenjualan)
            loadSelect2TokoTransaction()
            break;
        case 'penjualan/detail-penjualan':
            generateDataTable(true, 'detail-penjualan/load')
            getDetail('detail-penjualan/detail', detailPenjualan)
            loadSelect2TokoTransaction();
            break;
        case 'pembelian/data-pembelian':
            generateDataTable(true, 'data-pembelian/load')
            getDetail('data-pembelian/detail', detailDataPembelian)
            loadSelect2TokoTransaction()
            break;
        case 'pembelian/detail-pembelian':
            generateDataTable(true, 'detail-pembelian/load')
            getDetail('detail-pembelian/detail', detailPembelian)
            loadSelect2TokoTransaction()
            break;
        case 'toko':
            generateDataTable(true, 'toko/load')
            getDetail('toko/detail', detailToko)
            break;
        case 'barang':
            generateDataTable(true, 'barang/load')
            getDetail('barang/detail', detailBarang)
            break;
        case 'barang-toko':
            generateDataTable(true, 'barang-toko/load')
            getDetail('barang/detail', detailBarang)
            loadSelect2Toko()
            break;
        case 'kategori':
            generateDataTable(true, 'kategori/load')
            getDetail('kategori/detail', detailKategori)
            editKategori()
            loadSelect2Toko()
            break;
        case 'pelanggan':
            generateDataTable(true, 'pelanggan/load')
            getDetail('pelanggan/detail', detailPelanggan)
            break;
        case 'supplier':
            generateDataTable(true, 'supplier/load')
            getDetail('supplier/detail', detailSupplier)
            break;
        case 'user':
            generateDataTable(true, 'user/load');
            getDetail('user/detail', detailUser)
            break;
        case 'admin':
            generateDataTable(true, 'admin/load');
            break;
        default:
            loadSelect2Toko()
            generateDataTable(false)
    }

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
            text: "Data yang telah dihapus tidak dapat dikembalikan!",
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
                    success: function (data) {
                        swalWithBootstrapButtons.fire(
                            data.section + ' Deleted!',
                            data.data + ' berhasil dihapus.',
                            'success'
                        );
                        console.log(data);
                        $('#data-tables').DataTable().ajax.reload();
                    }
                });
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Data batal dihapus',
                    'error'
                )
            }
        })
    });
});
