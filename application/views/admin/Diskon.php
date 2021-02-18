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
                            <h5>Diskon</h5>
                            <span>berbagai diskon pada aplikasi KIOOS</span>
                            <br>
                            <a class="btn btn-raised btn-primary" href="" data-toggle="modal" data-target="#tambah">
                              <i class="ti-plus"></i>
                                 Tambah Diskon
                            </a>
                            <br>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Diskon</th>
                                            <th>Kode Diskon</th>
                                            <th>Nominal/Persen</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $no = 1;
                                      foreach ($diskon as $k): ?>
                                        <tr>
                                            <th scope="row"><?=$no++?></th>
                                            <td><?=$k->namadiskon?></td>
                                            <td><?=$k->kodediskon?></td>
                                            <td><?php
                                                  if($k->tipe == 'nominal'){
                                                    echo "Rp ".$k->nominal.",00";
                                                  }else if($k->tipe == 'persen'){
                                                    echo $k->persen."%";
                                                  }
                                                ?>
                                            </td>
                                            <td><?=$k->status ?></td>
                                            <td>
                                              <?php if ($k->status == 'aktif') { ?>
                                                <a href="<?=base_url()?>Admin/discTdkAktif/<?=$k->iddiskon?>" class="btn btn-inverse">
                                                  <i class="ti-minus"></i>
                                                    NonAktif
                                                </a>
                                              <?php }else if($k->status == 'nonaktif'){ ?>
                                              <a href="<?=base_url()?>Admin/discAktif/<?=$k->iddiskon?>" class="btn btn-success">
                                                <i class="ti-check"></i>
                                                  Aktif
                                              </a>
                                            <?php } ?>
                                              <a class="btn btn-raised btn-primary" href="" data-toggle="modal" data-target="#edit<?=$k->iddiskon?>">
                                                <i class="ti-pencil-alt"></i>
                                                  Edit
                                              </a>
                                              <a class="btn btn-raised btn-danger" href="" data-toggle="modal" data-target="#hapus<?=$k->iddiskon?>">
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
                 <h4 class="modal-title" id="ExampleModalLabel">Tambah Data Diskon</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
                 </div>
                 <div class="modal-body">
                   <div class="col-md-12">
                     <?php echo validation_errors('<div class="error">'.'</div>'); ?>
                   <form class="" action="<?=base_url()?>Admin/tambahDiskon" method="POST">
                     <table width="100%" class="tabel1">
                       <tr>
                         <td>Nama Diskon</td>
                         <td>:</td>
                         <td><input type="text" class="form-control" name="namadiskon" placeholder="Judul Diskon"></td>
                       </tr>
                       <tr>
                         <td>Kode Diskon</td>
                         <td>:</td>
                         <td><input type="text" class="form-control" name="kodediskon" placeholder="Kode Diskon"></td>
                       </tr>
                       <tr>
                         <td>Tipe</td>
                         <td>:</td>
                         <td>
                           <select class="form-control" name="tipe">
                             <option value="">-- Pilih Tipe --</option>
                             <option value="nominal">Nominal</option>
                             <option value="persen">Persen</option>
                           </select>
                         </td>
                       </tr>
                       <tr>
                         <td>Inputkan diskonnya</td>
                         <td>:</td>
                         <td><input type="number" class="form-control" name="nomordiskon" placeholder="...."></td>
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


  <?php foreach ($diskon as $key) { ?>
   <div class="modal fade" id="edit<?=$key->iddiskon?>" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="ExampleModalLabel">
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
          <form class="" action="<?=base_url()?>Admin/editDiskon/<?=$key->iddiskon?>" method="POST">
          <input type="hidden" name="iddiskon" value="<?=$key->iddiskon?>">
          <table width="100%">
            <tr>
              <td>Nama Diskon</td>
              <td>:</td>
              <td><input type="text" class="form-control" name="namadiskon" placeholder="Judul Diskon" value="<?=$key->namadiskon?>"></td>
            </tr>
            <tr>
              <td>Kode Diskon</td>
              <td>:</td>
              <td><input type="text" class="form-control" name="kodediskon" placeholder="Kode Diskon" value="<?=$key->kodediskon?>"></td>
            </tr>
            <tr>
              <td>Inputkan diskonnya</td>
              <td>:</td>
              <td><input type="number" class="form-control" name="nomordiskon" placeholder="...." value="<?=$key->persen?><?=$key->nominal?>"></td>
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

   <?php foreach ($diskon as $key) { ?>
        <div class="modal fade" id="hapus<?=$key->iddiskon?>" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="ExampleModalLabel">
        <div class="modal-dialog" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <h4 class="modal-title" id="ExampleModalLabel">Konfirmasi Hapus Diskon</h4>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">
             <p>Anda Yakin Ingin Menghapus Diskon <?= $key->namadiskon ?>?</p>
           </div>
           <div class="modal-footer justify-content-between">
             <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tidak</button>
             <a href="<?= site_url()?>Admin/hapusDiskon/<?= $key->iddiskon ?>" class="btn btn-danger">Iya</a>
           </div>
         </div>
         <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <?php } ?>
