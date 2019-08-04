           
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
                  <a href="<?= base_url('Promo/Add')?>">
                    <button class="btn btn-success btn-sm">Tambah Data
                      <i class="mdi mdi-plus"></i>
                    </button>
                  </a>
                  <p class="card-description">
                    <!-- Basic form elements -->
                  </p>
                    <div class="row">
                      <div class=" table-responsive">
                        <table class="table table-striped table-bordered data">
                          <thead>
                            <tr>    
                              <th>Kode</th>
                              <th>Promo</th>
                              <th>Tanggal Berlaku</th>
                              <th>Status</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php foreach($data as $dt) {?>
                            <tr>
                              <td><?= $dt['kd_promo'];?></td>        
                              <td><?= $dt['judul_promo'];?></td>
                              <td><?= $dt['tgl_mulai'];?> s/d <?= $dt['tgl_akhir'];?></td>
                              <td><?php if($dt['status']==1){echo 'Ditampilkan';}elseif($dt['status']==0){echo 'Tidak Ditampilkan';}?></td>
                              <td>
                                <a href="<?= base_url().$this->uri->segment(1)."/Edit/$dt[kd_promo]"?>"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i>Edit</button></a>
                                
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
     
