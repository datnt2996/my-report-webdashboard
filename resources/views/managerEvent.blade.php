@extends('master')
@section('main')

<div class="panel-body">
    <div class="table-responsive" id="tag_container">
    <div>
        <a href="{!! route('event.create') !!}" class="btn btn-success">Thêm hoạt động mới</a>
    </div>
</legend>
<table class="table">
    <thead>
        <tr>
            <th>Tên sự kiện</th>
            <th>Thời gian</th>
            <th>Địa điểm</th>
            <th>Hình ảnh</th>
            <th>Số lượng tham gia tối đa</th>
            <th>Lượt đánh giá</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($events->data as $event)
        <tr>
            <td>{{$event->title}}</td>
            
            <td>{{$event->time_start}} </br><b>đến</b> {{$event->time_end}}</td>
            <td>@if($event->represent_position){{$event->represent_position}} @endif</td>

            <td>
                @if($event->event_image)
                    <img width="100px" height="100px" src="{{ $event->event_image[0]->src }}" class="img-thumbnail" alt="Cinque Terre">
                @else
                    <img width="100px" height="100px" src="{{asset('image/default_image.png')}}" class="img-thumbnail" alt="Cinque Terre">
                @endif
            </td>

            <td>@if($event->total_person){{$event->total_person}}@else {{ 0 }} @endif</td>
            <td>@if($event->total_star){{$event->total_star}}@else {{ 0 }}  @endif</br><b>trên số sao: </b> @if($event->total_rate){{$event->total_rate}} @else {{ 0 }} @endif</td>

            <td width="10%">
                <a href="{{route('event.edit',['id'=>$event->_id])}}">
                    <div class="alert alert-info" role="alert">
                        Sửa
                    </div>
                </a>
                

                <form method="POST" action="{{ route('event.destroy',$event->_id)}}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <div class="form-group">
                        <input type="submit"  onclick="return confirm('Bạn có chắc chắn xóa?')" class="col-xs-11 btn btn-danger delete-article" value="Xóa">
                    </div>
                </form>
                {{-- {{ Form::open(array('route'=>array('event.destroy',$event->_id),'method'=>'DELETE')) }}
                    <input type="submit"  onclick="return confirm('Bạn có chắc chắn xóa?')" class="col-xs-11 btn btn-danger delete-article" value="Xóa">
                    {{ csrf_field() }}
                {{ Form::close() }} --}}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="{{ route('events.status', $events->from - 1) }}">Previous</a>
                </li>

                <li class="page-item">
                    <a class="page-link" href="{{ route('events.status', $events->from + 1) }}">Next</a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- /.table-responsive -->
</div>

@stop