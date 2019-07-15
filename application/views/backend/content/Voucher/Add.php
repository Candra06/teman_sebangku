        <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><?= $header?></h4>
                  <p class="card-description">
                    Basic form elements
                  </p>
                  <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
                  
                    <div class="form-group">
                      <label for="exampleInputName1">Voucher</label>
                      <input type="text" class="form-control" name="voucher" placeholder="Nama Voucher">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Poin</label>
                      <input type="number" class="form-control" name="poin" placeholder="Jumlah Poin">
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputName1">Status</label>
                        <select class="form-control" name="status">
                          <option value="">Pilih Status</option>
                          <option value="1">Berlaku</option>
                          <option value="0">Tidak Berlaku</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Deskripsi</label>
                      <textarea class="form-control" name="deskripsi" rows="2"></textarea>
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
     
