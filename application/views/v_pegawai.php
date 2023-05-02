<section class="wrapper">
<div class="block-header">
<h1 style="text-align: center">Pegawai</h1>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="#">
                        <div class="#">
                            <div class="row clearfix">
                                <div class="col-xs-8 col-sm-3">
                                    
                                </div>
                                
                            </div>
                            <div class="body">
                            	<div class="row">
                            	
                            	   
                            		<table class="table table-hover table-striped" style="margin-top: 40px;" ;">
                                  <a href="#tambah" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Tambah Data</a>
                            		<tr>
                            			<th>NO</th><th>ID PEGAWAI</th><th>NAMA PEGAWAI</th><th>NIP</th><th>ALAMAT</th><th>AKSI</th>

                            		</tr>
                                    <?php
                                    $no=0;
                                    foreach ($data_pegawai as $dt_pew) {
                                      $no++;
                                      echo'<tr>
                                        <td>'.$no.'</td>
                                        <td>'.$dt_pew->id_pegawai.'</td>
                                        <td>'.$dt_pew->nama_pegawai.'</td>
                                        <td>'.$dt_pew->nip.'</td>
                                        <td>'.$dt_pew->alamat.'</td>
                                        <td><a href="#update_pegawai" class="btn btn-warning"I data-toggle="modal" onclick="tm_detail('.$dt_pew->id_pegawai.')">Update</a> <a href="'.base_url('index.php/pegawai/deletePegawai/'.$dt_pew->id_pegawai).'" class="btn btn-danger"I data-toggle="modal" onclick="return confirm(\'anda yakin\')">Delate</a></td>
                                    </tr>';  
                                    }
                            		?>
                            		</table>
                                <?php if ($this->session->flashdata('pesan')!=null): ?>
                                 <div class="alert alert-danger"><?= $this->session->flashdata('pesan');?></div>    
                                <?php endif ?>
                        

  <div class="modal fade"id="tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Tambah Pegawai</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/pegawai/simpan_pegawai')?>" method="post" enctype="multipart/form-data">
        Nama Pegawai
        <input type="text" name="nama_pegawai" class="form-control"><br>
        Nip
        <input type="text" name="nip" class="form-control"><br>
        Alamat
        <input type="text" name="alamat" class="form-control"><br>
        <input type="submit" name="simpan" value="simpan" class="btn btn-success">
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade"id="update_pegawai">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Update Pegawai</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/pegawai/update_pegawai')?>" method="post">
        <input type="hidden" name="id_pegawai" id="id_pegawai">
        Nama Pegawai
        <input type="text" name="nama_pegawai" id="nama_pegawai" class="form-control"><br>
        Nip
        <input type="text" name="nip" id="nip" class="form-control"><br>
        Alamat
        <input type="text" name="alamat" id="alamat" class="form-control"><br>
        <br>  
        <input type="submit" name="simpan" value="simpan" class="btn btn-success">
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
              
        </select>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
  function tm_detail(id_pegawai){
    $.getJSON("<?=base_url()?>index.php/pegawai/detail_pegawai/"+id_pegawai,function(data){
      $("#nama_pegawai").val(data['nama_pegawai']);
      $("#nip").val(data['nip']);
      $("#alamat").val(data['alamat']);
       $("#id_pegawai").val(data['id_pegawai']);
    });
  }
</script>
</section>