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
                  			<div class="table-responsive">
                              <table class="table table-striped table-bordered dataex-html5-selectors">
      							<thead>
      								<tr>
      									<th>Kategori Kerja</th>
      									<th>Nama Pekerjaan</th>
                                        <th>Waktu Mulai</th>
                                        <th>Deadline</th>
                                        <th>Jenis Pekerjaan</th>
                                        <th>Status Persetujuan</th>
                                        <th>Status Rencana Kerja</th>
                                        <th>Status Detail Pekerjaan</th>
                                        <th>Staff</th>
      									<th>Action</th>
      								</tr>
      							</thead>
      							<tbody>
                                    <?php foreach ($task as $key): ?>
      								<tr>
                                        <td><?php echo $key->kategori_kerja;?></td>
                                        <td><?php echo $key->nama_pekerjaan;?></td>
                                        <td><?php echo $key->start_date;?></td>
                                        <td><?php echo $key->end_date;?></td>
                                        <td><?php echo $key->jenis_pekerjaan;?></td>
                                        <td><?php echo $key->status_persetujuan?></td>
                                        <td><?php echo $key->status_rencana_kerja?></td>
                                        <td><?php echo $key->status_detail_pekerjaan?></td>
                                        <td><?php echo $key->nama_lengkap;?></td>
                                        <td>
                                        <a href="<?php echo base_url('panel/task/detailHistoryTask/'.my_simple_crypt($key->id_tasklist,'e'));?>" class="btn btn-sm btn-info"><i class="fa fa-info"></i> Detail</a>
                                        <a href="<?php echo base_url('panel/task/detailTask/'.my_simple_crypt($key->id_tasklist,'e'));?>" class="btn btn-sm btn-success"><i class="fa fa-info"></i> Lihat Pekerjaan</a>
                                        <?php if($this->session->userdata('hak_akses') != 'Staff' && $key->status_persetujuan == 'Approve' && $key->status_rencana_kerja == 'Complete' && $key->status_detail_pekerjaan == 'On Progress'){?>
                                            <a onclick="return confirm('Apakah anda yakin akan menyelesaikan detail pekerjaan')" href="<?php echo base_url('panel/task/finishhistoryTask/'.my_simple_crypt($key->id_tasklist,'e'));?>" class="btn btn-sm btn-warning"><i class="fa fa-check"></i> Selesai</a>
                                            <a onclick="return confirm('Apakah anda yakin akan menggalkan detail pekerjaan')" href="<?php echo base_url('panel/task/failedhistoryTask/'.my_simple_crypt($key->id_tasklist,'e'));?>" class="btn btn-sm btn-danger"><i class="fa fa-warning"></i> Gagal</a>
                                        <?php } ?>
                                        <?php if($this->session->userdata('hak_akses') != 'Staff' && $key->status_persetujuan == 'Approve' && $key->status_rencana_kerja == 'Failed' && $key->status_detail_pekerjaan == 'Failed'){?>
                                            <a href="<?php echo base_url('panel/task/rateTask/'.my_simple_crypt($key->id_tasklist,'e'));?>" class="btn btn-sm btn-success"><i class="fa fa-info"></i> Nilai Pekerjaan</a>
                                        <?php }elseif($this->session->userdata('hak_akses') != 'Staff' && $key->status_persetujuan == 'Approve' && $key->status_rencana_kerja == 'Complete' && $key->status_detail_pekerjaan == 'Complete'){ ?>
                                            <a href="<?php echo base_url('panel/task/rateTask/'.my_simple_crypt($key->id_tasklist,'e'));?>" class="btn btn-sm btn-success"><i class="fa fa-info"></i> Nilai Pekerjaan</a>
                                        <?php } ?>
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
                                        <th>Jenis Pekerjaan</th>
                                        <th>Status Persetujuan</th>
                                        <th>Status Rencana Kerja</th>
                                        <th>Status Detail Pekerjaan</th>
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
