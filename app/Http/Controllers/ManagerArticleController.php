<?php

namespace App\Http\Controllers;

use App\Helpers\ApiHelpers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Validator;

class ManagerArticleController extends Controller
{
	public function show($id, Request $request)
	{
		$ManagerID = Cache::get('auth_user');
		$request = ApiHelpers::request('http://tstudents.herokuapp.com', 'get', '/article?limit=20');
		$data = json_decode($request->getBody());

		return view('/managerarticles')->with('article', $data->data);
	}

	public function index(Request $request)
	{
		$ManagerID = Cache::get('auth_user');
		$request = ApiHelpers::request('http://tstudents.herokuapp.com', 'get', '/article?limit=20');
		$data = json_decode($request->getBody());
		// dd($data);
		return view('/managerarticles')->with('article', $data->data);
	}

	public function destroy($id)
	{
		$ManagerID = Cache::get('auth_user');
		$token = cache::get('token.'.$ManagerID);
		$request = ApiHelpers::request('http://tstudents.herokuapp.com', 'delete', '/article/'.$id, ['headers' => ['Authorization' => 'Bearer '.$token, 'Accept' => 'application/json']]);

		$data = json_decode($request->getBody());

		return redirect()->route('article.index')->with('success', 'Xóa Bài Viết Thành Công!!!');
	}

	public function store(Request $request)
	{
		$rule = [
			'Title' => 'required',
			'Description' => 'required',
			'content' => 'required',
			'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
		];
		$masage = [
			'Title.required' => 'Tiêu đề không được để trống',
			'content.required' => 'Nội dung nhập ít nhất 4 ký tự',
			'Description.required' => 'Mô tả không được để trống',
			'image.required' => 'Hình ảnh không được để trống',
			'image.image' => 'Bạn phải chọn hình ảnh',
			'image.mimes' => 'Bạn phải đúng định dạnh hình ảnh:jpeg,png,jpg,gif,svg',
			'image.max' => 'File hình ảnh không được lớn hơn 10 Mb',
		];
		$validator = Validator::make($request->all(), $rule, $masage);
		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator);
		} else {
			$ManagerID = Cache::get('auth_user');
			$token = cache::get('token.'.$ManagerID);
			$image = $request->file('image');
			$img = storage_path('app/tmp_images/'.end($arr));
				file_put_contents($img, file_get_contents($image));
			$fileName = (Carbon::now()->format('Y-m-d_H-i-s')).'.'.$image->getClientOriginalExtension();
			$image->move(public_path('image'), $fileName);

			$json = [
				'title' => $request->input('Title'),
				'description' => $request->input('Description'),
				'image' => public_path('image').$fileName,
				'content' => $request->input('content'),
			];
			$option = [
				'json' => $json,
				'headers' => [
					'Accept' => 'application/json',
					'Authorization' => $token,
					'Content-Type' => 'application/json',
				],
			];
			$res = ApiHelpers::request('http://tstudents.herokuapp.com', 'post', '/article', $option);

			return redirect()->route('article.index')->with('success', 'Tạo bài viết thành công');
		}
	}

	public function update(Request $request, $articleID)
	{
		$rule = [
			'Title' => 'required',
			'Description' => 'required',
			'content' => 'required',
			'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
		];
		$masage = [
			'Title.required' => 'Tiêu đề không được để trống',
			'content.required' => 'Nội dung nhập ít nhất 4 ký tự',
			'Description.required' => 'Mô tả không được để trống',
			'image.image' => 'Bạn phải chọn hình ảnh',
			'image.mimes' => 'Bạn phải đúng định dạnh hình ảnh:jpeg,png,jpg,gif,svg',
			'image.max' => 'File hình ảnh không được lớn hơn 10 Mb',
		];
		$validator = Validator::make($request->all(), $rule, $masage);
		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator);
		} else {
			$ManagerID = Cache::get('auth_user');
			$token = cache::get('token.'.$ManagerID);

			$json = [
				'title' => $request->input('title'),
				'description' => $request->input('description'),
				'content' => $request->input('content'),
			];
			$option = [
				'json' => $json,
				'headers' => [
					'Accept' => 'application/json',
					'Authorization' => $token,
					'Content-Type' => 'application/json',
				],
			];
			$res = ApiHelpers::request('http://tstudents.herokuapp.com', 'post', '/article/'.$articleID, $option);

			return redirect()->route('article.index')->with('success', 'Sửa bài viết thành công');
		}
	}

	public function edit(Request $request, $articleID)
	{
		$ManagerID = Cache::get('auth_user');
		$token = cache::get('token.'.$ManagerID);
		$request = ApiHelpers::request('http://tstudents.herokuapp.com', 'get', '/article/'.$articleID);
		if (!empty($data = json_decode($request->getBody())->data)) {
			$data[0]->id = $data[0]->_id;

			return view('editArticle')->with('article', $data[0]);
		}
	}

	public function create(Request $request)
	{
		return view('/addArticle');
	}
}