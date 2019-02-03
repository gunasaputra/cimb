<?php 
  $this->load->view('template/head');
  $this->load->view('template/side',$template);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       <?php echo $template->title ?>      
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">  <?php echo $template->title ?>      </a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- ALERT STATUS -->
        <?php if(!empty($this->session->flashdata('status'))){ ?>     
          <div class="alert <?php echo $this->session->flashdata('status') == 'error' ? 'alert-danger' : 'alert-success' ?>" role="alert"><?php echo $this->session->flashdata('text') ?></div>
        <?php } ?>
        <!-- END ALERT STATUS -->
        <div class="row">
          <div class="col-xs-12">
            <?php foreach($list as $key => $value): ?>
              <div class="alert alert-info">
                <strong><?php echo $value->judul ?></strong> <br> <?php echo $value->isi_pengumuman ?>
                <br>
                Dari <em><strong><?php echo $value->nama_user ?></strong></em>
              </div>
            <?php endforeach; ?>
          </div>
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Filter Berdasarkan Tanggal </h3> 
                <div class="row">
                  <div class="col-md-12 pull-right">
                    <form action="">
                        <div class="row">
                          <div class="col-md-5">
                            <div class="form-group">
                              <label for="">Dari Tgl</label>
                              <input type="text" name="dari_tgl" value="<?= $dari_tgl ?>" class="form-control datepicker">
                            </div>                    
                          </div>
                          <div class="col-md-5">
                            <div class="form-group">
                            <label for="">Sampai Tgl</label>
                              <input type="text" name="sampai_tgl" value="<?= $sampai_tgl ?>" class="form-control datepicker">
                            </div>                    
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                            <label for="">Aksi</label>
                              <button class="btn btn-success btn-block">Cari</button>
                            </div>                    
                          </div>
                        </div>
                    </form>                
                  </div>   
                </div>
                <?php if(access(['FA'])): ?>
                  <a href="<?php echo base_url().$template->controller ?>/add" class="btn btn-md btn-primary pull-right"><span class="fa fa-plus"></span> Tambah Data <?php echo $template->title ?></a>
                <?php endif; ?>
              </div>
              <!-- /.box-header -->
              
            </div>
          </div>
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Ranking Pengajuan </h3>               
                <?php if(access(['FA'])): ?>
                  <a href="<?php echo base_url().$template->controller ?>/add" class="btn btn-md btn-primary pull-right"><span class="fa fa-plus"></span> Tambah Data <?php echo $template->title ?></a>
                <?php endif; ?>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama FA</th> 
                      <th>Total Permohonan</th>  
                      <th>Total Pengajuan</th>                                  
                                                            
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no=1;
                    foreach ($rankQty as $key => $row) { ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row->nama_user ?></td>                                    
                        <td><?php echo $row->jumlah_qty ?></td>
                        <td>Rp.<?php echo number_format($row->jumlah_pengajuan) ?></td>
                        
                       
                      </tr> 
                    <?php } ?>
                  </tbody>              
                 
                </table>
              </div>
              <!-- /.box-body -->
            </div>
          </div>

          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Ranking Diterima </h3>               
                <?php if(access(['FA'])): ?>
                  <a href="<?php echo base_url().$template->controller ?>/add" class="btn btn-md btn-primary pull-right"><span class="fa fa-plus"></span> Tambah Data <?php echo $template->title ?></a>
                <?php endif; ?>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama FA</th> 
                      <th>Total Permohonan</th>  
                      <th>Total Pengajuan</th>                                  
                                                            
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no=1;
                    foreach ($rankDiterima as $key => $row) { ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row->nama_user ?></td>                                    
                        <td><?php echo $row->jumlah_qty ?></td>
                        <td>Rp.<?php echo number_format($row->jumlah_pengajuan) ?></td>
                        
                       
                      </tr> 
                    <?php } ?>
                  </tbody>              
                 
                </table>
              </div>
              <!-- /.box-body -->
            </div>
          </div>
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Pengajuan Permohonan </h3>               
                <?php if(access(['FA'])): ?>
                  <a href="<?php echo base_url().$template->controller ?>/add" class="btn btn-md btn-primary pull-right"><span class="fa fa-plus"></span> Tambah Data <?php echo $template->title ?></a>
                <?php endif; ?>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example1-" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Nasabah</th> 
                      <th>Payroll</th>                                   
                      <th>Tanggal Permohonan</th>
                      <th>Pengajuan</th>
                      <th>FA</th>
                      <th>Status</th>                     
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no=1;
                    foreach ($permohonan as $key => $row) { ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row->nama_nasabah ?></td>                                    
                        <td><?php echo $row->nama_payroll ?></td>
                        <td><?php echo date('d-m-Y',strtotime($row->tanggal_permohonan)) ?></td>
                        <td>Rp. <?php echo number_format($row->pengajuan) ?></td>
                        <td><?php echo $row->nama_user ?></td>
                        <td><?php echo status_permohonan($row->status_permohonan) ?></td>
                       
                      </tr> 
                    <?php } ?>
                  </tbody>              
                 
                </table>
              </div>
              <!-- /.box-body -->
            </div>
          </div>
        </div>
    </section>
    <!-- /.content -->
  </div>  

<?php $this->load->view('template/footer') ?>
<script src="<?php echo base_url() ?>assets/bower_components/chart.js/Chart.js"></script>
<script>

</script>
</body>
</html>