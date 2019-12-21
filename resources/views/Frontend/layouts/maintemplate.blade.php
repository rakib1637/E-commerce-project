<!DOCTYPE html>
<html lang="en">
<head>
  @include('Frontend.includes.header')
</head>
<body>
<div class="preloader loader" style="display: block; background:#f2f2f2;"> <img src="{{asset('Forntend/image/loader.gif')}}"  alt="#"/></div>
<!--Navbar Section-->
@include('Frontend.includes.navbar')

<!--All page body section-->
@yield('bodycontent')



<!--Footer section-->
 @include('Frontend.includes.footer')
</body>
</html>

