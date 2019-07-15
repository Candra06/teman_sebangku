      <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
              <form action=""  method="POST">
                <?php
                    if (isset($_SESSION['message'])) {
                        echo "<div style='margin-top:20px' class='alert alert-".$_SESSION['message'][0]."'>
                             ".$_SESSION['message'][1]."
                             </div>";
                    }
                ?> 
                <div class="form-group">
                  <label class="label">Username</label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="username" placeholder="Username">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="label">Password</label>
                  <div class="input-group">
                    <input type="password" name="password" class="form-control" placeholder="*********">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary submit-btn btn-block">Login</button>
                </div>               
                
              </form>
            </div>
            
            <p class="footer-text text-center">copyright © 2019 Teman Sebangku. All rights reserved.</p>
          </div>
        </div>