

@if($records->count() == 0)         
  <div class="col-md-12 d-flex justify-content-center">        
        Нет новостей           
  </div>
@else
    @foreach($records as $record)
  <div class="card mb-4">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-3">
          @if($record->has_image)
            <a href="{{$record->alias}}">
              <img src="{{$record->preview_url}}" class="img-responsive"/>
            </a>
              @else 
           <a href="{{$record->alias}}">
              <img src="{{asset('media/img/nophoto.jpg')}}" class="img-responsive"/>
            </a>
           @endif
         
          </div>
          <div class="col-lg-9">
            <P class="title">{{$record->title}}</p>
            <p class="card-text">{{$record->description}}</p>
            <a class="btn btn-secondary" href="{{$record->alias}}" role="button">Подробнее &raquo;</a>
          </div>
        </div>
      </div>
      <div class="card-footer text-muted">
        Posted on [{{$record->created_at}}] 
      </div>
    </div>

      @endforeach
    {{$records->links()}}
@endif
