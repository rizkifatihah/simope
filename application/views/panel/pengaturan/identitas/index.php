<?php foreach ($identitas as $key): ?>

<!-- BEGIN: Content-->
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">

      <div class="col-md-12">
  			<div class="card">
  				<div class="card-header">
  					<h4 class="card-title" id="hidden-label-colored-controls">Identitas Aplikasi</h4>
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
            <form class="form" action="<?php echo base_url('panel/settings/apps_info/do_update');?>" method="POST" enctype="multipart/form-data">
              <div class="row float-left">
              <div class="col-md-12 mb-2">
                <div class="col-md-12">
                    <div class="card">
                        <div class="text-center">
                            <div class="card-body">
                              <?php if ($key->logo==''): ?>
                                  <img src="<?php echo base_url('assets/backend/');?>app-assets/images/user/avatar.jpg" class="rounded-circle  height-150" alt="Card image" id="gambar">
                                <?php else: ?>
                                  <img src="<?php echo base_url().$key->logo;?>" class="rounded-circle  height-150" alt="Card image" id="logo">
                              <?php endif; ?>
                            </div>
                            <div class="card-body">
                              <font color="red">Maksimal 10 MB</font>
                              <input type="file" class="form-control border-primary" name="logo" id="apps_logo" accept="image/*">
                            </div>
                            <script type="text/javascript">
                            function readURL(input) {
                              if (input.files && input.files[0]) {
                                var reader = new FileReader();
                                reader.onload = function(e) {
                                  $('#logo').attr('src', e.target.result);
                                }
                                reader.readAsDataURL(input.files[0]);
                              }
                            }
                            $("#apps_logo").change(function() {
                              readURL(this);
                            });
                            </script>
                        </div>
                    </div>
                    <div class="card">
                        <div class="text-center">
                            <div class="card-body">
                              <?php if ($key->apps_icon==''): ?>
                                  <img src="<?php echo base_url('assets/backend/');?>app-assets/images/user/avatar.jpg" class="rounded-circle  height-150" alt="Card image" id="gambar">
                                <?php else: ?>
                                  <img src="<?php echo base_url().$key->apps_icon;?>" class="rounded-circle  height-150" alt="Card image" id="icon">
                              <?php endif; ?>
                            </div>
                            <div class="card-body">
                              <font color="red">Maksimal 10 MB</font>
                              <input type="file" class="form-control border-primary" name="apps_icon" id="apps_icon" accept="image/*">
                            </div>
                            <script type="text/javascript">
                            function readURL(input) {
                              if (input.files && input.files[0]) {
                                var reader = new FileReader();
                                reader.onload = function(e) {
                                  $('#icon').attr('src', e.target.result);
                                }
                                reader.readAsDataURL(input.files[0]);
                              }
                            }
                            $("#apps_icon").change(function() {
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
  								<div class="row">
  									<div class="form-group col-md-6 mb-2">
  										<label class="sr-only" for="userinput1">APPS NAME</label>
  										<input type="text" class="form-control border-primary" placeholder="APPS NAME" name="apps_name" value="<?php echo $key->apps_name;?>">
  									</div>
  									<div class="form-group col-md-6 mb-2">
  										<label class="sr-only" for="userinput2">APPS VERSION</label>
  										<input type="text" class="form-control border-primary" placeholder="APPS VERSION" name="apps_version" value="<?php echo $key->apps_version;?>">
  									</div>
  								</div>
  								<div class="row">
  									<div class="form-group col-md-6 mb-2">
  										<label class="sr-only" for="userinput3">APPS CODE</label>
  										<input type="text" class="form-control border-primary" placeholder="APPS CODE" name="apps_code" value="<?php echo $key->apps_code;?>">
  									</div>
  									<div class="form-group col-md-6 mb-2">
  										<label class="sr-only" for="userinput4">AGENCY</label>
  										<input type="text" class="form-control border-primary" placeholder="AGENCY" value="<?php echo $key->agency;?>" name="agency">
  									</div>
  								</div>

                  <div class="row">
                    <div class="form-group col-12 mb-2">
                      <label class="sr-only" for="userinput5">ADDRESS</label>
                      <input class="form-control border-primary" type="text" placeholder="ADDRESS" value="<?php echo $key->address;?>">
                    </div>
                  </div>
  								<div class="row">
  									<div class="form-group col-12 mb-2">
  										<label class="sr-only" for="userinput5">EMail</label>
  										<input class="form-control border-primary" type="text" placeholder="EMail" name="email" value="<?php echo $key->email;?>">
  									</div>
  								</div>
  								<div class="row">
  									<div class="form-group col-12 mb-2">
  										<label class="sr-only" for="userinput6">Telephon</label>
  										<input class="form-control border-primary" type="text" placeholder="Telephon" name="Telephon" value="<?php echo $key->telephon;?>">
  									</div>
  								</div>
                  <div class="row">
                    <div class="form-group col-12 mb-2">
                      <label class="sr-only" for="userinput6">FAX</label>
                      <input class="form-control border-primary" type="text" placeholder="FAX" name="fax" value="<?php echo $key->fax;?>">
                    </div>
                  </div>
  								<div class="row">
                    <div class="form-group col-12 mb-2">
                      <label class="sr-only" for="userinput6">FOOTER</label>
                      <textarea class="form-control border-primary" placeholder="FOOTER" name="footer"><?php echo $key->footer;?></textarea>
                    </div>
  								</div>
  							</div>
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
