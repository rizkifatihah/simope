<?php foreach ($profile as $key): ?>

<!-- BEGIN: Content-->
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
            <form class="form" action="<?php echo base_url('panel/profile/edit_profile/');?>" method="POST" enctype="multipart/form-data">
              <div class="row ">
              <div class="col-md-12 mb-2">
                <div class="col-md-12">
                    <div class="card">
                        <div class="text-center">
                            <div class="card-body">
                              <?php if ($key->fotopengguna==''): ?>
                                  <img src="<?php echo base_url('assets/backend/');?>app-assets/images/user/avatar.jpg" class="rounded-circle  height-150" alt="Card image" id="gambar">
                                <?php else: ?>
                                  <img src="<?php echo base_url().$key->fotopengguna;?>" class="rounded-circle  height-150" alt="Card image" id="gambar">
                              <?php endif; ?>
                            </div>
                            <div class="card-body">
                              <font color="red">Maksimal 10 MB</font>
                              <input type="file" class="form-control border-primary" name="fotopengguna" id="fotopengguna" accept="image/*">
                              <br>
          										<input type="text" class="form-control border-primary" placeholder="Nama Lengkap" name="nama_lengkap" value="<?php echo $key->nama_lengkap;?>" >
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
            <div class="row">
              <div class="col-md-12 ">
  							<div class="form-body">
  								<h4 class="form-section"> About User</h4>
  								<div class="row">
  									
  									<div class="form-group col-md-12 mb-2">
  										<label class="" for="userinput2">Username</label>
  										<input type="text" class="form-control border-primary" placeholder="Username" name="username" value="<?php echo $key->username;?>" disabled>
  									</div>
  								</div>
  								<div class="row">
  									<div class="form-group col-md-6 mb-2">
  										<label class="" for="userinput3">Password</label>
  										<input type="password" class="form-control border-primary" placeholder="Password" name="password">
  									</div>
  									<div class="form-group col-md-6 mb-2">
  										<label class="" for="userinput4">Email</label>
  										<input type="text" class="form-control border-primary" placeholder="Email" value="<?php echo $key->email;?>" name="email" disabled>
  									</div>
  								</div>

  								<h4 class="form-section"> Information & Bio</h4>
                  
  								<div class="row">
  									<div class="form-group col-12 mb-2">
  										<label class="" for="userinput5">No telp</label>
  										<input class="form-control border-primary" type="text" placeholder="No Telp" name="no_telp" value="<?php echo $key->no_telp;?>">
  									</div>
  								</div>
								<?php if($this->session->userdata('hak_akses') == 'Remaja Putri'){?>
								<div class="row">
									<div class="form-group col-12 mb-2">
									<label class="" for="userinput6">Anak Ke</label>
									<select class="form-control border-primary" name="anak_ke" id="anak_ke" >
										<option value="<?php echo $key->anak_ke;?>"><?php echo $key->anak_ke;?></option>
										<option value="sulung">Sulung</option>
										<option value="tengah">Tengah</option>
										<option value="bungsu">Bungsu</option>
									</select>
									</div>
								</div>
								<?php }?>
								<?php if($this->session->userdata('hak_akses') == 'Calon Pengantin'){?>
								<div class="row">
									<div class="form-group col-12 mb-2">
									<label class="" for="userinput6">Rencana Pernikahan</label>
									<select class="form-control border-primary" name="rencana_pernikahan" id="rencana_pernikahan" >
										<option value="<?php echo $key->rencana_pernikahan;?>"><?php echo $key->rencana_pernikahan;?></option>
										<option value="Setahun yang lalu">Setahun yang lalu</option>
										<option value="> 6 bulan">> 6 bulan</option>
										<option value="< 6 bulan">< 6 bulan</option>
									</select>
									</div>
								</div>
								<?php }else{?>
									<input class="form-control border-primary" type="hidden"  name="rencana_pernikahan" value="">
								<?php }?>
  								<div class="row">
  									<div class="form-group col-12 mb-2">
  										<label class="" for="userinput6">Tgl Lahir</label>
  										<input class="form-control border-primary" type="date" placeholder="Tgl Lahir" name="tgl_lahir" value="<?php echo $key->tgl_lahir;?>">
  									</div>
  								</div>
								<div class="row">
									<div class="form-group col-12 mb-2">
									<label class="" for="userinput6">Alamat</label>
									<input class="form-control border-primary" type="text" placeholder="Masukkan Alamat" name="alamat" value="<?php echo $key->alamat;?>">
									</div>
								</div>
								<div class="row">
									<div class="form-group col-12 mb-2">
									<label class="" for="userinput6">Suku</label>
									<input class="form-control border-primary" type="text" placeholder="Masukkan Suku" name="suku" value="<?php echo $key->suku;?>">
									</div>
								</div>
								<div class="row">
									<div class="form-group col-12 mb-2">
									<label class="" for="userinput6">Agama</label>
									<select class="form-control border-primary" name="agama" id="agama" >
										<option value="<?php echo $key->agama;?>"><?php echo $key->agama;?></option>
										<option value="Islam">Islam</option>
										<option value="Kristen">Kristen</option>
										<option value="Hindu">Hindu</option>
										<option value="Budha">Budha</option>
									</select>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-12 mb-2">
								<label class="" for="userinput6">Pendidikan <?php if($this->session->userdata('hak_akses') == 'Remaja Putri'){?>Ibu<?php }?></label>
									<select class="form-control border-primary" name="pendidikan" id="pendidikan" >
										<option value="<?php echo $key->pendidikan;?>"><?php echo $key->pendidikan;?></option>
										<option value="Tidak Sekolah">Tidak Sekolah</option>
										<option value="SD">SD</option>
										<option value="SMP">SMP</option>
										<option value="SLTA">SLTA</option>
										<option value="Perguruan Tinggi">Perguruan Tinggi</option>
									</select>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-12 mb-2">
									<label class="" for="userinput6">Pekerjaan <?php if($this->session->userdata('hak_akses') == 'Remaja Putri'){?>Ibu<?php }?></label>
									<input class="form-control border-primary" type="text" placeholder="Masukkan Pekerjaan" name="pekerjaan" value="<?php echo $key->pekerjaan;?>">
									</div>
								</div>
								<?php if($this->session->userdata('hak_akses') == 'Remaja Putri'){?>
								<div class="row">
									<div class="form-group col-12 mb-2">
									<label class="" for="userinput6">Status Perkawinan Orangtua</label>
									<select class="form-control border-primary" name="status_perkawinan" id="status_perkawinan" >
										<option value="<?php echo $key->status_perkawinan;?>"><?php echo $key->status_perkawinan;?></option>
										<option value="Menikah">Menikah</option>
										<option value="Janda">Janda</option>
									</select>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-12 mb-2">
									<label class="" for="userinput6">Topik penyuluhan kesehatan pada remaja putri yang pernah diikuti?</label>
									<input class="form-control border-primary" type="text" placeholder="Masukkan Keterangan" name="info_2" value="<?php echo $key->info_2;?>">
									</div>
								</div>
								<div class="row">
									<div class="form-group col-12 mb-2">
									<label class="" for="userinput6">Sumber informasi pendidikan kesehatan prakonsepsi remaja diperoleh dari</label>
									<select class="form-control border-primary" name="sumber_info_remaja" id="sumber_info_remaja" >
										<option value="<?php echo $key->sumber_info_remaja;?>"><?php echo $key->sumber_info_remaja;?></option>
										<option value="Orangtua (Ibu atau Lainnya)">Orangtua (Ibu atau Lainnya)</option>
										<option value="Sekolah (Program UKS)">Sekolah (Program UKS)</option>
										<option value="Media sosial">Media sosial</option>
										<option value="Kelompok remaja lainnya">Kelompok remaja lainnya</option>
									</select>
									</div>
								</div>
								<?php }?>
								<?php if($this->session->userdata('hak_akses') == 'Wanita Usia Subur'){?>
								<div class="row">
									<div class="form-group col-12 mb-2">
									<label class="" for="userinput6">Status Perkawinan</label>
									<select class="form-control border-primary" name="status_perkawinan" id="status_perkawinan" >
										<option value="<?php echo $key->status_perkawinan;?>"><?php echo $key->status_perkawinan;?></option>
										<option value="Menikah">Menikah</option>
										<option value="Janda">Janda</option>
									</select>
									</div>
								</div>
								
								
								<div class="row">
									<div class="form-group col-12 mb-2">
									<label class="" for="userinput6">Jumlah Anak</label>
									<select class="form-control border-primary" name="jumlah_anak" id="jumlah_anak" >
										<option value="<?php echo $key->jumlah_anak;?>"><?php echo $key->jumlah_anak;?></option>
										<option value="1-2 Orang">1-2 Orang</option>
										<option value="3-4 Orang">3-4 Orang</option>
										<option value="> 4 Orang">> 4 Orang</option>
									</select>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-12 mb-2">
									<label class="" for="userinput6">Penyuluhan kesehatan tentang perawatan prakonsepsi atau perawatan sebelum kehamilan yang pernah diikuti?</label>
									<input class="form-control border-primary" type="text" placeholder="Masukkan Keterangan" name="info_1" value="<?php echo $key->info_1;?>">
									</div>
								</div>
								<div class="row">
									<div class="form-group col-12 mb-2">
									<label class="" for="userinput6">Penyuluhan kesehatan tentang perencanaan kehamilan yang pernah diikuti?</label>
									<input class="form-control border-primary" type="text" placeholder="Masukkan Keterangan" name="info_2" value="<?php echo $key->info_2;?>">
									</div>
								</div>
								<div class="row">
									<div class="form-group col-12 mb-2">
									<label class="" for="userinput6">Sumber informasi penyuluhan kesehatan diperoleh dari</label>
									<select class="form-control border-primary" name="sumber_info" id="sumber_info" >
										<option value="<?php echo $key->sumber_info;?>"><?php echo $key->sumber_info;?></option>
										<option value="Pelayanan Kesehatan di Puskesmas">Pelayanan Kesehatan di Puskesmas</option>
										<option value="Klinik dokter, bidan, dan klinik kesehatan lainnya">Klinik dokter, bidan, dan klinik kesehatan lainnya</option>
										<option value="Media sosial">Media sosial</option>
										<option value="Posyandu Balita atau ibu hamil">Posyandu Balita atau ibu hamil</option>
										<option value="Kelompok ibu-ibu (arisan dan lainnya)">Kelompok ibu-ibu (arisan dan lainnya)</option>
									</select>
									</div>
								</div>
								<?php }elseif($this->session->userdata('hak_akses') == 'Calon Pengantin'){ ?>
								<div class="row">
									<div class="form-group col-12 mb-2">
									<label class="" for="userinput6">Tempat Persiapan Prakonseps</label>
									<select class="form-control border-primary" name="tempat_persiapan_prakonsepsi" id="tempat_persiapan_prakonsepsi" >
										<option value="<?php echo $key->tempat_persiapan_prakonsepsi;?>"><?php echo $key->tempat_persiapan_prakonsepsi;?></option>
										<option value="Menikah">Menikah</option>
										<option value="Janda">Janda</option>
										<option value=">Duda">Duda</option>
									</select>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-12 mb-2">
									<label class="" for="userinput6">Topik penyuluhan kesehatan reproduksi calon pengantin yang pernah diikuti?</label>
									<input class="form-control border-primary" type="text" placeholder="Masukkan Keterangan" name="info_1" value="<?php echo $key->info_1;?>">
									</div>
								</div>
								<div class="row">
									<div class="form-group col-12 mb-2">
									<label class="" for="userinput6">Sumber informasi pendidikan kesehatan perawatan prakonsepsi diperoleh dari</label>
									<select class="form-control border-primary" name="sumber_info_catin" id="sumber_info_catin" >
									<option value="<?php echo $key->sumber_info_catin;?>"><?php echo $key->sumber_info_catin;?></option>
										<option value="Orangtua (Ibu atau Lainnya)">Orangtua (Ibu atau Lainnya)</option>
										<option value="Pelayanan Kesehatan">Pelayanan Kesehatan</option>
										<option value="Media sosial">Media sosial</option>
										<option value="Posyandu Balita atau ibu hamil">Posyandu Balita atau ibu hamil</option>
										<option value="Kelompok remaja lainnya">Kelompok Remaja Lainnya</option>
									</select>
									</div>
								</div>
								<?php } ?>
								
  								<div class="row">
  									<div class="form-group col-12 mb-2">
  										<label class="">Jenkel</label>
													<select class="form-control border-primary" name="jenkel" id="jenkel" disabled>
														<option value="L">Laki-laki</option>
														<option value="P">Perempuan</option>
													</select>
																	</div>
																</div>
															</div>
								<script type="text/javascript">
								$('#jenkel').val('<?php echo $key->jenkel;?>')
</script>
<div class="row">
									<div class="form-group col-12 mb-2">
									<label class="" for="userinput6">Umur</label>
									<?php 
									$lahir = new DateTime($key->tgl_lahir);
									$hari_ini = new DateTime();
									$diff = $hari_ini->diff($lahir);
									?>
									<input class="form-control border-primary" type="text"  value="Umur : <?php echo $diff->y;?> Tahun" readonly>
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
