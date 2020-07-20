@extends('master')
@section('main')
<div class="panel panel-primary" style="margin-top:50px">
            <form method="POST" action="{{ route('article.update',$article->id)}}"  enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="panel-body">
                    <legend><h2 > Sửa Bài Viết </h2></legend>
                    Tiêu Đề Bài Đăng:
                <textarea class="form-control" rows="3" name="Title" >{{ $article->title }}</textarea><br/>
                    @if($errors->has('title'))
                    <p style="color: red">{{ $errors->first('title') }}</p>
                    @endif
                    Mô Tả Ngắn Gọn Bài Đăng: <br/>
                    <textarea class="form-control" rows="4" name = "Description" id="Description">{{ $article->description }}</textarea><br/>
                    @if($errors->has('description'))
                    <p style="color: red">{{$errors->first('description')}}</p>
                    @endif
                    Hình ảnh tiêu đề: <input type="file" id='image' name="image" onchange="readURL(this);"> <br />
                    <img id="blah" height="150px" src="{{asset('image/'.$article->image)}}" alt="your image" /><br /> <br/>
                    @if($errors->has('image'))
                    <p style="color: red">{{ $errors->first('image') }}</p>
                    @endif
                    Nội Dung Bài Đăng: <br/>
                    <textarea name="content" id="content" >{{$article->content}}</textarea>
                    @if($errors->has('content'))
                    <p style="color: red">{{$errors->first('content')}}</p>
                    @endif
                    <script>
                        CKEDITOR.replace( 'content',{ filebrowserBrowseUrl: '/browser/browse.php'
                                        ,filebrowserUploadUrl: '/uploader/upload.php'});
                        var data = CKEDITOR.instances.text.getData();
                    </script>
                </div>
                <div class="panel-footer">
                    <button type="submit" class="btn btn-primary">Sửa bài viết</button>
                </div>
        </form>
</div>
@stop
