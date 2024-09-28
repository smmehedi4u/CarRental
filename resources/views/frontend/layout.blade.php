<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('Car Rental Web Application')</title>
    <base href="/public">
    <!-- basic -->
    @include('frontend.style');
</head>
<body>
    <!-- header section start -->
    <div class="header_section">
        @include('frontend.header');
     </div>
     <!-- header section end -->

    <!-- Main Content -->
    <div class="container">
        @yield('content')
    </div>


      <!-- footer section start -->
      @include('frontend.footer');
      <!-- footer section end -->
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">2020 All Rights Reserved. Design by <a href="https://html.design">Free html  Templates</a></p>
         </div>
      </div>
      @include('frontend.script');

</body>
</html>
