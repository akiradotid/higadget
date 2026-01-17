        <!-- Begin Content -->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h4>Kas</h4>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url()?>">                                       
                        <svg class="stroke-icon">
                          <use href="<?=base_url()?>assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item"> Home</li>
                    <li class="breadcrumb-item"> Finance</li>
                    <li class="breadcrumb-item active"> Kas</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <!-- Form Tambah -->
              <div class="row">
                  <!-- Form -->
                  <div class="col-sm-12">
                      <div class="card">
                          <div class="card-body">
                                <div class="row g-2">
                                    <!-- Tahun -->
                                    <div class="col-md-4 position-relative"> 
                                        <label class="form-label" for="tahun">Tahun</label>
                                        <select class="form-select" id="tahun" name="tahun" onchange="reload()">
                                            <option selected="" disabled="" value="0">Pilih Tahun</option>
                                            <?php 
                                                $year = date('Y');
                                                for($i=$year; $i>=2023; $i--){
                                                    if($year == $i){
                                                        $selected = "selected";
                                                    } else {
                                                        $selected = "";
                                                    }
                                                    echo "<option value='".$i."' $selected>".$i."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- End Form Tambah-->
              <!-- Data Listing Kas -->
              <div class="row">
                  <div class="col-sm-12">
                      <div class="card">
                        <div class="card-header pb-0 card-no-border">
                          <h4>List Data Kas</h4>
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="display" id="table-buku-kas">
                              <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Bulan</th>
                                    <th>Tahun</th>
                                    <th>Kas Pembukaan</th>
                                    <th>Kas Penutupan</th>
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
              <!-- End Listing Kas -->
              <!-- Modal Edit Kas -->
              <div class="modal fade" id="EditBukuKasModal" tabindex="-1" role="dialog" aria-labelledby="EditBukuKasModal" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content dark-sign-up">
                      <div class="modal-body social-profile text-start">
                        <div class="modal-toggle-wrapper">
                          <h3>Edit Kas</h3>
                          <form class="row g-3">
                            <!-- Bulan -->
                            <div class="col-md-6 position-relative"> 
                                <label class="form-label" for="sbulan">Bulan</label>
                                <select class="form-select" id="sbulan" disabled>
                                    <?php 
                                        $month = date('m');
                                    ?>
                                    <option selected="" disabled="" value="0">Pilih Bulan</option>
                                    <option value="01" <?php if($month == '01') echo "selected"; ?>>Januari</option>
                                    <option value="02" <?php if($month == '02') echo "selected"; ?>>Februari</option>
                                    <option value="03" <?php if($month == '03') echo "selected"; ?>>Maret</option>
                                    <option value="04" <?php if($month == '04') echo "selected"; ?>>April</option>
                                    <option value="05" <?php if($month == '05') echo "selected"; ?>>Mei</option>
                                    <option value="06" <?php if($month == '06') echo "selected"; ?>>Juni</option>
                                    <option value="07" <?php if($month == '07') echo "selected"; ?>>Juli</option>
                                    <option value="08" <?php if($month == '08') echo "selected"; ?>>Agustus</option>
                                    <option value="09" <?php if($month == '09') echo "selected"; ?>>September</option>
                                    <option value="10" <?php if($month == '10') echo "selected"; ?>>Oktober</option>
                                    <option value="11" <?php if($month == '11') echo "selected"; ?>>November</option>
                                    <option value="12" <?php if($month == '12') echo "selected"; ?>>Desember</option>
                                </select>

                                <input type="hidden" id="ebulan" name="ebulan">
                            </div>
                            <!-- Tahun -->
                            <div class="col-md-6 position-relative"> 
                                <label class="form-label" for="stahun">Tahun</label>
                                <select class="form-select" id="stahun" disabled>
                                    <option selected="" disabled="" value="0">Pilih Tahun</option>
                                    <?php 
                                        $year = date('Y');
                                        for($i=$year; $i>=2023; $i--){
                                            if($year == $i){
                                                $selected = "selected";
                                            } else {
                                                $selected = "";
                                            }
                                            echo "<option value='".$i."' $selected>".$i."</option>";
                                        }
                                    ?>
                                </select>

                                <input type="hidden" id="etahun" name="etahun">
                            </div>
                            <!-- Awal -->
                            <div class="col-md-6 position-relative"> 
                                <label class="form-label" for="esaldo_awal">Kas Pembukaan</label>
                                <input class="form-control" id="esaldo_awal" name="esaldo_awal" type="number" aria-label="esaldo_awal" required>
                            </div>
                            <!-- Akhir -->
                            <div class="col-md-6 position-relative"> 
                                <label class="form-label" for="esaldo_akhir">Kas Penutupan</label>
                                <input class="form-control" id="esaldo_akhir" name="esaldo_akhir" type="number" aria-label="esaldo_akhir" required>
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