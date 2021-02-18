<?php $this->load->view('Headlp') ?>

<body>

  <?php $this->load->view('Header') ?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="<?=base_url()?>assets/kontakkami.jpeg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Contact Us</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Beranda</a>
                            <span>Kontak kami</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_phone"></span>
                        <h4>No.Telp</h4>
                        <p>+62 821-3053-7608</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_pin_alt"></span>
                        <h4>Alamat</h4>
                        <p>Metro Indah Mall Ruko, Blk. 1 No.31, Sekejati, Kec. Buahbatu, Kota Bandung, Jawa Barat 40286</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_clock_alt"></span>
                        <h4>Operasional</h4>
                        <p>09:00 - 17:00</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt"></span>
                        <h4>Email</h4>
                        <p>kiooshealth@gmai.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Map Begin -->
    <div class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.556122288328!2d107.65782181462589!3d-6.943530294983358!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e999710e517f%3A0x60ca10dfa028277!2sKIOOS!5e0!3m2!1sid!2sid!4v1613330625339!5m2!1sid!2sid"
            height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        <div class="map-inside">
            <i class="icon_pin"></i>
            <div class="inside-widget">
                <h4>Indonesia</h4>
                <ul>
                    <li>No. Telp: +62 821-3053-7608</li>
                    <li>Alamat : Metro Indah Mall Ruko, Blk. 1 No.31, Sekejati, Kec. Buahbatu, Kota Bandung, Jawa Barat 40286</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Map End -->

    <!-- Contact Form Begin -->
    <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>KRITIK DAN SARAN</h2>
                    </div>
                </div>
            </div>
            <form action="<?=base_url()?>Landingpage/kirimpesan" method="POST">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <input type="text" placeholder="Nama Lengkap Anda" name="namalengkap">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="text" placeholder="Email Anda" name="email">
                    </div>
                    <div class="col-lg-12 text-center">
                        <textarea placeholder="Tuliskan Kritik dan Saran Anda" name="pesan"></textarea>
                        <button type="submit" class="site-btn">KIRIM PESAN</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Contact Form End -->

    <?php $this->load->view('Footerlp') ?>
