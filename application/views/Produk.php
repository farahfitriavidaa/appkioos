<?php $this->load->view('Headlp') ?>

<body>

    <?php $this->load->view('Header') ?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="<?=base_url()?>assets/vitamin.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Produk</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Beranda</a>
                            <span>Produk</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-7">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>Produk KIOOS</h2>
                        </div>
                        <div class="row">
                          <?php foreach ($produk as $k): ?>
                            <div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg"
                                        data-setbg="<?=base_url()?>uploads/fotoproduk/<?=$k->fotoproduk?>">
                                        <!-- <div class="product__discount__percent">-20%</div> -->
                                        <ul class="product__item__pic__hover">
                                            <!-- <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li> -->
                                            <li>
                                              <?php if (!$this->session->username){ ?>
                                                <a href="<?=base_url()?>Login"><i class="fa fa-shopping-cart"></i></a>
                                              <?php }else{ ?>
                                                <a href="<?=base_url()?>Landingpage/tambahKeranjang/<?=$k->idproduk?>"><i class="fa fa-shopping-cart"></i></a>
                                                <?php } ?>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <span><?=$k->judulkategori?></span>
                                        <h5><a href="<?=base_url()?>Landingpage/detailProduk/<?=$k->idproduk?>"><?=$k->judulproduk?></a></h5>
                                        <div class="product__item__price"><?=$k->hargaproduk?>
                                          <!-- <span>$36.00</span> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                          <?php endforeach; ?>
                            <!-- <div class="product__discount__slider owl-carousel">
                              <?php //foreach ($produk as $k): ?>
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="<? // base_url()?>uploads/fotoproduk/<$k->fotoproduk?>">
                                            <!-- <div class="product__discount__percent">-20%</div> -->
                                            <!-- <ul class="product__item__pic__hover"> -->
                                                <!-- <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li> -->
                                                <!-- <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul> -->
                                        <!-- </div>

                                        </div>
                                    </div>
                                </div>
                              <?php// endforeach; ?>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <?php $this->load->view('Footerlp') ?>
