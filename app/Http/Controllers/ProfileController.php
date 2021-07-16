<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    function __construct()
    {
        $this->middleware(['auth']);
    }

    public function update(Request $request)
    {
        $this->authorize('update', \Auth::user());
        $request->replace(\Auth::user()->toArray())->flash();
        return view('profile.update');
    }

    public function save(SaveUserRequest $request)
    {
        $this->authorize('update', \Auth::user());
        $user = User::find($request->input('id'));
        $data = $request->except(['password', 'is_admin']);
        if ($request->input('password')) {
            $data['password'] = \Hash::make($request->input('password'));
        }

        $user->fill($data);
        if (!$user->save()) {
            return redirect()->back()
                ->withErrors(['Не удалось сохранить!'])
                ->withInput();
        }

        return redirect()
            ->route('profile::update')
            ->with('success', 'Данные сохранены!');
    }
}
