        <!-- Begin Content -->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h4>Data Master Finance Akun</h4>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url()?>">                                       
                        <svg class="stroke-icon">
                          <use href="<?=base_url()?>assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item"> Home</li>
                    <li class="breadcrumb-item"> Data Master</li>
                    <li class="breadcrumb-item active"> Master Finance Akun</li>
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
                              <form class="row g-2 needs-validation" novalidate="" method="post" action="<?=base_url()?>master-finance-akun/simpan-data">
                                  <!-- Kode Akun -->
                                  <div class="col-md-4 position-relative"> 
                                      <label class="form-label" for="id_finance_akun">Kode Akun</label>
                                      <input class="form-control" id="id_finance_akun" name="id_finance_akun" type="text" aria-label="id_finance_akun" required>
                                  </div>
                                  <!-- Nama Akun -->
                                  <div class="col-md-4 position-relative"> 
                                      <label class="form-label" for="nama">Nama Akun</label>
                                      <input class="form-control" id="nama" name="nama" type="text" aria-label="nama" required>
                                  </div>
                                  <!-- Kategori -->
                                  <div class="col-md-4 position-relative">
                                      <label class="form-label" for="kategori">Kategori</label>
                                      <select class="form-select" id="kategori" name="kategori" required="">
                                          <option>Kas & Bank</option>
                                          <option>Piutang Usaha</option>
                                          <option>Persediaan</option>
                                          <option>Aktiva Lancar Lainnya</option>
                                          <option>Aktiva Tetap</option>
                                          <option>Kewajiban Lancar</option>
                                          <option>Kewajiban Jangka Panjang</option>
                                          <option>Modal / Ekuitas</option>
                                          <option>Pendapatan</option>
                                          <option>HPP</option>
                                          <option>Beban Operasional</option>
                                          <option>Pendapatan Lainnya</option>
                                          <option>Beban Lainnya</option>
                                      </select>
                                  </div>
                                  <!-- Submit Akun -->
                                  <div class="col-md-12 position-relative">
                                      <button class="btn btn-primary" id="tambah" type="submit">Tambah Akun</button>
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
                          <h4>List Data Akun</h4>
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="display" id="table-finance-akun">
                              <thead>
                                <tr>
                                    <th>KODE AKUN</th>
                                    <th>NAMA AKUN</th>
                                    <th>KATEGORI</th>
                                    <th>SALDO</th>
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
              <div class="modal fade" id="EditMasterFinanceAkunModal" tabindex="-1" role="dialog" aria-labelledby="EditMasterFinanceAkunModal" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content dark-sign-up">
                      <div class="modal-body social-profile text-start">
                        <div class="modal-toggle-wrapper">
                          <h3>Edit Master Data</h3>
                          <form class="row g-3">
                          <!-- Kode Akun -->
                          <div class="col-md-12 position-relative"> 
                              <label class="form-label" for="eid">Kode Akun</label>
                              <input class="form-control" id="eid" name="eid" type="text" aria-label="id_finance_akun" required>
                          </div>
                          <!-- Nama Akun -->
                          <div class="col-md-12 position-relative"> 
                              <label class="form-label" for="enama">Nama Akun</label>
                              <input class="form-control" id="enama" name="enama" type="text" aria-label="enama" required>
                          </div>
                          <!-- Kategori -->
                          <div class="col-md-12 position-relative">
                              <label class="form-label" for="ekategori">Kategori</label>
                              <select class="form-select" id="ekategori" name="ekategori" required="">
                                  <option>Kas & Bank</option>
                                  <option>Piutang Usaha</option>
                                  <option>Persediaan</option>
                                  <option>Aktiva Lancar Lainnya</option>
                                  <option>Aktiva Tetap</option>
                                  <option>Kewajiban Lancar</option>
                                  <option>Kewajiban Jangka Panjang</option>
                                  <option>Modal / Ekuitas</option>
                                  <option>Pendapatan</option>
                                  <option>HPP</option>
                                  <option>Beban Operasional</option>
                                  <option>Pendapatan Lainnya</option>
                                  <option>Beban Lainnya</option>
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