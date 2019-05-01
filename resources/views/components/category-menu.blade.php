

<li class="item item-1"><a href="{{asset('/')}}">Главная</a></li>

@if(!empty($categories))
@foreach($categories as $category)
  @if($category->has_children)

<li class="item item-2">
    <a 
    id="navbarDropdown-{{$category->id}}" 
    class="nav-link dropdown-toggle @if($category->active) @endif"  
    href="/{{$category->alias}}"
    role="button" 
        aria-haspopup="true" 
    aria-expanded="false" 
    v-pre
    >
    {{$category->name}}
     
         
    </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown-{{$category->id}}">

                @foreach($category->children as $child)
                   <a class="dropdown-item" href="/{{$child->alias}}">{{$child->name}}</a>
                @endforeach
                
            </div>
  </li> 
  @else
  <li class="item item-2">
    <a class="nav-link @if($category->active) @endif" href="/{{$category->alias}}">{{$category->name}}</a>
  </li>  
  @endif
@endforeach
@endif
{{-- <li class="item item-2">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li> --}}  