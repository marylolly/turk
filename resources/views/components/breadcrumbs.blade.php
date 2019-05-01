
@if(!empty($records))
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    @foreach($records as $href=>$label)
        @if($loop->last)
           <li class="breadcrumb-item" aria-current="page">{{$label}}</li>
        @else
            <li class="breadcrumb-item"><a href="{{$href}}">{{$label}}</a></li>
        @endif
    @endforeach 
  </ol>
</nav>
@endif