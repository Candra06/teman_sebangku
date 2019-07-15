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
                  <form class="forms-sample" action="" method="POST">
                    <div class="form-group">
                      <label for="exampleInputName1">Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Username</label>
                      <input type="text" class="form-control" name="username" placeholder="Username/Email">
                    </div>                    
                    <div class="form-group">
                      <label for="exampleInputEmail3">Password</label>
                      <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>  
                    <div class="form-group">
                      <label for="exampleInputEmail3">Status</label>
                        <select class="form-control" name="status">
                          <option value="">Pilih Status</option>
                          <option value="1">Aktif</option>
                          <option value="0">Tidak Aktif</option>
                        </select>
                    </div>  
                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>  
            
        </div>
         <!--  <div class="row">
            
          </div> -->
     
