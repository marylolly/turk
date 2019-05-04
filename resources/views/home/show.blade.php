@extends('layouts.sidebar')

@section('content')

@php 

$breadcrumbs = ['/'=>'Главная'];


if(!empty($record->category->parent_category)){
    $breadcrumbs['/'.$record->category->parent_category->alias]= $record->category->parent_category->name;
}
if(!empty($record->category)){
    $breadcrumbs['/'.$record->category->alias]=$record->category->name;
}

$breadcrumbs['/'.$record->alias]=$record->title;
@endphp

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>{{$record->title}}</h1>
            @component('components.breadcrumbs',['records'=>$breadcrumbs])@endcomponent
        </div>
    </div>
</div>
<div class="container">
    @if($record->has_image)
      <img src="{{$record->detail_url}}" style="width: 100%;" />
    @endif

      {!!$record->content!!}
    <hr>
    <br><br>
@foreach($comments as $comment)
<p>{{$comment->user}}</p>
<p>{{$comment->created_at->format('d-m-Y')}}</p>
<p>{{$comment->comment}}</p>
@endforeach
<hr>
<br><br>
<form method="post" action="{!!route('comments.add')!!}">
    {!!csrf_field()!!}
    Никнейм<br>
    <input type="text" name="user"><br><br>
    <input type="hidden" value="{{$record->id}}" name="article_id">
    <p>Комментарий:</p>
    <textarea class="form-control" name="comment">    </textarea><br>
    <button type="submit" class="btn btn-success">Добавить комментарий</button>
</form>

</div> <!-- /container -->

@endsection
