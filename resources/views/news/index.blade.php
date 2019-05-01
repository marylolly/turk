@extends('layouts.app') {{-- директива указывает что нужно это представление(view) расширяет шаблон app в папке layouts --}}
@section('content')  {{-- эта дериктива указывает что всё что внутри является содержимым шаблона --}}
<div class="container">
    <div class="row">
        <div class="col-md-12">   
            <h1>Список новостей</h1>
            <ul class="nav nav-pills mb-4">
                <li class="nav-item">
                    <a class="nav-link @if(empty($category_id)) active @endif" href="?">Все</a>
                </li> 
                @foreach($categories as $category)
                  <li class="nav-item">
                    <a class="nav-link @if($category->active) active @endif" href="?category_id={{$category->id}}">{{$category->name}}</a>
                  </li>  
                @endforeach
            </ul>

            <!-- нужно для сообщений -->
            @component('components.flash-message')@endcomponent
            
            @component('components.record-list',
                [
                    'columns'=>[
                        'id'=>'id',
                        'title'=>'Заголовок',
                        'category_name'=>'Категория',
                        'created_at'=>'Создана',
                        'updated_at'=>'Изменена',
                    ],
                    'records'=> $records,
                    'delete_route'=>'news.destroy',
                    'edit_route'=>'news.edit',
                    'record_route_id'=>'news',
                    'appends'=> request()->except('page'),
                ]
            )@endcomponent
        </div>
    </div>
</div>
@endsection
