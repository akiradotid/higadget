        <!-- Begin Content -->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h4>Laporan Keuangan Tahunan</h4>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url()?>">                                       
                        <svg class="stroke-icon">
                          <use href="<?=base_url()?>assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item"> Home</li>
                    <li class="breadcrumb-item"> Laporan Keuangan</li>
                    <li class="breadcrumb-item active"> Laporan Keuangan Tahunan</li>
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
                                        <select class="form-select" id="tahun" name="tahun" required="">
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
              <!-- Data Listing -->
              <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-6">
                            <a href="#" onclick="bukaLaporanKeuanganTahunan('laporan-buku-besar')">
                                <div class="card small-widget"> 
                                    <div class="card-body primary"> <span class="f-light">Laporan semua perubahan dalam transaksi keuangan</span>
                                        <div class="d-flex align-items-end gap-1">
                                            <h4 id="cardtp">Laporan Buku Besar</h4></span>
                                        </div>
                                        <div class="bg-gradient"> 
                                            <svg class="stroke-icon svg-fill">
                                                <use href="<?=base_url()?>assets/svg/icon-sprite.svg#profit"></use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="#" onclick="bukaLaporanKeuanganTahunan('laporan-neraca')">
                                <div class="card small-widget"> 
                                    <div class="card-body primary"> <span class="f-light">Laporan semua perubahan dalam transaksi keuangan</span>
                                        <div class="d-flex align-items-end gap-1">
                                            <h4 id="cardtp">Laporan Neraca</h4></span>
                                        </div>
                                        <div class="bg-gradient"> 
                                            <svg class="stroke-icon svg-fill">
                                                <use href="<?=base_url()?>assets/svg/icon-sprite.svg#profit"></use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="#" onclick="bukaLaporanKeuanganTahunan('laporan-laba-rugi')">
                                <div class="card small-widget"> 
                                    <div class="card-body primary"> <span class="f-light">Laporan semua perubahan dalam transaksi keuangan</span>
                                        <div class="d-flex align-items-end gap-1">
                                            <h4 id="cardtp">Laporan Laba Rugi</h4></span>
                                        </div>
                                        <div class="bg-gradient"> 
                                            <svg class="stroke-icon svg-fill">
                                                <use href="<?=base_url()?>assets/svg/icon-sprite.svg#profit"></use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="#" onclick="bukaLaporanKeuanganTahunan('laporan-arus-kas')">
                                <div class="card small-widget"> 
                                    <div class="card-body primary"> <span class="f-light">Laporan semua perubahan dalam transaksi keuangan</span>
                                        <div class="d-flex align-items-end gap-1">
                                            <h4 id="cardtp">Laporan Arus Kas</h4></span>
                                        </div>
                                        <div class="bg-gradient"> 
                                            <svg class="stroke-icon svg-fill">
                                                <use href="<?=base_url()?>assets/svg/icon-sprite.svg#profit"></use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="#" onclick="bukaLaporanKeuanganTahunan('laporan-inventaris')">
                                <div class="card small-widget"> 
                                    <div class="card-body primary"> <span class="f-light">Laporan semua perubahan dalam transaksi keuangan</span>
                                        <div class="d-flex align-items-end gap-1">
                                            <h4 id="cardtp">Laporan Inventaris (Aktiva Tetap)</h4></span>
                                        </div>
                                        <div class="bg-gradient"> 
                                            <svg class="stroke-icon svg-fill">
                                                <use href="<?=base_url()?>assets/svg/icon-sprite.svg#profit"></use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
              </div>
              <!-- End Listing -->
          </div>
        <!-- Container-fluid Ends-->
        </div>
        <!-- End Content -->