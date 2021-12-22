<footer class=" footer-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="footer-logo">
          <a href="index.html">
            <img src="{{asset('assets/img/tios.world-logo.png')}}">
          </a>
        </div>
        <div class="footer-about">
          <p>Making a diiference in the world - by<br> helping you switch to one sustaibale<br> order at a time. </p><br>
          <p>Brining everything sustainable in the <br>world under one roof.</p>
        </div>
      </div>
      <div class="col-lg-2">
        <div class="footer-important-link">
          <h6 class="text-uppercase font-weight-bold">About</h6>
          <ul class="list-unstyled mb-0">
            <li class="mb-2"><a href="#" class="text-muted">Vision</a></li>
            <li class="mb-2"><a href="#" class="text-muted">Team</a></li>
            <li class="mb-2"><a href="#" class="text-muted">Careers</a></li>
            <li class="mb-2"><a href="#" class="text-muted">Blogs</a></li>
            <li class="mb-2"><a href="#" class="text-muted">Supply Chain</a></li>
            <li class="mb-2"><a href="#" class="text-muted">Packaging</a></li>
            <li class="mb-2"><a href="#" class="text-muted">Become a seller with us</a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-2">
        <div class="footer-important-link">
          <h6 class="text-uppercase font-weight-bold">Products</h6>
          <ul class="list-unstyled mb-0">
            <li class="mb-2"><a href="#" class="text-muted">Collections</a></li>
            <li class="mb-2"><a href="#" class="text-muted">Categories</a></li>
            <li class="mb-2"><a href="#" class="text-muted">Brands</a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-2">
        <div class="footer-important-link">
          <ul class="footer-social-icon">
            <li><a href="#"><img src="{{asset('assets/img/insta.png')}}" alt=""> Instagram</a></li>
            <li><a href="#"><img src="{{asset('assets/img/whatsapp.png')}}" alt=""> Whatsapp</a></li>
            <li><a href="#"><i class="fa fa-facebook"></i> Facebook</a></li>
            <li><a href="#"><i class="fa fa-twitter"></i> Twitter</a></li>
            <li><a href="#"><i class="fa fa-youtube-play"></i> Youtube</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- Copyrights -->
<section class="copy-right-footer">
  <div class="container">
    <div class="row">
      <div class="footer-copy-right-text col-md-8">
        <p class="text-muted">© 2021 Developed by AanaxagorasR </p>
      </div>
      <div class="footer-trems col-md-4">
        <div class="term ">
          <h4><a href="terms-and-conditions.html">Terms & Conditions</a></h4>
          <h4><a href="privacy-policy.html">Privacy Policy</a></h4>
        </div>
      </div>
    </div>
  </div>

</section>
<!--All js cdn-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.1/owl.carousel.min.js"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>

<script type="text/javascript">
  window.addEventListener("scroll", function() {
    var nav = document.querySelector("nav");
    nav.classList.toggle("sticky", window.scrollY > 0);
  })
</script>


</body>

</html>