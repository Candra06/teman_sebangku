           
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><?= $header?></h4>
                  <?php
                    if(isset($_SESSION['message'])){
                      echo "<div style='margin-top:20px' class='alert alert-".$_SESSION['message'][0]."'>
                        ".$_SESSION['message'][1]."
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>";
                    }
                  ?>
                  <p class="card-description">
                    Basic form elements
                  </p>
                  <form class="forms-sample" action="" method="POST"  enctype="multipart/form-data">                   
                   <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Aksi</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="aksi" value="<?= Input_helper::postOrOr('aksi', $data['aksi'])?>"placeholder="Masukkan nama aksi">
                            
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tipe</label>
                          <div class="col-sm-9">
                          <?php $tipe = Input_helper::postOrOr('tipe', $data['tipe']);?>
                            <select name="tipe" class="form-control" id="tipe" onchange="myFunction()">
                              <option value="">Pilih tipe</option>
                              <option value="1" <?= ($tipe == '1' ? "selected" : '')?>>Register</option>
                              <option value="2" <?= ($tipe == '2' ? "selected" : '')?>>Lengkapi Profil</option>
                              <option value="3" <?= ($tipe == '3' ? "selected" : '')?>>Invite teman</option>
                              <option value="4" <?= ($tipe == '4' ? "selected" : '')?>>Belanja</option>
                            </select>
                            
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Jumlah Poin</label>
                          <div class="col-sm-9">
                            <input type="number" value="<?= Input_helper::postOrOr('jml_poin', $data['jml_poin'])?>" class="form-control" name="jml_poin" placeholder="Masukkan jumlah poin">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6" id="ketentuan" style="display:none;">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Belanja Minimal</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" name="jml_belanja" value="<?= Input_helper::postOrOr('jml_belanja', $data['jml_belanja'])?>" placeholder="Masukkan jumlah minimum belanja">
                          </div>
                        </div>
                      </div>
                    
                    </div>
                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
         <!--  <div class="row">
            
          </div> -->

          <script type="text/javascript">
            function myFunction() {
              var x = document.getElementById("tipe");
              var y = document.getElementById("ketentuan");
              if (x.value == "4") {
                y.style.display = "block";
              } else {
                y.style.display = "none";
              }
            }
          </script>
     
