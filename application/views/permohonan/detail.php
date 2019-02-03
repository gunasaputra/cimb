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
              </div>
              <!-- /.box-header -->
              <div class="box-body">     
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 150px"></th>
                      <th style="width: 20px"></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Nama Nasabah</td>
                      <td>:</td>
                      <td><?php echo $data->nama_nasabah ?></td>
                    </tr>
                    <tr>
                      <td>Tanggal Lahir</td>
                      <td>:</td>
                      <td><?php echo $data->dob ?></td>
                    </tr>
                    <tr>
                      <td>Alamat</td>
                      <td>:</td>
                      <td><?php echo $data->alamat_nasabah ?></td>
                    </tr>
                    <tr>
                      <td>Handphone</td>
                      <td>:</td>
                      <td><?php echo $data->hp ?></td>
                    </tr>
                    <tr>
                      <td>Agama</td>
                      <td>:</td>
                      <td><?php echo $data->agama ?></td>
                    </tr>
                    <tr>
                      <td>Pendidikan Terakhir</td>
                      <td>:</td>
                      <td><?php echo $data->pendidikan ?></td>
                    </tr>
                    <tr>
                      <td>Payroll</td>
                      <td>:</td>
                      <td><?php echo $data->nama_payroll ?></td>
                    </tr>
                    <tr>
                      <td>Lama Bekerja</td>
                      <td>:</td>
                      <td><?php echo $data->lama_bekerja ?></td>
                    </tr>
                    <tr>
                      <td>Jabatan</td>
                      <td>:</td>
                      <td><?php echo $data->jabatan ?></td>
                    </tr>
                    <tr>
                      <td>Departemen</td>
                      <td>:</td>
                      <td><?php echo $data->departemen ?></td>
                    </tr>
                    <tr>
                      <td>Nomor Rekening</td>
                      <td>:</td>
                      <td><?php echo $data->no_rekening ?></td>
                    </tr>
                    <tr>
                      <td>FA</td>
                      <td>:</td>
                      <td><?php echo $data->nama_user ?></td>
                    </tr>
                    <tr>
                      <td>Status</td>
                      <td>:</td>
                      <td><?php echo status_permohonan($data->status_permohonan) ?></td>
                    </tr>
                  </tbody>
                </table>      
              </div>
              <div class="box-footer">
                <a href="<?= base_url() ?>admin/permohonan" class="btn btn-default" >Kembali</a>
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