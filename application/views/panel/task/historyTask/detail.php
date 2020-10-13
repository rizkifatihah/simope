<?php foreach($task as $key):?>
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
                        <form class="" action="" method="post">
                            <div class="form-group">
                            <label class="col-md-2 control-label" for="nama_pekerjaan">Nama Pekerjaan</label>
                                <div class="col-md-10">
                                    <input type="text" id="nama_pekerjaan" name="nama_pekerjaan" class="form-control border-primary" value="<?php echo $key->nama_pekerjaan?>" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                            <label class="col-md-2 control-label" for="nama_pekerjaan">Kategori Kerja</label>
                            <div class="col-md-10">
                              <select class="form-control border-primary" name="kategori_kerja" readonly>
                                <option value="<?php echo $key->kategori_kerja?>"><?php echo $key->kategori_kerja?></option>
                                <option value="KPI">KPI</option>
                                <option value="PKM">PKM</option>
                                <option value="Unschedule">Unschedule</option>
                              </select>
                            </div>
                            </div>

                            <div class="form-group">
                            <label class="col-md-2 control-label" for="detail_pekerjaan">Detail Pekerjaan</label>
                                <div class="col-md-10">
                                    <textarea name="detail_pekerjaan" class="form-control border-primary" id='detail_pekerjaan' readonly><?php echo $key->detail_pekerjaan?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                            <label class="col-md-2 control-label" for="start_date">Waktu Mulai</label>
                                <div class="col-md-10">
                                    <input type="date" id="start_date" name="start_date" class="form-control border-primary" value="<?php echo $key->start_date?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                            <label class="col-md-2 control-label" for="end_date">Waktu Selesai</label>
                                <div class="col-md-10">
                                    <input type="date" id="end_date" name="end_date" class="form-control border-primary" value="<?php echo $key->end_date?>" readonly>
                                </div>
                                
                            </div>

                            <div class="form-group">
                            <label class="col-md-4 control-label" for="keterangan_pekerjaan">Keterangan Pekerjaan</label>
                                <div class="col-md-10">
                                    <textarea name="keterangan_pekerjaan" class="form-control border-primary" readonly><?php echo $key->keterangan_pekerjaan?></textarea>
                                </div>
                            </div>
                            
                            <div class="form-actions right">
                                <a href="<?php echo base_url('panel/task/historyTask');?>" class="btn btn-warning mr-1">
                                    <i class="ft-x"></i> Cancel
                                </a>
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
<?php endforeach;?>