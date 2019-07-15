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
                  <a href="<?= base_url('Akun/Add')?>">
                    <button class="btn btn-success btn-sm">Tambah Data
                      <i class="mdi mdi-plus"></i>
                    </button>
                  </a>
                  <p class="card-description">
                    <!-- Basic form elements -->
                  </p>
                    <div class="row">
                      <div class="table-responsive ">
                        <table class="table table-striped table-bordered data">
                          <thead>
                            <tr>    
                              <th>Kode</th>
                              <th>Nama</th>
                              <th>Email</th>
                              <th>Status</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php foreach($data as $dt) {?>
                            <tr>
                              <td><?= $dt['kd_akun'];?></td>        
                              <td><?= $dt['nama'];?></td>
                              <td><?= $dt['username'];?></td>
                              <td><?php if($dt['status']==1){echo 'Aktif';}elseif($dt['status']==0){echo 'Tidak Aktif';}?></td>
                              <td>
                                <button class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i>Edit</button>
                                
                              </td>
                            </tr>
                          <?php }?>
                          </tbody>
                        </table>
                        
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
         <!--  <div class="row">
            
          </div> -->