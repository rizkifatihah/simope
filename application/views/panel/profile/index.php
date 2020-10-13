<?php foreach ($profile as $key): ?>

<!-- BEGIN: Content-->
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">

      <div class="col-md-12">
  			<div class="card">
  				<div class="card-header">
  					<h4 class="card-title" id="hidden-label-colored-controls">User Profile</h4>
  					<a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
  					<div class="heading-elements">
  						<ul class="list-inline mb-0">
  							<li><a data-action="collapse"><i class="ft-minus"></i></a></li>
  							<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
  							<li><a data-action="expand"><i class="ft-maximize"></i></a></li>
  							<li><a data-action="close"><i class="ft-x"></i></a></li>
  						</ul>
  					</div>
  				</div>
  				<div class="card-content collpase show">
  					<div class="card-body">
            <?php echo $this->session->flashdata('notif');?>
            <form class="form" action="<?php echo base_url('panel/profile/edit_profile/');?>" method="POST" enctype="multipart/form-data">
              <div class="row float-left">
              <div class="col-md-12 mb-2">
                <div class="col-md-12">
                    <div class="card">
                        <div class="text-center">
                            <div class="card-body">
                              <?php if ($key->fotopengguna==''): ?>
                                  <img src="<?php echo base_url('assets/backend/');?>app-assets/images/user/avatar.jpg" class="rounded-circle  height-150" alt="Card image" id="gambar">
                                <?php else: ?>
                                  <img src="<?php echo base_url().$key->fotopengguna;?>" class="rounded-circle  height-150" alt="Card image" id="gambar">
                              <?php endif; ?>
                            </div>
                            <div class="card-body">
                              <font color="red">Maksimal 10 MB</font>
                              <input type="file" class="form-control border-primary" name="fotopengguna" id="fotopengguna" accept="image/*">
                              <br>
          										<input type="text" class="form-control border-primary" placeholder="Nama Lengkap" name="nama_lengkap" value="<?php echo $key->nama_lengkap;?>">
                            </div>
                            <script type="text/javascript">
                            function readURL(input) {
                              if (input.files && input.files[0]) {
                                var reader = new FileReader();
                                reader.onload = function(e) {
                                  $('#gambar').attr('src', e.target.result);
                                }
                                reader.readAsDataURL(input.files[0]);
                              }
                            }
                            $("#fotopengguna").change(function() {
                              readURL(this);
                            });
                            </script>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="row float-right">
              <div class="col-md-12 mb-2 ">
  							<div class="form-body">
  								<h4 class="form-section"> About User</h4>
  								<div class="row">
  									<div class="form-group col-md-12 mb-2">
  										<label class="sr-only" for="userinput1">NIP</label>
  										<input type="text" class="form-control border-primary" placeholder="NIP" name="nip" value="<?php echo $key->nip;?>" disabled>
  									</div>
  									
  								</div>
  								<div class="row">
  									<div class="form-group col-md-6 mb-2">
  										<label class="sr-only" for="userinput3">Password</label>
  										<input type="password" class="form-control border-primary" placeholder="Password" name="password">
  									</div>
  									<div class="form-group col-md-6 mb-2">
  										<label class="sr-only" for="userinput4">Email</label>
  										<input type="text" class="form-control border-primary" placeholder="Email" value="<?php echo $key->email;?>" name="email">
  									</div>
  								</div>

  								<h4 class="form-section"> Information & Bio</h4>
                  <div class="row">
                    
                  </div>
  								<div class="row">
  									<div class="form-group col-12 mb-2">
  										<label class="sr-only" for="userinput5">No telp</label>
  										<input class="form-control border-primary" type="text" placeholder="No Telp" name="no_telp" value="<?php echo $key->no_telp;?>">
  									</div>
  								</div>
  								<div class="row">
  									<div class="form-group col-12 mb-2">
  										<label class="sr-only" for="userinput6">Tgl Lahir</label>
  										<input class="form-control border-primary" type="date" placeholder="Tgl Lahir" name="tgl_lahir" value="<?php echo $key->tgl_lahir;?>">
  									</div>
  								</div>
                  <div class="row">
                    <div class="form-group col-12 mb-2">
                      <label class="sr-only" for="userinput6">Alamat</label>
                      <input class="form-control border-primary" type="text" placeholder="Masukkan Alamat" name="alamat" value="<?php echo $key->alamat;?>">
                    </div>
                  </div>
  								<div class="row">
  									<div class="form-group col-12 mb-2">
  										<label class="sr-only">Jenkel</label>
                      <select class="form-control border-primary" name="jenkel" id="jenkel" disabled>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                      </select>
  									</div>
  								</div>
  							</div>
<script type="text/javascript">
  $('#jenkel').val('<?php echo $key->jenkel;?>')
</script>
  							<div class="form-actions right">
  								<button type="button" class="btn btn-warning mr-1">
  									<i class="ft-x"></i> Cancel
  								</button>
  								<button type="submit" class="btn btn-primary">
  									<i class="fa fa-check-square-o"></i> Save
  								</button>
  							  </div>
                </div>
  						</form>

              </div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
    </div>

  </div>
</div>
<!-- END: Content-->
<?php endforeach; ?>
