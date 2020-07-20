
@extends('master')
@section('main')

<h1>Coming soon ...</h1>

div class="panel panel-primary" style="margin-top:50px">
            <form method="POST" action="{{ route('event.update',$event->_id)}}"  enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                

                <textarea class="form-control" rows="3" name="name" >{{$event->name}}</textarea><br/>
                <table>
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
            </table>
        </form>
</div>


@stop
