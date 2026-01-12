        <!-- Begin Content -->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h4>Data Master Finance Kategori</h4>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url()?>">                                       
                        <svg class="stroke-icon">
                          <use href="<?=base_url()?>assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item"> Home</li>
                    <li class="breadcrumb-item"> Data Master</li>
                    <li class="breadcrumb-item active"> Master Finance Kategori</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
              <!-- Form Tambah Akun -->
              <div class="row">
                  <!-- Form Akun -->
                  <div class="col-sm-12">
                      <div class="card">
                          <div class="card-body">
                              <form class="row g-2 needs-validation" novalidate="" method="post" action="<?=base_url()?>master-finance-kategori/simpan-data">
                                  <!-- Kode Kategori -->
                                  <div class="col-md-6 position-relative"> 
                                      <label class="form-label" for="id_finance_kategori">Kode Kategori</label>
                                      <input class="form-control" id="id_finance_kategori" name="id_finance_kategori" type="text" aria-label="id_finance_kategori" required>
                                  </div>
                                  <!-- Nama Kategori -->
                                  <div class="col-md-6 position-relative"> 
                                      <label class="form-label" for="nama">Nama Kategori</label>
                                      <input class="form-control" id="nama" name="nama" type="text" aria-label="nama" required>
                                  </div>
                                  <!-- Tipe -->
                                  <div class="col-md-6 position-relative">
                                      <label class="form-label" for="tipe">Tipe</label>
                                      <select class="form-select" id="tipe" name="tipe" required="">
                                          <option>Pendapatan</option>
                                          <option>Pengeluaran</option>
                                      </select>
                                  </div>
                                  <!-- Finance Akun -->
                                  <div class="col-md-6 position-relative"> 
                                      <label class="form-label" for="financeakun">Akun Finance Terhubung</label>
                                      <select class="form-select" id="financeakun" name="id_finance_akun" required="">
                                          <option selected="" disabled="" value="0">Pilih Akun Finance</option>
                                      </select>
                                  </div>
                                  <!-- Submit Akun -->
                                  <div class="col-md-12 position-relative">
                                      <button class="btn btn-primary" id="tambah" type="submit">Tambah Kategori</button>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- End Form Tambah Akun-->
              <!-- Data Listing Akun -->
              <div class="row">
                  <div class="col-sm-12">
                      <div class="card">
                        <div class="card-header pb-0 card-no-border">
                          <h4>List Data Kategori</h4>
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="display" id="table-finance-kategori">
                              <thead>
                                <tr>
                                    <th>KODE KATEGORI</th>
                                    <th>NAMA KATEGORI</th>
                                    <th>TIPE</th>
                                    <th>TERHUBUNG DENGAN AKUN</th>
                                    <th>AKSI</th>
                                </tr>
                              </thead>
                              <tbody>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
              </div>
              <!-- End Listing Akun -->
              <!-- Modal Edit Data Master -->
              <div class="modal fade" id="EditMasterFinanceKategoriModal" tabindex="-1" role="dialog" aria-labelledby="EditMasterFinanceKategoriModal" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content dark-sign-up">
                      <div class="modal-body social-profile text-start">
                        <div class="modal-toggle-wrapper">
                          <h3>Edit Master Data</h3>
                          <form class="row g-3">
                          <!-- Kode Kategori -->
                          <div class="col-md-12 position-relative"> 
                              <label class="form-label" for="eid">Kode Kategori</label>
                              <input class="form-control" id="eid" name="eid" type="text" aria-label="eid" required>
                          </div>
                          <!-- Nama Kategori -->
                          <div class="col-md-12 position-relative"> 
                              <label class="form-label" for="enama">Nama Kategori</label>
                              <input class="form-control" id="enama" name="enama" type="text" aria-label="enama" required>
                          </div>
                          <!-- Tipe -->
                          <div class="col-md-12 position-relative">
                              <label class="form-label" for="etipe">Tipe</label>
                              <select class="form-select" id="etipe" name="etipe" required="">
                                  <option>Pendapatan</option>
                                  <option>Pengeluaran</option>
                              </select>
                          </div>
                          <!-- Finance Akun -->
                          <div class="col-md-12 position-relative"> 
                              <label class="form-label" for="efinanceakun">Akun Finance Terhubung</label>
                              <select class="form-select" id="efinanceakun" name="eid_finance_akun" required="">
                                  <option selected="" disabled="" value="0">Pilih Akun Finance</option>
                              </select>
                          </div>
                          <!-- Button Simpan -->
                            <div class="col-12">
                              <button class="btn btn-primary" type="button" id="update" data-bs-dismiss="modal">Simpan Perubahan</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        <!-- Container-fluid Ends-->
        </div>
        <!-- End Content -->