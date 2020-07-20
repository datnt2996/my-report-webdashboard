@extends('master')
@section('main')

<div class="panel-body">
    <div class="table-responsive" id="tag_container">
        <!-- <button id="btnPassedFilter" onclick="passedFilter();" >Đã xong</button> -->
    <a href="{{route('events.status',['status'=>'pass'])}}"> Đã Xong</a>
        <a href="{{route('events.status',['status'=>'current'])}}"> Đang Diễn Ra </a>
        <a href="{{route('events.status',['status'=>'future'])}}"> Dự Kiến </a>
        <legend>
            <h1>{{$status}}</h1>

        </legend>
        <table class="table">
            <thead>
                <tr>
                    <th>Tên sự kiện</th>
                    <th>Trạng thái</th>
                    <th>Thời gian</th>
                    <th>Địa điểm</th>
                    <th>Hình ảnh</th>
                    <th>Nội dung</th>
                    <th>Số lượng tham gia tối đa</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                <tr>
                    <td>{{$event->name}}</td>
                    <td>{{$event->status}}</td>
                    <td>{{$event->startTime}} </br><b>đến</b> {{$event->endTime}}</td>
                    <td>{{$event->place}}</td>
                    <td>
                        @if(count($event->images) > 0)
                        @foreach($event->images as $image)
                        <!-- //@if($image != "") -->
                        <img src="{{$image}}" class="img-thumbnail" alt="Cinque Terre">
                        <!-- @endif -->
                        @endforeach
                        @else
                        <img width="100px" height="100px" src="{{asset('image/default_image.png')}}" class="img-thumbnail" alt="Cinque Terre">
                        @endif
                    </td>

                    <td>{{$event->content}}</td>
                    <td>{{$event->joinable}}</td>

                    <td width="10%">
                        <a href="{{ route('event.edit',$event->_id) }}">
                            <div class="alert alert-info" role="alert">
                                Sửa
                            </div>
                        </a>
                        <form method="POST" action="{{ route('event.delete',$event->_id)}}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <div class="form-group">
                                <input type="submit" onclick="return confirm('Bạn có chắc chắn xóa?')" class="col-xs-11 btn btn-danger delete-article" value="Xóa">
                            </div>
                        </form>
                        {{-- {{ Form::open(array('route'=>array('activity.destroy',$event->_id),'method'=>'DELETE')) }}
                        <input type="submit" onclick="return confirm('Bạn có chắc chắn xóa?')" class="col-xs-11 btn btn-danger delete-article" value="Xóa">
                        {{ csrf_field() }}
                        {{ Form::close() }} --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- $article->links() -->
    </div>
    <!-- /.table-responsive -->
</div>

@stop