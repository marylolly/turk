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

</div> <!-- /container -->


@endsection
