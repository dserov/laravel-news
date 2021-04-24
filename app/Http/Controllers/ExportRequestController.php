<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExportRequestRequest;
use App\Models\ExportRequest;
use Illuminate\Http\Request;

class ExportRequestController extends Controller
{
    //
    public function index() {
        return view('admin.exportRequest.index', ['requests' => ExportRequest::all()]);
    }


    public function create(Request $request) {
        return view('exportRequest.create');
    }

    public function save(ExportRequestRequest $request) {
        $exportModel = new ExportRequest();
        $exportModel->fill($request->input('export'));
        if (!$exportModel->save()) {
            return redirect()
                ->route('exportRequest::create')
                ->withErrors(['Не удалось сохранить!'])
                ->withInput();
        }

        return redirect()
            ->route('exportRequest::create')
            ->with('success', 'Запрос принят!');
    }
}
