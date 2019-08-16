           
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
                          <label class="col-sm-3 col-form-label">Nama Menu</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="menu" value="<?= Input_helper::postOrOr('nama', $data['nama_outlet'])?>" id="exampleInputName1" placeholder="Nama Menu">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Foto</label>
                          <div class="col-sm-9">
                          <input type="file" class="form-control" name="foto_menu" id="exampleInputName1" placeholder="Foto Tampak Depan">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Harga</label>
                          <div class="col-sm-9">
                            <input type="number" name="harga" class="form-control" value="<?= Input_helper::postOrOr('harga', $data['harga'])?>" placeholder="Harga">
                          </div>
                        </div>
                      </div>
                       <!--  <div class="form-group">
                          <label>File upload</label>
                          <input type="file" name="img[]" class="file-upload-default">
                          <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                            <span class="input-group-append">
                              <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                            </span>
                          </div>
                        </div> -->
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Jenis</label>
                          <div class="col-sm-9">
                            <!-- <input type="time" class="form-control" name="closed" value="<?= Input_helper::postOrOr('closed', $data['closed'])?>" id="exampleInputCity1" placeholder="Jam Tutup"> -->
                            <select class="form-control" name="jenis">
                              <option value="">Pilih Jenis </option>
                              <option value="1">Makanan</option>
                              <option value="2">Minuman</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">deskripsi</label>
                          <div class="col-sm-9">
                            <textarea class="form-control" name="deskripsi" id="exampleTextarea1" rows="2" placeholder="Deskripsi"><?= Input_helper::postOrOr('alamat', $data['alamat'])?></textarea>
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
     
