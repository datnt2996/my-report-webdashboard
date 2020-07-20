@extends('master')
@section('main')

<div>
    <!--for demo wrap-->
    <div>
        <div class="d-flex justify-content-between">
            <h1>Xem tất cả bài viết</h1>
            <div>
                <a href="{!! route('article.create') !!}" class="btn btn-success">Thêm bài viết mới</a>
            </div>
        </div>
    </div>
    <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
                <tr>
                    <th width="30%">Image</th>
                    <th width="40%">Title</th>
                    <!-- <th width="20%">Description</th>
                    <th width="20%">Content</th> -->
                    <th width="20%">TimeUpLoad</th>
                    <th width="10%"></th>
                    <!-- <th width="10%">Action</th> -->
                </tr>
            </thead>
        </table>
    </div>
    <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
                @foreach($article as $articles)
                <tr>
                    <td width="30%">
                        @if(!empty($articles->image))
                        <img src="{{$articles->image}}" class="img-thumbnail" alt="Cinque Terre">
                        @else
                        <img width="100px" height="100px" src="{{asset('image/default_image.png')}}"
                            class="img-thumbnail" alt="Cinque Terre">
                        @endif
                    </td>
                    <td width="40%">
                        <h5>{{$articles->title}}</h5>
                    </td>
                    <!-- <td width="20%">
                        <p class="limit_text">{{$articles->description}}</p>
                    </td>

                    <td width="30%">
                        <p class="limit_text">{{$articles->content}}</p>
                    </td> -->
                    <td width="20%">
                        <p class="limit_text">{{$articles->timeUpload}}</p>
                    </td>
                    <td width="10%">
                        <a href="{{ route('article.edit',$articles->_id) }}">
                            <div class="alert alert-info" role="alert">
                                Sửa
                            </div>
                        </a>
                        <form method="POST" action="{{ route('article.destroy',$articles->_id)}}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <div class="form-group">
                                <input type="submit" onclick="return confirm('Bạn có chắc chắn xóa?')"
                                    class="col-xs-11 btn btn-danger delete-article" value="Xóa">
                            </div>
                        </form>
                        {{-- {{ Form::open(array('route'=>array('article.destroy',$articles->_id),'method'=>'DELETE')) }}
                        <input type="submit" onclick="return confirm('Bạn có chắc chắn xóa?')"
                            class="col-xs-11 btn btn-danger delete-article" value="Xóa">
                        {{ csrf_field() }}
                        {{ Form::close() }} --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.table-responsive -->
</div>
@stop