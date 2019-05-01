@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Все новости</h1>
        </div>
    </div>
</div>
<div class="container">

     @component('components.news.list',['records'=>$records])@endcomponent
    
    <hr>

</div> <!-- /container -->

@endsection
