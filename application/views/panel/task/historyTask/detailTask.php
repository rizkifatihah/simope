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
      					<h4 class="card-title"><?php echo $subtitle?></h4>
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
                        <a href="<?php echo base_url('panel/task/createTask/');?><?php echo $id?>" class="btn btn-info btn-md pull-right"><i class="fa fa-plus"></i> Tambah Berkas Pekerjaan</a>
      						<div class="table-responsive">
                              <table class="table table-striped table-bordered dataex-html5-selectors">
      							<thead>
      								<tr>
      									<th>Nama Pekerjaan</th>
      									<th>File</th>
                                        <th>Action</th>
      								</tr>
      							</thead>
      							<tbody>
                                    <?php foreach ($task as $key): ?>
      								<tr>
                                        <td><?php echo $key->nama_detail_task;?></td>
                                        <td><a href="<?php echo $key->file_detail_task?>">Download</a>
                                        <td>
                                            <a onclick="return confirm('Apakah anda yakin akan menghapus pekerjaan?')" href="<?php echo base_url('panel/task/deleteDetailTask/'.my_simple_crypt($key->id_detail_task,'e'));?>" class="btn btn-sm btn-danger"><i class="fa fa-warning"></i>Hapus</a>
                                        </td>
      								</tr>
                                     <?php endforeach; ?>
      							</tbody>
      							<tfoot>
      								<tr>
                                        <th>Nama Pekerjaan</th>
      									<th>File</th>
                                        <th>Action</th>
      								</tr>
      							</tfoot>
      						</table>
                            </div>
                            <center>
                            <a href="<?php echo base_url('panel/task/historyTask/');?>" class="btn btn-warning mr-1">
                                    <i class="ft-arrow-left"></i> Kembali
                            </a>
                            <?php 
                            $idTask = my_simple_crypt($id,'d');
                            $taskList = $this->db->query("SELECT status_rencana_kerja FROM tb_tasklist WHERE id_tasklist = '$idTask'")->row();
                            if($taskList->status_rencana_kerja != 'Complete'){?>
                            <a href="<?php echo base_url('panel/task/finishTask/');?><?php echo $id?>" class="btn btn-success mr-1">
                                    <i class="fa fa-check-square-o"></i> Selesai
                            </a>
                            <?php } ?>
                            </center>
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
<!-- END: Content-->
<script type="text/javascript">
$(document).ready(function() {
    $('.dataex-html5-selectors').DataTable( {
        dom: 'Bfrtip',
        buttons: [
          {
              extend: 'excelHtml5',
              exportOptions: {
                  columns: ':visible'
              }
          },
          {
              extend: 'csvHtml5',
              exportOptions: {
                  columns: ':visible'
              }
          },
          {
                extend: 'pdfHtml5',
                download:'open',
                exportOptions: {
                    columns: ':visible'
                }
          },
          'colvis',
        ]
    } );
    $('.pagination').addClass('pull-right')
} );
</script>
