<!-- BEGIN: Content-->
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body"><!-- fitness target -->
    <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Notifikasi Terbaru</h4>
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
          <table class="table table-striped table-bordered dataex-html5-selectors">
            <thead>
              <tr>
                <th>No</th>
                <th>Notifikasi</th>
                <th>Dari</th>
                <th>Tanggal</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach ($notif as $key): ?>
              <tr>
                <td><?php echo $no++;?></td>
                <td><?php echo $key->notif_name;?></td>
                <td><?php echo $key->nama_lengkap;?></td>
                <td><?php echo $key->notif_time?></td>
              </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Notifikasi</th>
                <th>Dari</th>
                <th>Tanggal</th>
              </tr>
            </tfoot>
          </table>
          </div>
        </div>
      </div>
    </div>
  </div>
<!--/ fitness target -->


    </div>
  </div>
</div>
<!-- END: Content-->
<script type="text/javascript">
$(document).ready(function() {
    $('.dataex-html5-selectors').DataTable({
      paging: false,
      searching: false,
      info: false,
    } );
} );
</script>
