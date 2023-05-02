<section class="wrapper">
<div class="block-header">
<h1 style="text-align: center">Level</h1>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="#">
                        <div class="#">
                            <div class="row clearfix">
                                <div class="col-xs-8 col-sm-3">
                                    
                                </div>
                                
                            </div>
                            <div class="body">
                            	<div class="row">
                            	
                            	   <a href="#tambah" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Tambah Data</a>
                            		<table class="table table-hover table-striped" style="margin-top: 40px;" ;">
                            		<tr>
                            			<th>NO</th><th>ID LEVEL</th><th>LEVEL</th><th>AKSI</th>

                            		</tr>
                                    <?php
                                    $no=0;
                                    foreach ($data_level as $dt_lev) {
                                      $no++;
                                      echo'<tr>
                                        <td>'.$no.'</td>
                                        <td>'.$dt_lev->id_level.'</td>
                                        <td>'.$dt_lev->nama_level.'</td>
                                        <td><a href="#update_level" class="btn btn-warning"I data-toggle="modal" onclick="tm_detail('.$dt_lev->id_level.')">Update</a> <a href="'.base_url('index.php/level/deleteLevel/'.$dt_lev->id_level).'" class="btn btn-danger"I data-toggle="modal" onclick="return confirm(\'anda yakin\')">Delate</a></td>
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
        <h4 class="modal-title">Tambah Level</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/level/simpan_level')?>" method="post" enctype="multipart/form-data">
        Nama Kategori
        <input type="text" name="nama_level" class="form-control"><br>
        <input type="submit" name="simpan" value="simpan" class="btn btn-success">
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade"id="update_level">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Update Level</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/level/update_level')?>" method="post">
        <input type="hidden" name="id_level" id="id_level">
        Kategori
        <input type="text" id="nama_level" name="nama_level" class="form-control"><br>
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
  function tm_detail(id_level){
    $.getJSON("<?=base_url()?>index.php/level/detail_level/"+id_level,function(data){
      $("#nama_level").val(data['nama_level']);
       $("#id_level").val(data['id_level']);
    });
  }
</script>
</section>