<table class="table table-striped">
  <thead>
    <tr>
      @foreach($columns as $column_id => $column_name)
      <th scope="col">{{$column_name}}</th>
      @endforeach
        <th scope="col">-</th>
    </tr>
  </thead>
  <tbody>
      @if(empty($records))
      <tr>
            <td colspan="{{count($columns)}}">
                 Нет записей           
            </td>
      </tr>
      @else
          @foreach($records as $record)
          <tr>
            @foreach($columns as $id => $column_name)
                @if ($loop->first)
                   <th scope="row">{{$record->$id}}</th>
                @else
                   <td>{{$record->$id}}</td>
                @endif     
             @endforeach    
             <!-- ссылки для редактирования -->
             <td style="width: 200px;">
               <a href="{{route($edit_route,[$record_route_id => $record])}}">Редактировать</a>

               <form id="form-id-{{$record->id}}" action="{{ route($delete_route,[$record_route_id => $record]) }}" method="post">
                  {{ method_field('DELETE') }}
                  {{ csrf_field() }} 

                  <a class="text-danger" href="#" onclick="document.getElementById('form-id-{{$record->id}}').submit();">Удалить</a> 
              </form>
                     
             </td>

          </tr>   
          @endforeach
      @endif
  </tbody>
</table>

@if(!empty($records))
  @if(!empty($appends))
    {{ $records->appends($appends)->links() }}
  @else
    {{ $records->links() }}  
  @endif

@endif