           
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
                  <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Promo</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="promo" value="<?= Input_helper::postOrOr('promo', $data['judul_promo'])?>" id="exampleInputName1" placeholder="Judul Promo">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Foto</label>
                          <div class="col-sm-9">
                          <input type="file" class="form-control" name="foto_promo" id="exampleInputName1" placeholder="Foto Tampak Depan">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tanggal berlaku</label>
                          <div class="col-sm-4">
                            <input type="date" name="mulai" class="form-control" value="<?= Input_helper::postOrOr('mulai', $data['tgl_mulai'])?>" placeholder="Jam Buka">
                          </div>
                          <div class="col-sm-1 col-form-label">
                            <label>S.d</label>
                          </div>
                          <div class="col-sm-4">
                            <input type="date" name="akhir" class="form-control" value="<?= Input_helper::postOrOr('akhir', $data['tgl)akhir'])?>" placeholder="Jam Buka">
                          </div>
                        </div>
                      </div>
                       
                      <!-- <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Jam Tutup</label>
                          <div class="col-sm-9">
                            <input type="time" class="form-control" name="closed" value="<?= Input_helper::postOrOr('closed', $data['closed'])?>" id="exampleInputCity1" placeholder="Jam Tutup">
                          </div>
                        </div>
                      </div> -->
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">poin</label>
                          <div class="col-sm-9">
                          <input type="number" name="poin" class="form-control" value="<?= Input_helper::postOrOr('poin', $data['poin'])?>" placeholder="Poin">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Syarat dan Ketentuan</label>
                          <div class="col-sm-12">
                            
                            <textarea class="form-control" cols="100" id="editor3" name="sk" rows="4" data-sample-short><?= Input_helper::postOrOr('sk', $data['syarat_ketentuan'])?></textarea>
                            <script>
                              // We need to turn off the automatic editor creation first.
                              CKEDITOR.disableAutoInline = true;

                              CKEDITOR.replace('editor3', {
                                extraPlugins: 'sourcedialog',
                                removePlugins: 'sourcearea'
                              });
                            </script>
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
     
