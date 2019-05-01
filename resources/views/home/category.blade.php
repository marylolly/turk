@extends('layouts.sidebar')
@php 

$breadcrumbs = [
    '/'=>'Главная',
    // '/'.$record->alias=>$record->name
];
if(!empty($record->parent_category)){
    $breadcrumbs['/'.$record->parent_category->alias]= $record->parent_category->name;
}
$breadcrumbs['/'.$record->alias] = $record->name;

@endphp
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>{{$record->name}}</h1>
            @component('components.breadcrumbs',['records'=>$breadcrumbs])@endcomponent
        </div>
    </div>
</div>
<div class="container">
    @component('components.news.list',['records'=>$news])@endcomponent
    <hr>

</div> <!-- /container -->

@endsection
