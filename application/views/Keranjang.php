<?php $this->load->view('Headlp') ?>

<body>

    <?php $this->load->view('Header') ?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="<?=base_url()?>assets/vitamin.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Keranjang Anda</h2>
                        <div class="breadcrumb__option">
                            <a href="<?=base_url()?>Landingpage">Beranda </a>
                            <span>Keranjang Anda</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                      <?php   if (!$transaksi) {
                        echo"<script type='text/javascript'>
                        alert('Anda belum memilih produk dalam keranjang, belanja yuk');
                        window.location='../';
                        </script>";
                        }else{ ?>
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Produk</th>
                                    <th>Harga</th>
                                    <th>Jumlah Barang</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                              foreach ($transaksi as $t): ?>
                              <form action="<?=base_url()?>Landingpage/updateKeranjang" method="POST">
                                <input type="hidden" name="idkeranjang" value="<?=$t->idkeranjang?>">
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="<?=base_url()?>uploads/fotoproduk/<?=$t->fotoproduk?>" alt="" width="120px">
                                        <h5><?php echo $t->judulproduk ?></h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        Rp <?php echo $t->hargaproduk  ?>
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" name="jumlah_barang" value="<?=$t->jumlah_barang?>">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                    Rp <?=$t->hargaproduk * $t->jumlah_barang?>
                                    </td>
                                    <td class="shoping__cart__item__close">
                                      <a class="icon_close" href="" data-toggle="modal" data-target="#hapus<?=$t->idkeranjang?>"></a>
                                    </td>
                                  </tr>
                              <?php endforeach;  ?>
                        </table>
                      </tbody>
                    <?php } ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <!-- <a href="#" class="dark-btn cart-btn cart-btn-right"><span ></span>
                            Update Keranjang</a> -->
                            <input type="submit" value="Update Keranjang" class="btn btn-success">
                          </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Kode Diskon</h5>
                            <?php if ($inputdisc == NULL){ ?>
                              <form action="<?=base_url()?>Landingpage/inputDiskon" method="POST">
                                  <input type="text" name="diskon" placeholder="Masukan kupon anda" required>
                                  <input type="hidden" name="total" value="<?=$totalnya?>">
                                  <input type="submit" class="info-btn" value="MASUKAN KUPON">
                              </form>
                            <?php }else{ ?>
                              <form action="<?=base_url()?>Landingpage/inputDiskon" method="POST">
                              <input type="text" name="diskon" placeholder="Masukan kupon anda" value="<?=$inputdisc?>" disabled>
                            </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Total Keranjang</h5>
                        <ul>
                            <li>Diskon <span><?php echo $diskon ?></span></li>
                            <li>Biaya Admin <span>Rp 2000,00</span></li>
                            <li><span>*belum termasuk biaya ongkir</span></li>
                            <li>Total <span>Rp <?php echo $totalnya ?>,00</span></li>
                        </ul>
                        <form action="<?=base_url()?>Landingpage/checkout" method="POST">
                          <input type="hidden" name="kodediskon" value="<?=$inputdisc?>">
                          <input type="hidden" name="total" value="<?=$totalnya?>">
                          <input type="submit" class="primary-btn" value="PROSES KE CHECKOUT">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->

  <?php $this->load->view('Footerlp') ?>

  <?php foreach ($transaksi as $key) { ?>
       <div class="modal fade" id="hapus<?=$key->idkeranjang?>" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="ExampleModalLabel">
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
            <a href="<?= site_url()?>Landingpage/hapusKeranjang/<?= $key->idkeranjang ?>" class="btn btn-danger">Iya</a>
          </div>
        </div>
        <!-- /.modal-content -->
       </div>
       <!-- /.modal-dialog -->
       </div>
       <!-- /.modal -->
       <?php } ?>
