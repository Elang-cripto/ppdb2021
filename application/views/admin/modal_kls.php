     <div class="modal fade" id="modal-tambah">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Kelas</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>admin/savekls" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group row">
                    <label for="Username" class="col-sm-4 col-form-label">Nama Kelas</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="nama_kelas" id="nama_kelas" placeholder="Nama Kelas" required>
                        <?php $parm = explode('kls', $this->uri->segment(2)); ?>
                        <input type="hidden" class="form-control" name="paralel" id="paralel" value="<?php echo $parm[1]; ?>">
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
            <form method="post" action="<?php echo base_url(); ?>admin/editkls" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group row">
                  <label for="Username" class="col-sm-4 col-form-label">Nama Kelas</label>
                  <div class="col-sm-8">
                    <input type="hidden" id="id" name="id" value="<?php echo $m->id;?>">
                    <input type="text" class="form-control" name="nama_kelas" id="nama_kelas" value="<?php echo $m->kelas;?>" required>
                    <input type="hidden" class="form-control" name="paralel" id="paralel" value="<?php echo $m->par;?>" required>
                  </div>
                </div>
                <div class="form-group row" hidden>
                  <label for="Username" class="col-sm-4 col-form-label">validasi</label>
                  <div class="col-sm-8">
                    <select type="text" name="validasi" id="validasi"  class="form-control select2">
                      <option value="" <?php if($m->validasi==""){echo "selected";} ?>>--Kosong--</option>
                      <option value="Pengajuan" <?php if($m->validasi=="Pengajuan"){echo "selected";} ?>>Pengajuan</option>
                      <option value="Proses" <?php if($m->validasi=="Proses"){echo "selected";} ?>>Proses</option>
                      <option value="Revisi" <?php if($m->validasi=="Revisi"){echo "selected";} ?>>Revisi</option>
                      <option value="Finis" <?php if($m->validasi=="Finis"){echo "selected";} ?>>Finis</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row" hidden>
                  <label for="Username" class="col-sm-4 col-form-label">Keterangan</label>
                  <div class="col-sm-12">
                    <textarea class="form-control" name="keterangan" id="keterangan" style="height: 200px"><?php echo $m->keterangan; ?></textarea>
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

<!-- ========================================================================================= -->
      <?php 
        foreach($dbkls as $n):
      ?>
      <div class="modal fade" id="modal-verval-<?php echo $n->id;?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Validasi</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>admin/editkls" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group row" hidden>
                  <label for="Username" class="col-sm-4 col-form-label">Nama Kelas</label>
                  <div class="col-sm-8">
                    <input type="hidden" id="id" name="id" value="<?php echo $n->id;?>">
                    <input type="text" class="form-control" name="nama_kelas" id="nama_kelas" value="<?php echo $n->kelas;?>" required>
                    <input type="hidden" class="form-control" name="paralel" id="paralel" value="<?php echo $n->par;?>" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="Username" class="col-sm-4 col-form-label">validasi</label>
                  <div class="col-sm-8">
                    <select type="text" name="validasi" id="validasi"  class="form-control select2" required>
                      <option value="" <?php if($n->validasi==""){echo "selected";} ?>>--Kosong--</option>
                      <option value="Pengajuan" <?php if($n->validasi=="Pengajuan"){echo "selected";} ?>>Pengajuan</option>
                      <option value="Proses" <?php if($n->validasi=="Proses"){echo "selected";} ?>>Proses</option>
                      <option value="Revisi" <?php if($n->validasi=="Revisi"){echo "selected";} ?>>Revisi</option>
                      <option value="Finis" <?php if($n->validasi=="Finis"){echo "selected";} ?>>Finis</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="Username" class="col-sm-4 col-form-label">Keterangan</label>
                  <div class="col-sm-12">
                    <textarea class="form-control" name="keterangan" id="keterangan" style="height: 200px" required><?php echo $n->keterangan; ?></textarea>
                  </div>
                </div>
                <div class="form-group row" hidden>
                  <label for="Username" class="col-sm-4 col-form-label">Wali Kelas</label>
                  <div class="col-sm-8">
                    <select type="text" name="wali_kelas" id="wali_kelas"  class="form-control select2">
                      <option><?php echo $n->wali_kelas;?></option>
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