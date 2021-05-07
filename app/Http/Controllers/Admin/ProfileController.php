<?php

namespace App\Http\Controllers\Admin;

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

    public function index()
    {
        if (\request()->user()->can('create', \Auth::user())) {
            $users = User::all();
        } else {
            $users = [ \Auth::user() ];
        }
        return view('admin.profile.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        $this->authorize('create', \Auth::user());
        return view('admin.profile.update');
    }

    public function update(Request $request, User $user)
    {
        $this->authorize('update', \Auth::user());
        $request->replace($user->toArray())->flash();
        return view('admin.profile.update');
    }

    public function save(SaveUserRequest $request)
    {
        $this->authorize('update', \Auth::user());
        $user = User::findOrNew($request->input('id'));
        $data = $request->except(['password', 'is_admin']);
        if ($request->input('password')) {
            $data['password'] = \Hash::make($request->input('password'));
        }
        if (\Auth::user()->is_admin) {
            $data['is_admin'] = $request->input('is_admin');
        }

        $user->fill($data);
        if (!$user->save()) {
            return redirect()->back()
                ->withErrors(['Не удалось сохранить!'])
                ->withInput();
        }

        return redirect()
            ->route('admin::profile::index')
            ->with('success', 'Пользователь сохранен!');
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
        $user->delete();
        return redirect()
            ->route('admin::profile::index')
            ->with('success', 'Пользователь удален!');
    }
}
