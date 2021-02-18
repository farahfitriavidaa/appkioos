<?php $this->load->view('admin/Head') ?>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">

                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

          <?php $this->load->view('admin/Header') ?>

          <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <div class="main-body">
                        <div class="page-wrapper">

                          <div class="page-header card">
                            <h5>Banner</h5>
                            <span>berbagai banner pada aplikasi KIOOS</span>
                            <br>
                            <a class="btn btn-raised btn-primary" href="" data-toggle="modal" data-target="#tambah">
                              <i class="ti-plus"></i>
                                 Tambah Banner
                            </a>
                            <br>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Foto Banner</th>
                                            <th>Judul Banner</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $no = 1;
                                      foreach ($banner as $k): ?>
                                        <tr>
                                            <th scope="row"><?=$no++?></th>
                                            <td>
                                              <img src="<?=base_url()?>uploads/fotobanner/<?=$k->fotobanner?>" alt="Foto Produk" width="100px">
                                            </td>
                                            <td><?=$k->judulbanner?></td>
                                            <td><?=$k->keterangan?></td>
                                            <td>
                                              <a class="btn btn-raised btn-primary" href="" data-toggle="modal" data-target="#edit<?=$k->idbanner?>">
                                                <i class="ti-pencil-alt"></i>
                                                  Edit
                                              </a>
                                              <a class="btn btn-raised btn-danger" href="" data-toggle="modal" data-target="#hapus<?=$k->idbanner?>">
                                                <i class="ti-trash"></i>
                                                  Hapus
                                              </a>
                                            </td>
                                        </tr>
                                      <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
                <div class="fixed-button">
                    <a href="https://codedthemes.com/item/guru-able-admin-template/" target="_blank" class="btn btn-md btn-primary">
                      <i class="fa fa-shopping-cart" aria-hidden="true"></i> KIOOS
                    </a>
                </div>
            </div>
        </div>

<?php $this->load->view('admin/Footer') ?>

        <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="ExampleModalLabel">
            <div class="modal-dialog" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <h4 class="modal-title" id="ExampleModalLabel">Tambah Data Banner</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
                 </div>
                 <div class="modal-body">
                   <div class="col-md-12">
                     <?php echo validation_errors('<div class="error">'.'</div>'); ?>
                   <form class="" action="<?=base_url()?>Admin/tambahBanner" method="POST" enctype="multipart/form-data">
                     <table width="100%">
                       <tr>
                         <td>Judul Banner</td>
                         <td>:</td>
                         <td>
                          <input type="text" name="judulbanner" class="form-control" placeholder="Judul Banner">
                         </td>
                       </tr>
                       <tr>
                         <td>Keterangan</td>
                         <td>:</td>
                         <td>
                           <textarea name="keterangan" class="form-control" rows="8" cols="80" placeholder="Keterangan Banner"></textarea>
                         </td>
                       </tr>
                       <tr>
                         <td>Foto Banner</td>
                         <td>:</td>
                         <td>
                          <input type="file" name="fotobanner" class="form-control">
                         </td>
                       </tr>
                     </table>
                    </div>
                 </div>
                 <div class="modal-footer justify-content-between">
                   <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                   <input type="submit" class="btn btn-danger" value="Tambah">
                 </div>
               </form>
               </div>
               <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
      </div>

  <?php foreach ($banner as $key) { ?>
   <div class="modal fade" id="edit<?=$key->idbanner?>" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="ExampleModalLabel">
   <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="ExampleModalLabel">Edit Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <?php echo validation_errors('<div class="error">'.'</div>'); ?>
          <form class="" action="<?=base_url()?>Admin/editBanner/<?=$key->idbanner?>" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="idbanner" value="<?=$key->idbanner?>">
          <table width="100%">
            <tr>
              <td>Judul Banner</td>
              <td>:</td>
              <td>
               <input type="text" name="judulbanner" class="form-control" placeholder="Judul Banner" value="<?=$key->judulbanner?>">
              </td>
            </tr>
            <tr>
              <td>Keterangan</td>
              <td>:</td>
              <td>
                <textarea name="keterangan" class="form-control" rows="8" cols="80" placeholder="Keterangan Banner"><?=$key->keterangan?></textarea>
              </td>
            </tr>
            <tr>
              <td>Foto Banner</td>
              <td>:</td>
              <td>
               <input type="file" name="fotobanner" class="form-control">
              </td>
            </tr>
          </table>
         </div>

      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tidak</button>
        <input type="submit" class="btn btn-danger" value="Iya">
      </div>
    </form>
    </div>
    <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
   </div>
   <!-- /.modal -->
   <?php } ?>

   <?php foreach ($banner as $key) { ?>
        <div class="modal fade" id="hapus<?=$key->idbanner?>" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="ExampleModalLabel">
        <div class="modal-dialog" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <h4 class="modal-title" id="ExampleModalLabel">Konfirmasi Hapus Banner</h4>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">
             <p>Anda Yakin Ingin Menghapus Banner <?= $key->judulbanner ?>?</p>
           </div>
           <div class="modal-footer justify-content-between">
             <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tidak</button>
             <a href="<?= site_url()?>Admin/hapusBanner/<?= $key->idbanner ?>" class="btn btn-danger">Iya</a>
           </div>
         </div>
         <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <?php } ?>
