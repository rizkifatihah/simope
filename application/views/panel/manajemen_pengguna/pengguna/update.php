
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
            <form class="form" action="<?php echo base_url('panel/users/update/do_update/'.my_simple_crypt($users->id_pengguna,'e'));?>" method="POST" enctype="multipart/form-data">
              <div class="row float-left">
              <div class="col-md-12 mb-2">
                <div class="col-md-12">
                    <div class="card">
                        <div class="text-center">
                            <div class="card-body">
                              <?php if ($users->fotopengguna==''): ?>
                                  <img src="<?php echo base_url('assets/backend/');?>app-assets/images/user/avatar.jpg" class="rounded-circle height-150" alt="Card image" id="gambar">
                                <?php else: ?>
                                  <img src="<?php echo base_url().$users->fotopengguna;?>" class="rounded-circle height-150" alt="Card image" id="gambar">
                              <?php endif; ?>
                            </div>
                            <div class="card-body">
                              <font color="red">Maksimal 10 MB</font>
                              <input type="file" class="form-control border-primary" name="fotopengguna" id="fotopengguna" accept="image/*">
                              <br>
          										<input type="text" class="form-control border-primary" placeholder="Nama Lengkap" name="nama_lengkap" id="nama_lengkap">
                              <br>
                              <label for="">Hak akses</label>
                              <select class="form-control border-primary" name="nama_hak_akses" id="nama_hak_akses" required>
                                <option value="">.:Pilih Hak Akses:.</option>
                                <?php foreach ($hak_akses as $key): ?>
                                  <?php if ($key->nama_hak_akses!='superadmin'): ?>
                                    <option value="<?php echo $key->nama_hak_akses;?>"><?php echo $key->nama_hak_akses;?></option>
                                  <?php endif; ?>
                                <?php endforeach; ?>
                              </select>
                              
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
              <div class="col-md-12 mb-2">
  							<div class="form-body">
  								<h4 class="form-section"> About User</h4>
  								<div class="row">
  									<div class="form-group col-md-12 mb-2">
  										<label class="sr-only" for="userinput2">Username</label>
  										<input type="text" class="form-control border-primary" placeholder="Username" name="username" id="username" required>
  									</div>
  								</div>
  								<div class="row">
  									<div class="form-group col-md-6 mb-2">
  										<label class="sr-only" for="userinput3">Password</label>
  										<input type="password" class="form-control border-primary" placeholder="Password" name="password">
  									</div>
  									<div class="form-group col-md-6 mb-2">
  										<label class="sr-only" for="userinput4">Email</label>
  										<input type="email" class="form-control border-primary" placeholder="Email" name="email" id="email" required>
  									</div>
  								</div>

  								<h4 class="form-section"> Information & Bio</h4>
                  <div class="row">
  									<div class="form-group col-12 mb-2">
  										<label class="sr-only" for="userinput5">No telp</label>
  										<input class="form-control border-primary" type="text" placeholder="No Telp" name="no_telp" id="no_telp" required>
  									</div>
  								</div>
  								<div class="row">
  									<div class="form-group col-12 mb-2">
  										<label class="sr-only" for="userinput6">Tgl Lahir</label>
  										<input class="form-control border-primary" type="date" placeholder="Tgl Lahir" name="tgl_lahir" id="tgl_lahir">
  									</div>
  								</div>
                  <div class="row">
                    <div class="form-group col-12 mb-2">
                      <label class="sr-only" for="userinput6">Alamat</label>
                      <input class="form-control border-primary" type="text" placeholder="Masukkan Alamat" name="alamat" id="alamat">
                    </div>
                  </div>
  								<div class="row">
  									<div class="form-group col-12 mb-2">
  										<label class="sr-only">Jenkel</label>
                      <select class="form-control border-primary" name="jenkel" id="jenkel" required>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                      </select>
  									</div>
  								</div>
  							</div>
  							<div class="form-actions right">
  								<a href="<?php echo base_url('panel/users/list');?>" class="btn btn-warning mr-1">
  									<i class="ft-x"></i> Cancel
  								</a>
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
<script type="text/javascript">
  $('#nama_lengkap').val('<?php echo $users->nama_lengkap;?>');
  $('#username').val('<?php echo $users->username;?>');
  $('#nama_hak_akses').val('<?php echo $users->hak_akses;?>');
  $('#email').val('<?php echo $users->email;?>');
  $('#no_telp').val('<?php echo $users->no_telp;?>');
  $('#tgl_lahir').val('<?php echo $users->tgl_lahir;?>');
  $('#jenkel').val('<?php echo $users->jenkel;?>');
  $('#alamat').val('<?php echo $users->alamat;?>');
</script>
