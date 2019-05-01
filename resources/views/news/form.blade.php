@extends('layouts.app') {{-- директива указывает что нужно это представление(view) расширяет шаблон app в папке layouts --}}
@section('content')  {{-- эта дериктива указывает что всё что внутри является содержимым шаблона --}}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>{{$title}}</h1>

                <!-- нужно для сообщений -->
                @component('components.flash-message')@endcomponent
                
                    
             
                <form method="POST" action="{{$form_action}}" style="margin-left: -15px;"  enctype="multipart/form-data">
                @csrf
                {{-- если редактирование - нужно чтобы ларавел обработал запрос как PUT --}}
                @if(!empty($record))
                    @method('PUT')
                @endif

                   <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="title">Заголовок</label>  
                      <div class="col-md-5">
                        <input id="title" name="title" value="{{ old('title', empty($record) ? '' : $record->title) }}" type="text" placeholder="Введите заголовок" class="form-control input-md" required="">
                        <span class="help-block"></span>  
                      </div>
                    </div>

                    <!-- Select Basic -->
                      <div class="form-group">
                        <label class="col-md-4 control-label" for="category_id">Категория</label>
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
                <!-- File Button --> 
                  <div class="form-group">
                    <label class="col-md-4 control-label" for="image">Изображение</label>
                    @if(!empty($record) && $record->has_image)
                    <div style="padding: 15px;">   
                       <img src="{{$record->preview_url}}" width="300" style="" />
                    </div>
                    @endif
                    <div class="col-md-4">
                      <input id="image" name="image" class="input-file" type="file">
                    </div>
                  </div>



              <!-- Textarea -->
              <div class="form-group">
                <label class="col-md-4 control-label" for="description">Краткое описание</label>
                <div class="col-md-12">                     
                  <textarea class="form-control"  required="" rows="4" id="description" name="description">{{ old('description', empty($record) ? '' : $record->description) }}</textarea>
                </div>
              </div>

               <!-- Textarea -->
              <div class="form-group">
                <label class="col-md-4 control-label" for="content">Содержимое</label>
                <div class="col-md-12">                     
                  <textarea class="form-control" id="ckeditor1" required="" rows="10" id="content" name="content">{{ old('content', empty($record) ? '' : $record->content) }}</textarea>
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
