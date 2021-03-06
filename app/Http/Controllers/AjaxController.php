<?php

namespace App\Http\Controllers;
use App\tbl_students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

//
class AjaxController extends Controller {
	public function index() {
		$students = tbl_students::orderBy('id', 'desc')->paginate(4);
		return view('ajax.index', compact('students'));
	}
	//load trang
	public function read_data() {
		$students = tbl_students::orderBy('id', 'desc')->paginate(4);
		return view('ajax.student_list', compact('students'));
	}
	//phân trang
	public function studentPage() {
		$students = tbl_students::orderBy('id', 'desc')->paginate(4);
		return view('ajax.student_page', compact('students'));
	}
	public function store(Request $request) {
		$validator = Validator::make($request->all(),
			[
				'name' => 'required|min:3|max:32',
				'gender' => 'required',
			],
			[
				'name.required' => 'không được để trống',
				'name.min' => 'tên phải có độ dài từ 3 đến 32 kí tự',
				'name.max' => 'tên phải có độ dài từ 3 đến 32 kí tự',
				'gender.required' => 'bạn phải chọn một giới tính',
			]);
		if ($validator->passes()) {
			if ($request->ajax()) {
				$data = $request->all();
				$data['slug'] = str_slug($request->name);
				$students = tbl_students::create($data);
				return response($students);
			}
		}
		return response()->json(['error_name' => $validator->errors()->first('name'), 'error_gender' => $validator->errors()->first('gender')]);

	}
	public function destroy(Request $request) {
		if ($request->ajax()) {
			tbl_students::destroy($request->id);
			return response(['message' => 'xóa thành công']);
		}
	}
	public function edit(Request $request) {
		if ($request->ajax()) {
			$student = tbl_students::find($request->id);
			return response($student);
		}
	}
	public function update(Request $request) {
		if ($request->ajax()) {
			$student = tbl_students::find($request->id);
			$data = $request->all();
			$data['slug'] = str_slug($request->name);
			$student->update($data);

			return response($student);
		}
	}
}
