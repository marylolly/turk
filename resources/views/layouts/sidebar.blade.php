<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
   <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Дивная Турция</title>

  <link rel="stylesheet" type="text/css" href="{{asset('media/css/style.css')}}"/>

  <!-- Bootstrap core CSS -->
  <link href="{{asset('media/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{asset('media/css/sidebar.css')}}" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar1">
   <div class="container">
     <img src="{{asset('media/img/logo1.png')}}" width="29%">
     <img src="{{asset('media/img/siluet1.png')}}" width="65%" id="sil">
<div class="topmenu1">
          
<nav>
  <ul class="topmenu1">
      @component('components.category-menu',['categories'=>$categories])@endcomponent
      
      

        </ul> 
</nav>
   </div>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    
    <!-- Content Row -->
    <div class="row">

      <!-- Sidebar Column -->
      <div class="col-lg-3 mb-4">
      <br><br>
         @include('layouts.left-menu')
      </div>
      <!-- Content Column -->
      <div class="col-lg-9 mb-4">


         <!-- Blog Post -->
<br>    
<main class="main-content" role="main">
    @yield('content')
</main>



    

  </div>
</div>
</div>


  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
