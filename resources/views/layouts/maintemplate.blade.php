<!DOCTYPE html>
<html lang="en">
<head>
  @include('includes.header')
</head>
<body>
<div class="preloader loader" style="display: block; background:#f2f2f2;"> <img src="Forntend/image/loader.gif"  alt="#"/></div>
<!--Navbar Section-->
@include('includes.navbar')

<!--All page body section-->
@yield('bodycontent')



<!--Footer section-->
 @include('includes.footer')
</body>
</html>

