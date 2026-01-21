


    </main>





<!-- FOOTER -->
<footer class="footer-area text-white pt-5">
    <div class="container-fluid">
        <div class="row">

            <!-- About + Newsletter -->
            <div class="col-md-6 mb-4">
                <a href="#" class="footer-logo mb-3 d-block">
                    <img src="<?= base_url('attachments/Other/' . $this->Model->get_setting('site_logo','logo.png')) ?>" alt="logo" style="height:100px;width:100px; border-radius: 50%;">
                </a>
                <p> <?= $this->Model->get_setting('site_description',
                        'La créativité est au cœur de l’innovation. AbeLab est votre laboratoire de formation technologique.'
                    ); ?></p>

                <h5 class="mt-3 mb-2 col-md-3">Abonnez-vous à notre Newsletter</h5>
                <form action="<?=base_url('Home/Contact/Newsletter')?>" method="POST" enctype="multipart/form-data" class="newsletter-form d-flex">
                    <input type="email" class="form-control me-2" name="email" placeholder="Votre email" required>
                    <button type="submit" class="btn btn-warning text-dark">S’abonner</button>
                </form>

                <div class="footer-social mt-3">
                    <a target="_blank" href="<?= $this->Model->get_setting('site_facebook','facebook.com'); ?>"><i class="fab fa-facebook-f"></i></a>
                    <a target="_blank" href="<?= $this->Model->get_setting('site_instagram','instagram.com'); ?>"><i class="fab fa-instagram"></i></a>
                    <a target="_blank" href="<?= $this->Model->get_setting('site_youtube','youtube.com'); ?>"><i class="fab fa-youtube"></i></a>
                    <a href="https://wa.me/<?= preg_replace('/\D/','',$this->Model->get_setting('site_phone','+2576886345')) ?>"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-md-3 mb-4">
                <h5 class="footer-title">Quick Links</h5>
                <ul class="footer-list">
                    <li><a href="<?=base_url('')?>"><i class="fas fa-caret-right"></i> Home</a></li>
                    <li><a href="<?=base_url('Home/AboutUs')?>"><i class="fas fa-caret-right"></i> A propos</a></li>
                    <li><a href="<?=base_url('Home/Actions')?>"><i class="fas fa-caret-right"></i> Nos actions</a></li>
                    <li><a href="<?=base_url('Home/Events')?>"><i class="fas fa-caret-right"></i> Evenements</a></li>
                    <li><a href="<?=base_url('Home/Actualite')?>"><i class="fas fa-caret-right"></i> news</a></li>
                    <li><a href="<?=base_url('Home/Galleries')?>"><i class="fas fa-caret-right"></i> Galeries</a></li>
                    <li><a href="<?=base_url('Home/ContactUs')?>"><i class="fas fa-caret-right"></i> Contact us</a></li>
                    <li><a href="<?=base_url('Home/Involved')?>"><i class="fas fa-caret-right"></i> Donation</a></li>
                </ul>
            </div>

            
            <!-- Contact -->
            <div class="col-md-3 mb-4">
                <h5 class="footer-title">Contact</h5>
                <ul class="footer-contact">
                    <li><i class="fas fa-map-marker-alt m-2 fw-bolder fs-5"></i><?= $this->Model->get_setting('site_address','Bujumbura'); ?></li>
                    <li><i class="fas fa-phone-alt m-2 fs-5"></i><?= $this->Model->get_setting('site_phone','+257000000'); ?></li>
                    <li><i class="fas fa-envelope m-2 fs-5"></i> <?= $this->Model->get_setting('site_email','info@gmail.com'); ?></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- COPYRIGHT -->
    <div class="footer-bottom text-center py-3 mt-4" style="background-color:#041f3d;">
        &copy; <span id="date"></span> Urumuri ICSB. Tous droits réservés.
    </div>
</footer>



<script>
    document.getElementById('date').textContent = new Date().getFullYear();
</script>


-




    <!-- scroll-top -->
    <a href="#" id="scroll-top"><i class="far fa-arrow-up-from-arc"></i></a>
    <!-- scroll-top end -->
    
    <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Slick JS -->
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>


    <!-- js -->
    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="<?= base_url()?>assets/frontend/js/jquery-3.7.1.min.js"></script>
    <script src="<?= base_url()?>assets/frontend/js/modernizr.min.js"></script>
    <script src="<?= base_url()?>assets/frontend/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url()?>assets/frontend/js/imagesloaded.pkgd.min.js"></script>
    <script src="<?= base_url()?>assets/frontend/js/jquery.magnific-popup.min.js"></script>
    <script src="<?= base_url()?>assets/frontend/js/isotope.pkgd.min.js"></script>
    <script src="<?= base_url()?>assets/frontend/js/jquery.appear.min.js"></script>
    <script src="<?= base_url()?>assets/frontend/js/jquery.easing.min.js"></script>
    <script src="<?= base_url()?>assets/frontend/js/owl.carousel.min.js"></script>
    <script src="<?= base_url()?>assets/frontend/js/counter-up.js"></script>
    <script src="<?= base_url()?>assets/frontend/js/wow.min.js"></script>
    <script src="<?= base_url()?>assets/frontend/js/main.js"></script>
    <script type="text/javascript"></script>

    <script>
$(document).ready(function(){
    // Configuration Slider Partenaires
    $('.partners-slider').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: false,
        responsive: [
            { breakpoint: 1024, settings: { slidesToShow: 3 } },
            { breakpoint: 600, settings: { slidesToShow: 2 } }
        ]
    });

    // Configuration Slider Témoignages
    $('.testimony-slider').slick({
        dots: true,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        arrows: true,
        responsive: [
            { breakpoint: 1024, settings: { slidesToShow: 2 } },
            { breakpoint: 768, settings: { slidesToShow: 1, arrows: false } }
        ]
    });
});
    </script>

</body>
</html>