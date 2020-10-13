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
                  <form class="" action="<?php echo base_url('panel/task/createTask/do_create/'.$id.'')?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label class="col-md-2 control-label" for="nama_detail_task">Nama Pekerjaan</label>
                        <div class="col-md-10">
                            <input type="text" id="nama_detail_task" name="nama_detail_task" class="form-control border-primary" placeholder="Masukkan nama pekerjaan" required>
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="col-md-2 control-label" for="file_detail_task">File Pekerjaan</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control" name="file_detail_task" id="file_detail_task" required>
                        </div>
                    </div>
                    <div class="form-actions right">
      								<a href="<?php echo base_url('panel/task/detailTask/'.$id.'');?>" class="btn btn-warning mr-1">
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
