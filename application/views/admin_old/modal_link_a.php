     <div class="modal fade" id="modal-tambaha">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Link</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>admin/savelinka" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group row">
                    <label for="Username" class="col-sm-4 col-form-label">Nama File</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="file" id="file" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Username" class="col-sm-4 col-form-label">Update</label>
                    <div class="col-sm-6">
                        <input type="date" class="form-control" name="update" id="update" required>
                    </div>
                </div>
                
                <div class="form-group row">
                  <label for="Username" class="col-sm-4 col-form-label">Link Download</label>
                  <div class="col-sm-8">
                    <textarea class="form-control" name="link" id="link" style="height: 200px" required></textarea>
                  </div>
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambahkan</button>
              </div>
            </form> 
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div> 
<!-- ========================================================================================= -->
      <?php 
        foreach($dblink_a as $o):
      ?>
      <div class="modal fade" id="modal-vervala-<?php echo $o->id;?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Link</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>admin/editlinka" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group row">
                  <label for="Username" class="col-sm-4 col-form-label">Keterangan File</label>
                  <div class="col-sm-8">
                    <input type="hidden" id="id" name="id" value="<?php echo $o->id;?>">
                    <input type="text" class="form-control" name="file" id="file" value="<?php echo $o->file; ?>" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="update" class="col-sm-4 col-form-label">Tanggal Update</label>
                  <div class="col-sm-8">
                    <input type="date" class="form-control" name="update" id="update" value="<?php echo $o->update; ?>" placeholder="Nama Kelas" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="link download" class="col-sm-4 col-form-label">link download</label>
                  <div class="col-sm-12">
                    <textarea class="form-control" name="link" id="link" style="height: 200px" required><?php echo $o->link; ?></textarea>
                  </div>
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form> 
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <?php endforeach; ?>