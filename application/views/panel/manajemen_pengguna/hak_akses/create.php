<!-- BEGIN: Content-->
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body"><!-- fitness target -->
      <!-- Column selectors table -->
      <section id="column-selectors">
      	<div class="row">
      		<div class="col-12">
      			<div class="card">
      				<div class="card-header">
      					<h4 class="card-title"><?php echo $subtitle;?></h4>
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
      				<div class="card-content collapse show">
      					<div class="card-body card-dashboard">
                  <?php echo $this->session->flashdata('notif');?>
                  <form class="" action="<?php echo base_url('panel/users/create_rbac/do_create/');?>" method="post">
                    <div class="form-group">
                      <label class="col-md-2 control-label" for="nama_hak_akses">Nama Hak Akses</label>
                        <div class="col-md-10">
                            <input type="text" id="nama_hak_akses" name="nama_hak_akses" class="form-control border-primary" placeholder="Masukkan nama hak akses" required>
                        </div>
                    </div>
                    <div class="form-group">
                      <?php foreach ($parentModul as $key): ?>
                      <div class="col-md-12">
                        <div class="alert alert-default border-primary">
                          <div class="panel-heading">
                            <div class="checkbox">
                                <label for="checkbox<?php echo $key->id_parent_modul;?>">
                                    <input type="checkbox" id="checkbox<?php echo $key->id_parent_modul;?>" onchange="cek('<?php echo $key->id_parent_modul;?>')" name="parent_modul_akses[]" value="<?php echo $key->id_parent_modul;?>"> <b><?php echo $key->nama_parent_modul;?></b>
                                </label>
                            </div>
                          </div>
                          <div class="panel-body hidden" id='ParentModul<?php echo $key->id_parent_modul;?>'>
                            <?php $modul = $this->ModulModel->get_modul($key->id_parent_modul)?>
                            <?php if ($modul): ?>
                            <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                              <tr>
                                <th>Nama Modul</td>
                                <th>Tipe Modul</td>
                              </tr>
                                <?php foreach ($modul as $row): ?>
                              <tr>
                                <td>
                                  <div class="checkbox">
                                      <label for="checkbox_modul<?php echo $row->id_modul;?>">
                                          <input type="checkbox" id="checkbox_modul<?php echo $row->id_modul;?>" name="modul_akses[]" value="<?php echo $row->id_modul;?>"> <b><?php echo $row->nama_modul;?></b>
                                      </label>
                                  </div>
                                </td>
                                <td>
                                  <?php if($row->type_modul=='C'):?>
                                  Create
                                <?php elseif($row->type_modul=='R'): ?>
                                  Read
                                <?php elseif($row->type_modul=='U'): ?>
                                  Update
                                <?php elseif($row->type_modul=='D'): ?>
                                  delete
                                <?php endif;?>
                                </td>
                              </tr>
                            <?php endforeach;?>
                            </table>
                          <?php endif;?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php endforeach; ?>
                    </div>
                    <div class="form-actions right">
      								<a href="<?php echo base_url('panel/users/rbac_list');?>" class="btn btn-warning mr-1">
      									<i class="ft-x"></i> Cancel
      								</a>
      								<button type="submit" class="btn btn-primary">
      									<i class="fa fa-check-square-o"></i> Save
      								</button>
      							  </div>
                  </form>
      					</div>
      				</div>
      			</div>
      		</div>
      	</div>
      </section>
      <!--/ Column selectors table -->
    </div>
  </div>
</div>
<script type="text/javascript">
  function cek(id){
    if ($('#checkbox'+id).is(':checked')) {
      $('#ParentModul'+id).removeClass('hidden')
    }else {
      $('#ParentModul'+id).addClass('hidden')
    }
  }
</script>
