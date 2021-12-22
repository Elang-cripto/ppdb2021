     <div class="modal fade" id="modal-tambah">
        <div class="modal-dialog">
          <div class="modal-content bg-primary">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Kelas</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>guru/savekls" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group row">
                  <label for="Username" class="col-sm-4 col-form-label">Nama Kelas</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="nama_kelas" id="nama_kelas" placeholder="Nama Kelas" required>
                    <input type="hidden" class="form-control" name="paralel" id="paralel" value="mts" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="Username" class="col-sm-4 col-form-label">Wali Kelas</label>
                  <div class="col-sm-8">
                    <select type="text" name="wali_kelas" id="wali_kelas"  class="form-control select2">
                      <option value="" disabled selected hidden>Pilih Data</option>
                       <?php foreach($cats as $cat) : ?>
                        <option value="<?php echo $cat->nama;?>"> <?php echo $cat->nama; ?></option>
                       <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-light">Tambahkan</button>
              </div>
            </form> 
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div> 
      <?php 
        foreach($dbkls as $m):
      ?>
      <div class="modal fade" id="modal-default-<?php echo $m->id;?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Kelas</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>guru/editkls" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group row">
                    <label for="Username" class="col-sm-4 col-form-label">Nama Kelas</label>
                    <div class="col-sm-6">
                      <input type="hidden" id="id" name="id" value="<?php echo $m->id;?>">
                      <input type="text" class="form-control" name="nama_kelas" id="nama_kelas" value="<?php echo $m->kelas;?>" required>
                      <input type="hidden" class="form-control" name="paralel" id="paralel" value="<?php echo $m->par;?>" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Username" class="col-sm-4 col-form-label">Wali Kelas</label>
                    <div class="col-sm-8">
                      <select type="text" name="wali_kelas" id="wali_kelas"  class="form-control select2">
                        <option><?php echo $m->wali_kelas;?></option>
                         <?php foreach($cats as $cat) : ?>
                          <option value="<?php echo $cat->nama;?>"> <?php echo $cat->nama; ?></option>
                         <?php endforeach; ?>
                      </select>
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