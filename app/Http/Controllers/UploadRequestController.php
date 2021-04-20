<?php

namespace App\Http\Controllers;

use App\Models\UploadRequest;
use Illuminate\Http\Request;

class UploadRequestController extends Controller
{
    //
    public function index() {
        return view('uploadRequest.index');
    }

    public function save(Request $request) {

        $upload = $request->input('upload');

        (new UploadRequest())->save($upload);

        return redirect()->route('uploadRequest::index')->with('success', 'Запрос принят!');
    }
}
