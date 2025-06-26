<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
   @include('home.css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Notyf CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
</head>

<body style="background-color: #000000 !important; color: #ffffff !important;">
  
    <!-- header section strats -->
    @include('home.header')

    <!-- end header section -->
    <!-- slider section -->
    @include('home.slider')
   
    <!-- end slider section -->
  
  <!-- end hero area -->

  <!-- shop section -->

  @include('home.shop_selection')

  <!-- end shop section -->

  <!-- contact section -->

  <!-- @include('home.contact') -->

  <!-- end contact section -->

   

  <!-- info section -->

    <!-- footer section -->
    @include('home.footer')
    <!-- footer section -->

  </section>

  <!-- end info section -->


  <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.js') }}"></script>
  <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js') }}">
  </script>
  <script src="{{ asset('js/custom.js') }}"></script>





  <!-- SHop_selection's Script -->
  <!-- Notyf JS -->
  <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

  @include('home.cartJS')
  
  <!-- Initialize Bootstrap components after all scripts are loaded -->
  <script>
    $(document).ready(function() {
      // Reinitialize the carousel for automatic sliding only
      if (typeof bootstrap !== 'undefined' && document.getElementById('heroCarousel')) {
        var heroCarousel = new bootstrap.Carousel(document.getElementById('heroCarousel'), {
          interval: 3000,
          wrap: true,
          touch: false,
          keyboard: false,
          pause: false // Don't pause on hover
        });
        
        // Force start the carousel
        heroCarousel.cycle();
      }
    });
  </script>
</body>

</html>