@extends('layouts.app') {{-- директива указывает что нужно это представление(view) расширяет шаблон app в папке layouts --}}
@section('content')  {{-- эта дериктива указывает что всё что внутри является содержимым шаблона --}}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>{{$title}}</h1>

                <!-- нужно для сообщений -->
                @component('components.flash-message')@endcomponent
                
                    
             
                <form method="POST" action="{{$form_action}}" style="margin-left: -15px;">
                @csrf
                {{-- если редактирование - нужно чтобы ларавел обработал запрос как PUT --}}
                @if(!empty($record))
                    @method('PUT')
                @endif

                   <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="title">Заголовок</label>  
                      <div class="col-md-5">
                      <input id="title" name="name" value="{{ old('name', empty($record) ? '' : $record->name) }}" type="text" placeholder="Введите заголовок" class="form-control input-md" required="">
                      <span class="help-block"></span>  
                      </div>
                    </div>

                    <!-- Select Basic -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="category_id">Родительская Категория</label>
                        <div class="col-md-5">
                          <select id="category_id" name="category_id" class="form-control">
                            @php 
                              $selected_category_id = old('category_id', empty($record) ? null : $record->category_id);

                            @endphp

                            <option value="0" >Нет</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}" @if($selected_category_id == $category->id ) selected="" @endif>{{$category->name}}</option>
                            @endforeach
                           
                          </select>
                        </div>
                    </div>
                    <!-- Button -->
                    <div class="form-group">
                      <div class="col-md-4">
                        <button  type="submit" id="subm" name="subm" class="btn btn-primary">@if(empty($record)) Добавить @else Изменить @endif</button>
                      </div>
                    </div>

               </form>
          </div>
    </div>
</div>
@endsection
