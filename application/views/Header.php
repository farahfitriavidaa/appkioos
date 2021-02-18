<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i> kiooshealth@gmail.com</li>
                            <li>Free Ongkir Daerah Margahayu Raya</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <!-- <div class="header__top__right__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        </div> -->
                        <!-- <div class="header__top__right__language">
                            <img src="<?=base_url()?>assets/landingpage/img/language.png" alt="">
                            <div>English</div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                                <li><a href="#">Spanis</a></li>
                                <li><a href="#">English</a></li>
                            </ul>
                        </div> -->
                        <div class="header__top__right__auth">
                          <?php if (!$this->session->username){ ?>
                            <a href="<?=base_url()?>Login"><i class="fa fa-user"></i> Login</a>
                          <?php }else{ ?>
                            <a href=""><i class="fa fa-user"></i> <?=$this->session->username?></a>
                          <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="./index.html"><img src="<?=base_url()?>assets/logowarna.png" alt="" width="150px"></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li><a href="<?=base_url()?>Landingpage">Beranda</a></li>
                        <!-- <li><a href="<?=base_url()?>Landingpage/kategori">Kategori</a></li> -->
                        <!-- <li><a href="#">Pages</a>
                            <ul class="header__menu__dropdown">
                                <li><a href="./shop-details.html">Shop Details</a></li>
                                <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                <li><a href="./checkout.html">Check Out</a></li>
                                <li><a href="./blog-details.html">Blog Details</a></li>
                            </ul>
                        </li> -->
                        <li><a href="<?=base_url()?>Landingpage/produk">Produk</a></li>
                        <li><a href="<?=base_url()?>Landingpage/kontakKami">Kontak kami</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <!-- <li><a href="#"><i class="fa fa-heart"></i> <span>0</span></a></li> -->
                        <li>
                          <?php if (!$this->session->username){ ?>
                          <a href="<?=base_url()?>Landingpage/keranjangb"><i class="fa fa-shopping-bag"></i> <span><?=$keranjang->hasil?></span></a>
                          <?php }else{ ?>
                          <a href="<?=base_url()?>Landingpage/keranjang"><i class="fa fa-shopping-bag"></i> <span><?=$keranjang->hasil?></span></a>
                        <?php } ?>
                        </li>
                    </ul>
                    <div class="header__cart__price">
                      <span>
                        <?php if (!$this->session->username){ ?>
                        BELANJA SEKARANG JUGA!!
                        <?php }else{ ?>
                          <a href="<?=base_url()?>Login/logout">Logout</a>
                        <?php } ?>
                      </span></div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->
