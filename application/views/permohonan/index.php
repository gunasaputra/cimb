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
            <div class="box">
              <div class="box-header">
                <h3 class="box-title"><?php echo $template->title ?> </h3>
                <?php if(access(['FA'])): ?>
                  <a href="<?php echo base_url().$template->controller ?>/add" class="btn btn-md btn-primary pull-right"><span class="fa fa-plus"></span> Tambah Data <?php echo $template->title ?></a>
                <?php endif; ?>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Nasabah</th> 
                      <th>Payroll</th>                                   
                      <th>Tanggal Lahir</th>
                      <th>Pengajuan</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no=1;
                    foreach ($list as $key => $row) { ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row->nama_nasabah ?></td>                                    
                        <td><?php echo $row->nama_payroll ?></td>
                        <td><?php echo date('d-m-Y',strtotime($row->dob)) ?></td>
                        <td>Rp. <?php echo number_format($row->pengajuan) ?></td>
                        <td><?php echo status_permohonan($row->status_permohonan) ?></td>
                        <td>
                        <?php if(access(['FA','Admin'])): ?>
                          <a href="<?php echo base_url().$template->controller ?>/edit/<?php echo $row->p_id ?>" class="btn btn-success btn-sm">
                            <i class="fa fa-edit"></i> Ubah
                          </a> 
                        <?php endif; ?>
                          <a href="<?php echo base_url().$template->controller ?>/detail/<?php echo $row->p_id ?>" class="btn btn-info btn-sm">
                            <i class="fa fa-eye"></i> Lihat
                          </a>                        
                        </td>
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
</body>
</html>