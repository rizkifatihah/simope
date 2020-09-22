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
      					<h4 class="card-title">KUISIONER DATA DEMOGRAFI <?=$users->hak_akses?></h4>
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
                        	<table class="table table-striped table-bordered dataex-html5-selectors">
      							<thead>
      								<tr>
      									<th>KUISIONER DATA : <?=$users->nama_lengkap?> </th>
      							        <th>Kategori : <br><?=$users->hak_akses?></th>
                                  	</tr>
      							</thead>
      							<tbody>
                                  
                                  <?php 
									$lahir = new DateTime($users->tgl_lahir);
									$hari_ini = new DateTime();
									$diff = $hari_ini->diff($lahir);
									?>
                                  <tr>
                                    <td>Umur</td>
                                    <td><?=$diff->y;?> Tahun</td>
                                  </tr>
                                  <?php if($users->hak_akses == 'Wanita Usia Subur'){?>
                                  <tr>
                                    <td>Jumlah Anak</td>
                                    <td><?=$users->jumlah_anak?></td>
                                  </tr>
                                  <?php }elseif($users->hak_akses == 'Remaja Putri'){?>
                                    <tr>
                                    <td>Anak Ke</td>
                                    <td><?=$users->anak_ke?></td>
                                  </tr>
                                  <?php }elseif($users->hak_akses == 'Calon Pengantin'){?>
                                    <tr>
                                    <td>Rencana Pernikahan</td>
                                    <td><?=$users->rencana_pernikahan?></td>
                                  </tr>
                                  <?php } ?>
                                  <tr>
                                    <td>Suku</td>
                                    <td><?=$users->suku?></td>
                                  </tr>
                                  <tr>
                                    <td>Agama</td>
                                    <td><?=$users->agama?></td>
                                  </tr>
                                  <tr>
                                  <td>Pendidikan <?php if($users->hak_akses == 'Remaja Putri'){?>Ibu <?php } ?></td>
                                    <td><?=$users->pendidikan?></td>
                                  </tr>
                                  <tr>
                                    <td>Pekerjaan <?php if($users->hak_akses == 'Remaja Putri'){?>Ibu <?php } ?></td>
                                    <td><?=$users->pekerjaan?></td>
                                  </tr>
                                  <?php if($users->hak_akses != 'Calon Pengantin'){?>
                                  <tr>
                                    <td>Status Perkawinan <?php if($users->hak_akses == 'Remaja Putri'){?>Orang Tua <?php } ?></td>
                                    <td><?=$users->status_perkawinan?></td>
                                  </tr>
                                  <?php }elseif($users->hak_akses == 'Calon Pengantin'){?>
                                  <tr>
                                    <td>Tempat Persiapan Prakonsepsi</td>
                                    <td><?=$users->tempat_persiapan_prakonsepsi?></td>
                                  </tr>
                                  <?php }?>
                                  <?php if($users->hak_akses == 'Wanita Usia Subur'){?>
                                  <tr>
                                    <td>Penyuluhan kesehatan tentang perawatan prakonsepsi atau perawatan sebelum kehamilan yang pernah diikuti?</td>
                                    <td><?=$users->info_1?></td>
                                  </tr>
                                  <tr>
                                    <td>Penyuluhan kesehatan tentang perencanaan kehamilan yang pernah diikuti?</td>
                                    <td><?=$users->info_2?></td>
                                  </tr>
                                  <tr>
                                    <td>Sumber informasi penyuluhan kesehatan diperoleh dari:</td>
                                    <td><?=$users->sumber_info?></td>
                                  </tr>
                                  <?php }elseif($users->hak_akses == 'Remaja Putri'){?>
                                    <tr>
                                    <td>Topik penyuluhan kesehatan pada remaja putri yang pernah diikuti?</td>
                                    <td><?=$users->info_2?></td>
                                  </tr>
                                  <tr>
                                    <td>Sumber informasi pendidikan kesehatan prakonsepsi remaja diperoleh dari:</td>
                                    <td><?=$users->sumber_info_remaja?></td>
                                  </tr>
                                  <?php }elseif($users->hak_akses == 'Calon Pengantin'){?>
                                    <tr>
                                    <td>Topik penyuluhan kesehatan pada remaja putri yang pernah diikuti?</td>
                                    <td><?=$users->info_1?></td>
                                  </tr>
                                  <tr>
                                    <td>Sumber informasi pendidikan kesehatan perawatan prakonsepsi diperoleh dari:</td>
                                    <td><?=$users->sumber_info_catin?></td>
                                  </tr>
                                  <?php } ?>
                      
      							</tbody>
      							
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
