var tsupp;
var monthNames = [
    "Januari", "Februari", "Maret", "April", "Mei", "Juni",
    "Juli", "Agustus", "September", "Oktober", "November", "Desember"
];
var formatcur = new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR',
    minimumFractionDigits: 0
});
$(document).ready(function () {
    $('#kategori').select2({
        language: 'id',
        ajax: {
            url: base_url + 'master-finance-kategori/loadfnk',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    nama: params.term, // Add the search term to your AJAX request
                    tipe: 'Pengeluaran', // Add the search term to your AJAX request
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            id: item.id_finance_kategori,
                            text: item.nama + ' (' + item.id_finance_kategori + ')',
                        };
                    }),
                };
            },
            cache: false,
        },
    });

    $('#ekategori').select2({
        language: 'id',
        ajax: {
            url: base_url + 'master-finance-kategori/loadfnk',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    nama: params.term, // Add the search term to your AJAX request
                    tipe: 'Pengeluaran', // Add the search term to your AJAX request
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            id: item.id_finance_kategori,
                            text: item.nama + ' (' + item.id_finance_kategori + ')',
                        };
                    }),
                };
            },
            cache: false,
        },
    });

    reload();
    getid();
    deletedata();
});

function reload() {
    if ($.fn.DataTable.isDataTable('#table-finance-pengeluaran')) {
      tsupp.destroy();
    }
    tsupp = $("#table-finance-pengeluaran").DataTable({
        "processing": true,
        "language": { 
            "processing": '<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>',
            // "url": '//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json',            
        },
        "serverSide": true,
        "order": [
          [0, 'asc']
        ],
        "ajax": {
            "url": base_url+'pengeluaran/jsonfnp',
            "type": "POST"
        },
        "columns": [
            { "data": "id_finance_trx"},
            { 
                "data": "tgl_transaksi",
                "render": function (data, type, row) {
                    if (type === 'display' || type === 'filter') {
                        var date = new Date(data);
                        var day = ('0' + date.getDate()).slice(-2);
                        var month = monthNames[date.getMonth()];
                        var year = date.getFullYear();
                        return `${day} ${month} ${year}`;
                    }
                    return data;
                }
            },
            { "data": "nama_kategori", "name": "fk.nama"},
            { "data": "catatan"},
            { 
                "data": "nominal",
                "render": function (data, type, row) {
                    return formatcur.format(data);
                }
            },
            { 
                "data": "created_at",
                "render": function (data, type, row) {
                    if (type === 'display' || type === 'filter') {
                        var date = new Date(data);
                        var day = ('0' + date.getDate()).slice(-2);
                        var month = monthNames[date.getMonth()];
                        var year = date.getFullYear();
                        var hours = ('0' + date.getHours()).slice(-2);
                        var minutes = ('0' + date.getMinutes()).slice(-2);
                        return `${day} ${month} ${year} <br><b>${hours}:${minutes}</b>`;
                    }
                    return data;
                }
            },
            { 
              "data": "id_finance_trx",
              "orderable": false, // Disable sorting for this column
              "render": function(data, type, full, meta) {
                // if (type === "display") {
                  if (data) {
                    return `
                      <ul class="action">
                        <li class="edit">
                          <button class="btn" id="edit-btn" type="button" data-id="${data}" data-bs-toggle="modal" data-bs-target="#EditFinancePendapatanModal"><i class="icon-pencil"></i></button>
                        </li>
                        <li class="delete">
                          <button class="btn" id="delete-btn" type="button" data-id="${data}"><i class="icon-trash"></i></button>
                        </li>
                      </ul>
                    `;
                  }
                // }
                return data;
              }
            }
          ],    
          "order": [[4, 'desc']],                    
    });

    tsupp.on('draw', function() {
        tsupp.column(0, {
            search: 'applied',
            order: 'applied'
        }).nodes().each(function(cell, i) {
            var start = this.page.info().page * this.page.info().length;
            cell.innerHTML = start + i + 1;
            tsupp.cell(cell).invalidate('dom');
        });
    }).draw();
}

function getid(){
  $('#EditFinancePengeluaranModal').on('show.bs.modal', function (e) {
      var button = $(e.relatedTarget);
      var id_sup = button.data('id');
      
      $.ajax({
          url: base_url + "pengeluaran/edit/"+id_sup,
          dataType: "json",
          success: function(data) {
              $.each(data.get_id, function(index, item) {
                  $("#eid").val(item.id_finance_trx);
                  $("#etgl_transaksi").val(item.tgl_transaksi);
                  $("#ekategori").val(item.id_finance_kategori);
                  $("#enominal").val(item.nominal);
                  $("#ecatatan").val(item.catatan);
              });
          }
      });
      updatedata();
  });
}
function updatedata(){
  $("#update").on("click", function (){
      var id = $("#eid").val();
      
      $.ajax({
          type: "POST",
          url: "pengeluaran/update-data",
          data: {
              eid: id,
              etgl_transaksi: $("#etgl_transaksi").val(),
              ekategori: $("#ekategori").val(),
              enominal: $("#enominal").val(),
              ecatatan: $("#ecatatan").val(),
          },
          dataType: "json", 
          success: function (response) {
              if (response.status === 'success') {
                  swal("Data berhasil diupdate", {
                      icon: "success",
                  }).then((value) => {
                      reload();
                  });
              } else {
                  swal("Gagal update data", {
                      icon: "error",
                  });
              }
          },
          error: function (error) {
              swal("Gagal", {
                  icon: "error",
              });
          }
      });
  });
}
function deletedata() {
  $('#table-finance-pengeluaran').on('click', '#delete-btn', function (e) {
      e.preventDefault();
      var id = $(this).data('id');
      swal({
          title: 'Apa anda yakin?',
          text: 'Data yang sudah terhapus hilang permanen!',
          icon: 'warning',
          buttons: {
              cancel: {
                  text: 'Cancel',
                  value: null,
                  visible: true,
                  className: 'btn-secondary',
                  closeModal: true,
              },
              confirm: {
                  text: 'Delete',
                  value: true,
                  visible: true,
                  className: 'btn-danger',
                  closeModal: true
              }
          }
      }).then((willDelete) => {
          if (willDelete) {
              $.ajax({
                  type: 'POST',
                  url: base_url + 'pengeluaran/hapus/' + id,
                  dataType: 'json',
                  success: function (response) {
                      if (response.success) {
                          swal('Deleted!', response.message, 'success');
                          reload();
                      } else {
                          swal('Error!', response.message, 'error');
                      }
                  },
                  error: function (error) {
                      swal('Error!', 'An error occurred while processing the request.', 'error');
                  }
              });
          }
      });        
  });
}