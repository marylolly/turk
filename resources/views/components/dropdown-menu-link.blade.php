<li class="nav-item dropdown">
    <a id="navbarDropdown-{{$id}}" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{$title}} <span class="caret"></span>
    </a>

    <div class="dropdown-menu" aria-labelledby="navbarDropdown-{{$id}}">
        @foreach($sub as $href=>$label)
         <a class="dropdown-item" href="{{$href}}">{{$label}}</a>
        @endforeach   
    </div>
</li>