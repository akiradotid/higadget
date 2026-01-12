        <!-- Begin Content -->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h4>Data Pendapatan</h4>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url()?>">                                       
                        <svg class="stroke-icon">
                          <use href="<?=base_url()?>assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item"> Home</li>
                    <li class="breadcrumb-item"> Finance</li>
                    <li class="breadcrumb-item active"> Pendapatan</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
              <!-- Form Tambah Pendapatan -->
              <div class="row">
                  <!-- Form Pendapatan -->
                  <div class="col-sm-12">
                      <div class="card">
                          <div class="card-body">
                              <form class="row g-2 needs-validation" novalidate="" method="post" action="<?=base_url()?>pendapatan/simpan-data">
                                  <!-- Tanggal Transaksi -->
                                  <div class="col-md-4 position-relative"> 
                                      <label class="form-label" for="tgl_transaksi">Tanggal Transaksi</label>
                                      <input class="form-control" id="tgl_transaksi" name="tgl_transaksi" type="date" aria-label="tgl_transaksi" required value="<?= date('Y-m-d') ?>">
                                  </div>
                                  <!-- Kategori -->
                                  <div class="col-md-4 position-relative">
                                      <label class="form-label" for="kategori">Kategori</label>
                                      <select class="form-select" id="kategori" name="kategori" required="">
                                          <option selected="" disabled="" value="0">Pilih Kategori</option>
                                      </select>
                                  </div>
                                  <!-- Nominal -->
                                  <div class="col-md-4 position-relative"> 
                                      <label class="form-label has-validation" for="nominal">Nominal</label>
                                      <input class="form-control" id="nominal" name="nominal" type="number" aria-label="nominal" required>
                                  </div>
                                  <!-- Deskripsi -->
                                  <div class="col-md-12 position-relative"> 
                                        <label class="form-label" for="catatan">Catatan</label>
                                        <textarea class="form-control" style="resize: none;" name="catatan" id="catatan" placeholder="" rows="3"></textarea>
                                    </div>
                                  <!-- Submit -->
                                  <div class="col-md-12 position-relative">
                                      <button class="btn btn-primary" id="tambah" type="submit">Tambah Pendapatan</button>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- End Form Tambah Pendapatan-->
              <!-- Data Listing Pendapatan -->
              <div class="row">
                  <div class="col-sm-12">
                      <div class="card">
                        <div class="card-header pb-0 card-no-border">
                          <h4>List Data Pendapatan</h4>
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="display" id="table-finance-pendapatan">
                              <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>TANGGAL</th>
                                    <th>KATEGORI</th>
                                    <th>CATATAN</th>
                                    <th>NOMINAL</th>
                                    <th>INPUT AT</th>
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
              <!-- End Listing Pendapatan -->
              <!-- Modal Edit Pendapatan -->
              <div class="modal fade" id="EditFinancePendapatanModal" tabindex="-1" role="dialog" aria-labelledby="EditFinancePendapatanModal" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content dark-sign-up">
                      <div class="modal-body social-profile text-start">
                        <div class="modal-toggle-wrapper">
                          <h3>Edit Pendapatan</h3>
                          <form class="row g-3">
                            <input id="eid" name="eid" type="hidden" aria-label="eid">
                            <!-- Tanggal Transaksi -->
                            <div class="col-md-4 position-relative"> 
                                <label class="form-label" for="etgl_transaksi">Tanggal Transaksi</label>
                                <input class="form-control" id="etgl_transaksi" name="etgl_transaksi" type="date" aria-label="etgl_transaksi" required value="<?= date('Y-m-d') ?>">
                            </div>
                            <!-- Kategori -->
                            <div class="col-md-4 position-relative">
                                <label class="form-label" for="ekategori">Kategori</label>
                                <select class="form-select" id="ekategori" name="ekategori" required="">
                                    <option selected="" disabled="" value="0">Pilih Kategori</option>
                                </select>
                            </div>
                            <!-- Nominal -->
                            <div class="col-md-4 position-relative"> 
                                <label class="form-label" for="enominal">Nominal</label>
                                <input class="form-control" id="enominal" name="enominal" type="number" aria-label="enominal" required>
                            </div>
                            <!-- Deskripsi -->
                            <div class="col-md-12 position-relative"> 
                                <label class="form-label" for="ecatatan">Catatan</label>
                                <textarea class="form-control" style="resize: none;" name="ecatatan" id="ecatatan" placeholder="" rows="3"></textarea>
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