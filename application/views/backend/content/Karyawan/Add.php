           
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
                          <label class="col-sm-3 col-form-label">Nama Karyawan</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama" id="exampleInputName1" value="<?= Input_helper::postOrOr('nama', $data['nama'])?>" placeholder="Nama Karyawan">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Outlet</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="outlet">
                              <option value="">Pilih Outlet</option>
                              <?php 
                              $out = Input_helper::postOrOr('outlet', $data['kd_outlet']);
                              foreach($outlet as $ot)
                              {?>
                                <option value="<?= $ot['kd_outlet'];?>" <?= ($out == $ot['kd_outlet'] ? "selected" : '')?>><?= $ot['nama_outlet'];?></option>
                              <?php }?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">No HP</label>
                          <div class="col-sm-9">
                            <input type="text" name="no_hp" class="form-control" value="<?= Input_helper::postOrOr('no_hp', $data['no_hp'])?>" placeholder="Nomor HP/WA">
                          </div>
                        </div>
                      </div>
                        
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Jabatan</label>
                          <div class="col-sm-9">
                          <?php $jabatan = Input_helper::postOrOr('jabatan', $data['jabatan']);?>
                            <select class="form-control" name="jabatan">
                              <option value="">Pilih Jabatan</option>
                              <option value="2" <?= ($jabatan == '2' ? "selected" : '')?>>Manager</option>
                              <option value="3" <?= ($jabatan == '3' ? "selected" : '')?>>Karyawan</option>
                              <option value="4" <?= ($jabatan == '4' ? "selected" : '')?>>Kasir</option>
                            </select>
                            
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Username</label>
                          <div class="col-sm-9">
                            <input type="text" name="username" class="form-control" value="<?= Input_helper::postOrOr('username', $user['username'])?>" placeholder="Email/Username">
                          </div>
                        </div>
                      </div>
                        
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Password</label>
                          <div class="col-sm-9">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Alamat</label>
                          <div class="col-sm-9">
                            <textarea class="form-control" name="alamat" id="exampleTextarea1" value="" rows="2" placeholder="Alamat"><?= Input_helper::postOrOr('alamat', $data['alamat'])?></textarea>
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
     
