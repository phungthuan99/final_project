  <!-- Start footer -->
  <footer class="footer">
    <div class="footer__mid pt-0">
        <div class="container">
            <div class="row">
                @foreach ($settings as $setting)
                <div class="col-md-6">
                  <div id="fb-root"></div>
                  {!!$setting->fanpage!!}
                </div>
                @endforeach
               <div class="col-md-4">
                   <div class="footer__mid-item">
                      @foreach($settings as $setting)
                          <img src="storage/{{$setting->logo}}" alt="">
                          <p>{{$setting->slogan}}</p>
                          <p><i class="fa fa-map-marker"></i>{{$setting->address}}</p>
                          <p><i class="fa fa-phone"></i><a href="tel:0123456789">{{$setting->phone}}</a></p> 
                      @endforeach
                  </div>
               </div>
            </div>
        </div>
    </div>
    <div class="footer__bottom d-flex">
        <div class="container">
            <div class="row align-items-center justify-content-between h-100">
                <div class="col-8">
                    <p class="copyright footer-text">© Copyrights by Something English Center</p>
                </div>
                <div class="col-2">
                    <div class="footer__socialMedia">
                        <a href="">
                            <i class="fa fa-facebook-f"></i>
                        </a>
                        <a href="">
                            <i class="fa fa-youtube-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End footer -->
</div>

<!-- Javascript -->
<script src="/js/jquery.min.js"></script>
<script src="/plugins/bootstrap4/bootstrap.min.js"></script>
<script src="/plugins/carousel/owl.carousel.min.js"></script>
<script src="/plugins/box/jquery.fancybox.min.js"></script>
<script src="/plugins/animation/wow.min.js"></script>
<script src="/js/main.js"></script>
<script>

</script>
</body>

</html>