<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Дивная Турция - главная страница</title>
  <link rel="stylesheet" type="text/css" href="{{asset('media/bootstrap/css/bootstrap.min.css')}}"/>
  <link rel="stylesheet" type="text/css" href="{{asset('media/css/style.css')}}"/>
  
  @section ('styles')
  @show
  @section ('scripts')
  <script src="{{asset('js/app1.js')}}">  
  </script>
  <script type="text/javascript" src="https://vk.com/js/api/openapi.js?160"></script>

  

  @show
</head>
<body>

<div id="gallery">
       <div class="photo">
         <img src="{{asset('media/img/sl1.jpg')}}" class="shown"></img>
         <img src="{{asset('media/img/sl2.jpg')}}"></img>
         <img src="{{asset('media/img/sl4.jpg')}}"></img>
           <div id="poloska">
         <div class="tabs">
            <div class="rec" onclick="galleryspin('1')"></div>
            <div class="rec" onclick="galleryspin('2')"></div>
            <div class="rec" onclick="galleryspin('3')"></div>
        </div>
       </div>
       </div>

     
       
        
   </div>

   <div id="logo">
     <img src="{{asset('media/img/logo1.png')}}" width="350px">
   </div>
<nav>
	<ul class="topmenu">
      @component('components.category-menu',['categories'=>$categories])@endcomponent
      
      


        </ul> 
</nav>
   



<div class="col-md-12">
<h2>Публикации</h2>
<hr>
</div>
    <div class="row">
    @foreach($records as $record)
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
                 <a href="{{$record->alias}}"><img class="card-img-top" class="product" src="{{$record->preview_url}}"></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="{{$record->alias}}">{{$record->title}}</a>
            </h4>
            <p class="card-text">{{$record->description}}</p>
          </div>
          <div class="card-footer">
            <a href="{{$record->alias}}" class="btn btn-primary">Learn More</a>
          </div>
        </div>
      </div>
      @endforeach
      
        </div>


      </div>
      </div>



    <div class="row">
      <div class="col-lg-4 col-sm-6 portfolio-item">
      
        <div class="card h-100">
        <h2>Добро пожаловать</h2>
                  <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="#">Project One</a>
            </h4>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt, illum tempora ex quae? Nihil, dolorem!ipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt, illum tempora ex quae? Nihil,</p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary">Learn More</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
     
        <div class="card h-100">
         <h2>Комментарии</h2>
         <div class="card-body">
            <table class="comm1">
            <tr><td><h4>
              <a href="#">Статья 1</a>
            </h4></td></tr>
            	<tr>
            	<td valign="top">
            		<a href="#"><img class="card1" src="http://placehold.it/700x400" alt=""></a>
            	</td>
            	<td>  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt, illum tempora ex quae? Nihil, dolorem!</p></td>
            	</tr><hr>

            </table>

            <table class="comm1">
            <tr><td><h4>
              <a href="#">Статья 2</a>
            </h4>
            </td></tr>
            	<tr>
            	<td valign="top">
            		<a href="#"><img class="card1" src="http://placehold.it/700x400" alt=""></a>
            	</td>
            	<td>  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt, illum tempora ex quae? Nihil, dolorem!</p></td>
            	</tr><hr>

            </table>

         </div>   

   
  
          <div class="card-footer">
            <a href="#" class="btn btn-primary"><</a>
            <a href="#" class="btn btn-primary">></a>
          </div>
        </div>
      </div>
     <div class="col-lg-4 col-sm-6 portfolio-item">
     
        <div class="card h-100">
         <h2>Новости</h2>
         <div class="card-body">
          @foreach($rec as $record)
            <table class="comm1">
            <tr><td colspan="2"><h4>
              <a href="#">{{$record->title}}</a>
            </h4></td></tr>
            	<tr>
            	<td valign="top"  class="card1 c2">
            		<a href="#">{{$record->created_at}}</a>
            	</td>
            	<td>  <p class="card-text">{{$record->description}}</p></td>
            	</tr><hr>
            </table>
            @endforeach

            
         </div>   


           <div class="card-footer">
            <a href="#" class="btn btn-primary">Больше</a>
          </div>

   
  
        </div>
      </div>
        </div>

        
      </div>
      </div>

      <div class="row">
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <div class="card-body">
            <!-- VK Widget -->
<div id="vk_groups"></div>
<script type="text/javascript">
VK.Widgets.Group("vk_groups", {mode: 4, wide: 1, height: "400", color3: 'CD0F64'}, 181666713);
</script>
          </div>
         </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
     
        <div class="card h-100">
           <div class="card-body">
            <iframe style="width:100%;border:0;overflow:hidden;background-color:transparent;height:400px" scrolling="no" src="https://fortrader.org/informers/getInformer?st=8&cat=7&title=%D0%9A%D1%83%D1%80%D1%81%D1%8B%20%D0%B2%D0%B0%D0%BB%D1%8E%D1%82&texts=%7B%22toolTitle%22%3A%22%D0%92%D0%B0%D0%BB%D1%8E%D1%82%D0%B0%22%2C%22todayCourse%22%3A%22%22%7D&mult=1&showGetBtn=0&hideHeader=0&hideDate=0&w=0&codes=1&colors=false&items=2%2C21%2C47%2C11111&columns=todayCourse&toCur=14"></iframe>
         </div>   

   
        </div>
      </div>
     <div class="col-lg-4 col-sm-6 portfolio-item">
     
        <div class="card h-100">
          <div class="card-body" align="center">
            <!-- weather widget start --><a target="_blank" href="https://nochi.com/weather/istanbul-18319,17469,893,18522"><img src="https://w.bookcdn.com/weather/picture/2_18319,17469,893,18522_1_20_887ddd_270_ffffff_333333_08488D_1_ffffff_333333_0_6.png?scode=2&domid=589&anc_id=58238"  alt="booked.net"/></a><!-- weather widget end -->
   
  
        </div>
      </div>
        </div>

        
      </div>
      </div>


 

<div id="preloader_malc">
</div>
<div>
	<img src="{{asset('media/img/logo1.png')}}" width="350px" id="preloader">

</div>


@section ('scripts')



<footer class="container">
  <p>&copy; Company 2017-2019</p>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script> 
<script src="{{asset('js/slider.js')}}">  
</script>
<script src="{{asset('js/preloader.js')}}">  
</script>   
     
</body>
</html>
