<?php

namespace App\Http\Controllers;

use Validator;
use App\Helpers\ApiHelpers;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Cache;

class ManagerEventController extends Controller
{
	// public function show(){
	//     $data= 'test';
	//     return view('managerEvent',['data'=>$data]);
	// }
	protected $events, $url;
	public function __construct()
    {
		$this->url= env('URL_API','https://supper-event.herokuapp.com/');
		$this->events = [];
    }
	public function show(Request $request)
	{
		$ManagerID = Cache::get('auth_user');
		$bearerToken = Cache::get('auth_token');
        $options['headers']['Authorization'] = 'Bearer '.$bearerToken;
		$request = ApiHelpers::request($this->url, 'get', '/api/events.json?limit=10',$options);
		$data = json_decode($request->getBody());
		$this->events = $data->events;
		return view('/managerEvent')->with('events', $this->events);
	}

	public function showStatus($page)
	{
		$bearerToken = Cache::get('auth_token');
		if($page <= 0){
			$page = 1;
		}
        $options['headers']['Authorization'] = 'Bearer '.$bearerToken;
		$request = ApiHelpers::request($this->url, 'get', '/api/events.json?limit=10&page='.(int)$page,$options);
		$data = json_decode($request->getBody());
		$this->events = $data->events;
		return view('/managerEvent')->with('events', $this->events);
	}

	public function edit($id)
	{
		$ManagerID = Cache::get('auth_user');
		$request = ApiHelpers::request('http://tstudents.herokuapp.com', 'get', '/activity/'.$id);
		$data = json_decode($request->getBody());
		//dd($data);
		return view('/editEvent')->with('event', $data->data);
	}

	//destroy
	public function destroy($id)
	{
		$bearerToken = Cache::get('auth_token');
        $options['headers']['Authorization'] = 'Bearer '.$bearerToken;
        $request = ApiHelpers::request($this->url, 'delete', '/api/events/'.$id.'.json', $options);
        // dd($request->getStatusCode(), json_decode($request->getBody()), $request);
        return redirect()->route('events')->with('success', 'Xóa Bài Viết Thành Công!!!');
	}

	public function update(Request $request)
	{
		$ManagerID = Cache::get('auth_user');
		$request = ApiHelpers::request('http://tstudents.herokuapp.com', 'put', '/activity/pass');
		$data = json_decode($request->getBody());
		return view('/managerEvent')->with('events', $data->data);
	}

