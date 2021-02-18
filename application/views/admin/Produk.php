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
                            <h5>Produk</h5>
                            <span>berbagai produk pada aplikasi KIOOS</span>
                            <br>
                            <a class="btn btn-raised btn-primary" href="" data-toggle="modal" data-target="#tambah">
                              <i class="ti-plus"></i>
                                 Tambah Produk
                            </a>
                            <br>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kategori Produk</th>
                                            <th>Nama Produk</th>
                                            <th>Harga Produk</th>
                                            <th>Foto Produk</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $no = 1;
                                      foreach ($produk as $k): ?>
                                        <tr>
                                            <th scope="row"><?=$no++?></th>
                                            <td><?=$k->judulkategori?></td>
                                            <td><?=$k->judulproduk?></td>
                                            <td>Rp <?=$k->hargaproduk?>,00</td>
                                            <td> <img src="<?=base_url()?>uploads/fotoproduk/<?=$k->fotoproduk?>" alt="Foto Produk" width="100px"></td>
                                            <td>
                                              <a class="btn btn-raised btn-primary" href="" data-toggle="modal" data-target="#edit<?=$k->idproduk?>">
                                                <i class="ti-pencil-alt"></i>
                                                  Edit
                                              </a>
                                              <a class="btn btn-raised btn-danger" href="" data-toggle="modal" data-target="#hapus<?=$k->idproduk?>">
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
                 <h4 class="modal-title" id="ExampleModalLabel">Tambah Data Produk</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
                 </div>
                 <div class="modal-body">
                   <div class="col-md-12">
                     <?php echo validation_errors('<div class="error">'.'</div>'); ?>
                   <form class="" action="<?=base_url()?>Admin/tambahProduk" method="POST" enctype="multipart/form-data">
                     <table width="100%">
                       <tr>
                         <td>Kategori</td>
                         <td>:</td>
                         <td>
                           <select class="form-control" name="kategori">
                             <option value="">-- Pilih Kategori --</option>
                             <?php foreach ($kategori as $k): ?>
                               <option value="<?=$k->idkategoriproduk?>"><?=$k->judulkategori?></option>
                             <?php endforeach; ?>
                           </select>
                         </td>
                       </tr>
                       <tr>
                         <td>Nama Produk</td>
                         <td>:</td>
                         <td>
                          <input type="text" name="namaproduk" class="form-control" placeholder="Nama Produk">
                         </td>
                       </tr>
                       <tr>
                         <td>Harga Produk</td>
                         <td>:</td>
                         <td>
                            <input type="text" name="hargaproduk" class="form-control" placeholder="Rp">
                         </td>
                       </tr>
                       <tr>
                         <td>Keterangan</td>
                         <td>:</td>
                         <td>
                           <textarea name="keterangan" class="form-control" rows="8" cols="80" placeholder="Keterangan Produk"></textarea>
                         </td>
                       </tr>
                       <tr>
                         <td>Foto Produk</td>
                         <td>:</td>
                         <td>
                          <input type="file" name="fotoproduk" class="form-control">
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

  <?php foreach ($produk as $key) { ?>
   <div class="modal fade" id="edit<?=$key->idproduk?>" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="ExampleModalLabel">
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
          <form class="" action="<?=base_url()?>Admin/editProduk/<?=$key->idproduk?>" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="idproduk" value="<?=$key->idproduk?>">
          <table width="100%">
            <tr>
              <td>Kategori</td>
              <td>:</td>
              <td>
                <select class="form-control" name="kategori">
                  <option value="<?=$key->idkategoriproduk?>"><?=$key->judulkategori?></option>
                  <?php foreach ($kategori as $k): ?>
                    <option value="<?=$k->idkategoriproduk?>"><?=$k->judulkategori?></option>
                  <?php endforeach; ?>
                </select>
              </td>
            </tr>
            <tr>
              <td>Nama Produk</td>
              <td>:</td>
              <td>
               <input type="text" name="namaproduk" class="form-control" placeholder="Nama Produk" value="<?=$key->judulproduk?>">
              </td>
            </tr>
            <tr>
              <td>Harga Produk</td>
              <td>:</td>
              <td>
                 <input type="text" name="hargaproduk" class="form-control" placeholder="Rp" value="<?=$key->hargaproduk?>">
              </td>
            </tr>
            <tr>
              <td>Keterangan</td>
              <td>:</td>
              <td>
                <textarea name="keterangan" class="form-control" rows="8" cols="80" placeholder="Keterangan Produk"><?=$key->keterangan?></textarea>
              </td>
            </tr>
            <tr>
              <td>Foto Produk</td>
              <td>:</td>
              <td>
               <input type="file" name="fotoproduk" class="form-control">
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

   <?php foreach ($produk as $key) { ?>
        <div class="modal fade" id="hapus<?=$key->idproduk?>" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="ExampleModalLabel">
        <div class="modal-dialog" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <h4 class="modal-title" id="ExampleModalLabel">Konfirmasi Hapus Produk</h4>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">
             <p>Anda Yakin Ingin Menghapus Produk <?= $key->judulproduk ?>?</p>
           </div>
           <div class="modal-footer justify-content-between">
             <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tidak</button>
             <a href="<?= site_url()?>Admin/hapusProduk/<?= $key->idproduk ?>" class="btn btn-danger">Iya</a>
           </div>
         </div>
         <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <?php } ?>
