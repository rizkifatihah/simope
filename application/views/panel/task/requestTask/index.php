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
      					<h4 class="card-title"><?php echo $subtitle.' - '.$status;?></h4>
      					<a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
      					<div class="heading-elements">
      						<ul class="list-inline mb-0">
                    <li>
                      <a href="<?php echo base_url('panel/task/requestTask/Waiting');?>" class="btn btn-sm btn-warning">Waiting</a>
                      <a href="<?php echo base_url('panel/task/requestTask/Decline');?>" class="btn btn-sm btn-danger">Decline</a>
                    </li>
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
                  <a href="<?php echo base_url('panel/task/createRequestTask/');?>" class="btn btn-info btn-md pull-right"><i class="fa fa-plus"></i> Tambah Rencana Kerja</a>
      						<div class="table-responsive">
                              <table class="table table-striped table-bordered dataex-html5-selectors">
      							<thead>
      								<tr>
      									<th>Kategori Kerja</th>
      									<th>Nama Pekerjaan</th>
                                        <th>Waktu Mulai</th>
                                        <th>Deadline</th>
                                        <th>Staff</th>
                                        
      									<th>Action</th>
      								</tr>
      							</thead>
      							<tbody>
                                    <?php foreach ($requestTask as $key): ?>
      								<tr>
                                        <td><?php echo $key->kategori_kerja;?></td>
      									                <td><?php echo $key->nama_pekerjaan;?></td>
      									                <td><?php echo $key->start_date;?></td>
                                        <td><?php echo $key->end_date;?></td>
                                        <td><?php echo $key->nama_lengkap;?></td>
                                        <td>
                                        <?php if($this->session->userdata('id_pengguna') == $key->id_pengguna && $key->status_persetujuan == 'Waiting'){?>
                                          <a href="<?php echo base_url('panel/task/updateRequestTask/'.my_simple_crypt($key->id_tasklist,'e'));?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                        <?php }?>
                                        <a href="<?php echo base_url('panel/task/detailRequestTask/'.my_simple_crypt($key->id_tasklist,'e'));?>" class="btn btn-sm btn-info"><i class="fa fa-info"></i> Detail</a>
                                        <?php if($this->session->userdata('hak_akses') != 'Staff' && $key->status_persetujuan == 'Waiting'){?>
                                          <a onclick="return confirm('Apakah anda yakin akan menerima Rencana Kerja')" href="<?php echo base_url('panel/task/confirmRequestTask/'.my_simple_crypt($key->id_tasklist,'e'));?>" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Terima</a>
                                          <a onclick="return confirm('Apakah anda yakin akan menolak Rencana Kerja')" href="<?php echo base_url('panel/task/declineRequestTask/'.my_simple_crypt($key->id_tasklist,'e'));?>" class="btn btn-sm btn-danger"><i class="fa fa-warning"></i>Tolak</a>
                                        <?php }?>
                                        </td>
      								</tr>
                                     <?php endforeach; ?>
      							</tbody>
      							<tfoot>
      								<tr>
                                        <th>Kategori Kerja</th>
      									                <th>Nama Pekerjaan</th>
                                        <th>Waktu Mulai</th>
                                        <th>Deadline</th>
                                        <th>Staff</th>
                                        
      									<th>Action</th>
      								</tr>
      							</tfoot>
      						</table>
                            </div>
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