	public function index(Request $request)
	{
		$rule = [
			'title' => 'required',
			'numberPhone' => 'required',
			'organizationName' => 'required',
			'address' => 'required',
			'representPosition' => 'required',
			'category' => 'required',
			'timeStart' => 'required',
			'timeEnd' => 'required',
			'description' => 'required',
			'totalPerson' => 'required',
			'price' => 'required',
			'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
		];
		$massage = [
			'title.required' => 'Tiêu đề không được để trống',
			'numberPhone.required' => 'số điện thoại không được trống',
			'organizationName.required' => 'Tên nhà tổ chức không được để trống',
			'address.required' => 'Địa chỉ không được để trống',
			'representPosition.required' => 'Địa chỉ đại diện không được để trống',
			'category.required' => 'Danh mục không được để trống',
			'timeStart.required' => 'Thời gian bắt đầu không được để trống',
			'timeEnd.required' => 'Thời gian kết thúc không được để trống',
			'price.required' => 'Phí tham gia không được để trống',
			'description.required' => 'Mô tả không được để trống',
			'image.required' => 'Hình ảnh không được để trống',
			'image.image' => 'Bạn phải chọn hình ảnh',
			'image.mimes' => 'Bạn phải đúng định dạnh hình ảnh:jpeg,png,jpg,gif,svg',
			'image.max' => 'File hình ảnh không được lớn hơn 10 Mb',
		];
		$validator = Validator::make($request->all(), $rule, $massage);
		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator);
		}
	}

	public function create()
	{
		$request = ApiHelpers::request($this->url, 'get', '/api/category.json');
		$data = json_decode($request->getBody())->categories;

		return view('/addEvent')->with('categories', $data->data);
	}

	public function store(Request $request)
	{
		
		$rule = [
			'title' => 'required',
			'numberPhone' => 'required',
			'organizationName' => 'required',
			'address' => 'required',
			'representPosition' => 'required',
			'category' => 'required',
			'timeStart' => 'required',
			'timeEnd' => 'required',
			'description' => 'required',
			'totalPerson' => 'required',
			'price' => 'required',
			'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
		];
		$massage = [
			'title.required' => 'Tiêu đề không được để trống',
			'numberPhone.required' => 'số điện thoại không được trống',
			'organizationName.required' => 'Tên nhà tổ chức không được để trống',
			'address.required' => 'Địa chỉ không được để trống',
			'representPosition.required' => 'Địa chỉ đại diện không được để trống',
			'category.required' => 'Danh mục không được để trống',
			'timeStart.required' => 'Thời gian bắt đầu không được để trống',
			'timeEnd.required' => 'Thời gian kết thúc không được để trống',
			'price.required' => 'Phí tham gia không được để trống',
			'totalPerson.required' => 'Số lượng người tham gia không được để trống',
			'description.required' => 'Mô tả không được để trống',
			'image.required' => 'Hình ảnh không được để trống',
			'image.image' => 'Bạn phải chọn hình ảnh',
			'image.mimes' => 'Bạn phải đúng định dạnh hình ảnh:jpeg,png,jpg,gif,svg',
			'image.max' => 'File hình ảnh không được lớn hơn 10 Mb',
		];
		$validator = Validator::make($request->all(), $rule, $massage);
		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator);
		}
		$ManagerID = Cache::get('auth_user');
		$bearerToken = Cache::get('auth_token');

		$options['headers']['Authorization'] = 'Bearer '.$bearerToken;
		
		$image = $request->file('image');
		$fileName = 'tmp.'.$image->getClientOriginalExtension();
		$img = storage_path('app/tmp_images/'.$fileName);
		file_put_contents($img, file_get_contents($image));
				
		$optionIMG = [
			'multipart' => [
				[
					'name' => 'img',
					'contents' => fopen($img, 'r'),
				],
			],
			'headers' => [
				'Authorization' => 'Bearer '.$bearerToken,
			],
		];
		$postImage = ApiHelpers::request($this->url,'POST','api/images/upload.json',$optionIMG);
		
		if($postImage->getStatusCode() !=200){
			$errors = new MessageBag(['errorUpload' => 'lỗi upload image!!!']);
		}
		$image = json_decode($postImage->getBody());

		$json = [
			'title' => $request->input('title'),
			'description' => $request->input('description'),
			'number_phone' => $request->input('numberPhone'),
			'organization_name' => $request->input('organizationName'),
			'address' => $request->input('address'),
			'represent_position' => $request->input('representPosition'),
			'category_lv1' => $request->input('category'),
			'time_start' => $request->input('timeStart'),
			'time_end' => $request->input('timeEnd'),
			'price' => $request->input('price'),
			'total_person' => $request->input('totalPerson'),
			'total_star' => 0,
			'total_rate' => 0,
			'event_images' => [
				[
					"image_id"=> $image->massage->_id,
					"position"=> 1,
					"src"=> "https://supper-event.herokuapp.com/".$image->massage->src
				]
			]
		];
		$option = [
			'json' => $json,
			'headers' => [
				'Accept' => 'application/json',
				'Content-Type' => 'application/json',
				'Authorization' => 'Bearer '.$bearerToken,
			],
		];
		
	
		$res = ApiHelpers::request($this->url, 'post', '/api/events.json', $option);
		
		return redirect()->route('events')->with('success', 'Sửa bài viết thành công');
	}
}