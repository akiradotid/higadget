var tsupp;
$(document).ready(function () {
    reload();
    getid();
    deletedata();
});

function reload() {
    if ($.fn.DataTable.isDataTable('#table-finance-akun')) {
      tsupp.destroy();
    }
    tsupp = $("#table-finance-akun").DataTable({
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
            "url": base_url+'master-finance-akun/jsonfna',
            "type": "POST"
        },
        "columns": [
            { "data": "id_finance_akun"},
            { "data": "nama"},
            { "data": "kategori"},
            { 
              "data": "id_finance_akun",
              "orderable": false, // Disable sorting for this column
              "render": function(data, type, full, meta) {
                return 0;
              }
            },
            { 
              "data": "id_finance_akun",
              "orderable": false, // Disable sorting for this column
              "render": function(data, type, full, meta) {
                // if (type === "display") {
                  if (data) {
                    return `
                      <ul class="action">
                        <li class="edit">
                          <button class="btn" id="edit-btn" type="button" data-id="${data}" data-bs-toggle="modal" data-bs-target="#EditMasterFinanceAkunModal"><i class="icon-pencil"></i></button>
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
    });    
}

function getid(){
  $('#EditMasterFinanceAkunModal').on('show.bs.modal', function (e) {
      $('#estatus').select2({
          dropdownParent: $("#EditMasterFinanceAkunModal"),
          language: 'id',
      });  
      var button = $(e.relatedTarget);
      var id_sup = button.data('id');
      
      $.ajax({
          url: base_url + "master-finance-akun/edit/"+id_sup,
          dataType: "json",
          success: function(data) {
              $.each(data.get_id, function(index, item) {
                  $("#eid").val(item.id_finance_akun);
                  $("#enama").val(item.nama);
                  $("#ekategori").val(item.kategori);
              });
          }
      });
      updatedata();
  });
}
function updatedata(){
  $("#update").on("click", function (){
      var id = $("#eid").val();
      var nama = $("#enama").val();
      var kategori = $("#ekategori").val();
      
      if (!nama || !kategori) {
          swal("Error", "Lengkapi form yang kosong", "error");
          return;
      }
      $.ajax({
          type: "POST",
          url: "master-finance-akun/update-data",
          data: {
              eid: id,
              enama: nama,
              ekategori: kategori,
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
  $('#table-finance-akun').on('click', '#delete-btn', function (e) {
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
                  url: base_url + 'master-finance-akun/hapus/' + id,
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