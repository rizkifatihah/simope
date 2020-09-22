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
                  <a href="<?php echo base_url('panel/users/create_rbac/');?>" class="btn btn-info btn-md pull-right"><i class="fa fa-plus"></i> Tambah Hak Akses</a>
      						<table class="table table-striped table-bordered dataex-html5-selectors">
      							<thead>
      								<tr>
      									<th>No</th>
                        <th>Nama Hak Akses</th>
      									<th>Action</th>
      								</tr>
      							</thead>
      							<tbody>
                      <?php $no=1; foreach ($rbac as $key): ?>
      								<tr>
                        <td><?php echo $no++;?></td>
      									<td><?php echo $key->nama_hak_akses;?></td>
      									<td>
                          <a href="<?php echo base_url('panel/users/update_rbac/'.my_simple_crypt($key->id_hak_akses,'e'));?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
                          <a onclick="return confirm('Apakah anda yakin akan menghapus <?php echo $key->nama_hak_akses;?> ? Data yg sudah dihapus tidak bisa dikembalikan')" href="<?php echo base_url('panel/users/delete_rbac/'.my_simple_crypt($key->id_hak_akses,'e'));?>>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                        </td>
      								</tr>
                    <?php endforeach; ?>
      							</tbody>
      							<tfoot>
      								<tr>
                        <th>No</th>
                        <th>Nama Hak Akses</th>
      									<th>Action</th>
      								</tr>
      							</tfoot>
      						</table>
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
