           
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
                  <a href="<?= base_url('Pelanggan/Add')?>">
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
                              <th>Nama </th>
                              <th>No Hp</th>
                              <th>Email</th>
                              <th>Kelamin</th>
                              <th>Tanggal Lahir</th>
                              <th>Domisili</th>
                              <th>Poin</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php foreach($data as $dt) {?>
                            <tr>     
                              <td><?= $dt['nama'];?></td>
                              <td><?= $dt['no_hp'];?></td>
                              <td><?= $dt['email'];?></td>  
                              <td><?= $dt['gender'];?></td>  
                              <td><?= $dt['tgl_lahir'];?></td>  
                              <td><?= $dt['domisili'];?></td>  
                              <td><?= $dt['poin'];?></td> 
                              <td>
                              <a href="<?= base_url().$this->uri->segment(1)."/Edit/$dt[kd_pelanggan]"?>"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i>Edit</button></a>
                                
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
     
