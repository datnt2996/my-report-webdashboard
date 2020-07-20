@extends('master')
@section('main')
<div class="panel panel-primary">
    <div class="panel-body">

        <form action="{!! route('event.store') !!}" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <h1>Tạo Sự Kiện Mới</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Tên Sự Kiện:</label>
                    <input class="form-control" name="title">
                    @if($errors->has('title'))
                        <p style="color: red">{{$errors->first('title')}}</p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Số điện thoại:</label>
                    <input class="form-control" name="numberPhone">
                    @if($errors->has('numberPhone'))
                        <p style="color: red">{{$errors->first('numberPhone')}}</p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Tên nhà tổ chức:</label>
                    <input class="form-control" name="organizationName">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Địa chỉ đại diện:</label>
                    <input class="form-control" name="address">
                    @if($errors->has('address'))
                        <p style="color: red">{{$errors->first('address')}}</p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Địa điểm:</label>
                    <input class="form-control" name="representPosition">
                    @if($errors->has('representPosition'))
                        <p style="color: red">{{$errors->first('representPosition')}}</p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Danh mục:</label>
                    <select class="form-control" name="category">
                        @foreach($categories as $category)
                            <option value="{{$category->_id}}">
                                {{ $category->title }}
                            </option>
                        @endforeach
                    </select>
                    @if($errors->has('category'))
                        <p style="color: red">{{$errors->first('category')}}</p>
                    @endif
                </div>
            </div>
            <h5>Thời Gian Của Sự Kiện</h5>

            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Ngày bắt đầu</label>
                        <div class="input-group date_start" id="datepicker_registered_start">
                    
                            <input name="timeStart" class="form-control" /><span class="input-group-append input-group-addon"><span class="input-group-text"><i class="fa fa-calendar"></i></span></span>
                            
                        </div>
                        </div>
                        @if($errors->has('timeStart'))
                                <p style="color: red">{{$errors->first('timeStart')}}</p>
                        @endif
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Ngày kết thúc</label>
                        <div class="input-group date" id="datepicker_registered_end">
                            <input name="timeEnd" class="form-control" /><span class="input-group-append input-group-addon"><span class="input-group-text"><i class="fa fa-calendar"></i></span></span>
                           
                        </div>
                        </div>
                        @if($errors->has('timeEnd'))
                                <p style="color: red">{{$errors->first('timeEnd')}}</p>
                            @endif
                </div>
            </div>
            Mô tả sự kiện: 
            <textarea name="description" id="description" >This is description ...</textarea>
            @if($errors->has('description'))
            <p style="color: red">{{$errors->first('description')}}</p>
            @endif
            <script>
                CKEDITOR.replace( 'description',{ filebrowserBrowseUrl: '/browser/browse.php'
                                ,filebrowserUploadUrl: '/uploader/upload.php'});
                var data = CKEDITOR.instances.text.getData();
            </script>

           
            <div class="row">
                <div class="col-md-3">
                    <input type="file" id='image' name="image" onchange="readURL(this);"> <br />
                    <img id="blah" height="150px" src="{{asset('image/upload_photo.png')}}" alt="your image" /><br /> <br/>
                    @if($errors->has('image'))
                    <p style="color: red">{{$errors->first('image')}}</p>
                    @endif
                </div>
                <div class="col-md-9">
                    Số lượng người tham gia: <input type="number" class="form-control" value="50" name="totalPerson"><br />
                    @if($errors->has('totalPerson'))
                        <p style="color: red">{{$errors->first('totalPerson')}}</p>
                    @endif
                    Giá tham gia: <input type="number" class="form-control" name="price" value="0"><br />
                    @if($errors->has('totalPerson'))
                        <p style="color: red">{{$errors->first('price')}}</p>
                    @endif
                </div>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            {{-- @csrf
            <input type = "hidden" name="_token" value="{{ csrf_field() }}" > --}}
            @if($errors->has('errorUpload'))
                <p style="color: red">{{$errors->first('errorUpload')}}</p>
            @endif
            <button type="submit" class="btn btn-success mt-5 mb-3" style="width: 150px">Tạo hoạt động</button>
        </form>
    </div>
</div>
<script type="text/javascript" src="{{asset('bootstrap-datetimepicker-master/sample in bootstrap v3/jquery/jquery-1.8.3.min.js')}}" charset="UTF-8"></script>
<script type="text/javascript" src="{{asset('bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.min.js')}}"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/eonasdan-bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js'></script>
<script src="./script.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js'></script>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css'>

<script type="text/javascript">
    if (/Mobi/.test(navigator.userAgent)) {
        // if mobile device, use native pickers
        $(".date_end input").attr("type", "date");
        $(".time_end input").attr("type", "time");
    } else {
        // if desktop device, use DateTimePicker
        $("#datepicker_start").datetimepicker({
            useCurrent: true,
            format: "LL",
            icons: {
                next: "fa fa-chevron-right",
                previous: "fa fa-chevron-left"
            }
        });
        $("#timepicker_start").datetimepicker({
            useCurrent: true,
            format: "LT",
            icons: {
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down"
            }
        });
        $("#datepicker_end").datetimepicker({
            useCurrent: true,
            format: "LL",
            icons: {
                next: "fa fa-chevron-right",
                previous: "fa fa-chevron-left"
            }
        });
        $("#timepicker_end").datetimepicker({
            useCurrent: true,
            format: "LT",
            icons: {
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down"
            }
        });
        $("#datepicker_registered_start").datetimepicker({
            useCurrent: true,
            format: "DD-MM-YYYY HH:mm:ss",
            icons: {
                next: "fa fa-chevron-right",
                previous: "fa fa-chevron-left"
            }
        });
        $("#timepicker_registered_start").datetimepicker({
            useCurrent: true,
            format: "LT",
            icons: {
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down"
            }
        });
        $("#datepicker_registered_end").datetimepicker({
            useCurrent: true,
            format: "DD-MM-YYYY HH:mm:ss",
            icons: {
                next: "fa fa-chevron-right",
                previous: "fa fa-chevron-left"
            }
        });
        $("#timepicker_registered_end").datetimepicker({
            useCurrent: true,
            format: "LT",
            icons: {
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down"
            }
        });
    }
</script>
@endsection
