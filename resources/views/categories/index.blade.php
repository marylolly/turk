@extends('layouts.app') {{-- директива указывает что нужно это представление(view) расширяет шаблон app в папке layouts --}}
@section('content')  {{-- эта дериктива указывает что всё что внутри является содержимым шаблона --}}
<div class="container">
    <div class="row">
        <div class="col-md-12">   
            <h1>Список категорий</h1>
            <!-- нужно для сообщений -->
            @component('components.flash-message')@endcomponent
            
            @component('components.record-list',
                [
                    'columns'=>[
                        'id'=>'id',
                        'name'=>'Заголовок',
                        'parent_name'=>'Родитель',
                        'created_at'=>'Создана',
                        'updated_at'=>'Изменена',
                    ],
                    'records'=> $records,
                    'delete_route'=>'categories.destroy',
                    'edit_route'=>'categories.edit',
                    'record_route_id'=>'category',
                    'appends'=>[],
                ]
            )@endcomponent
        </div>
    </div>
</div>
@endsection
