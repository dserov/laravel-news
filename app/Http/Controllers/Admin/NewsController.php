<?php
/**
 * Created by PhpStorm.
 * User: MegaVolt
 * Date: 18.04.2021
 * Time: 19:52
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\SaveNewsRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('admin.news.index', ['news' => News::query()->with(['category'])->get()]);
    }

    public function create()
    {
        return view('admin.news.create', ['categories' => Category::all()]);
    }

    public function save(SaveNewsRequest $request)
    {
        // insert or update news
        $newsModel = News::query()->firstOrNew(['id' => $request->input('news.id')]);
        $newsModel->fill($request->input('news'));
        if (!$newsModel->save()) {
            return redirect()
                ->route('admin::news::create')
                ->withErrors(['Не удалось сохранить!'])
                ->withInput();
        }

        return redirect()
            ->route('admin::news::index')
            ->with('success', 'Новость сохранена!');
    }

    public function delete(News $news)
    {
        try {
            if ($news->delete()) {
                return redirect()
                    ->route('admin::news::index')
                    ->with('success', 'Новость удалена!');
            }
            throw new \Exception('Не удалось удалить новость!');
        } catch (\Exception $exception) {
            return redirect()->route('admin::news::index')
                ->withErrors([ $exception->getMessage() ])
                ->withInput();
        }
    }

    public function update(Request $request, News $news)
    {
        $request->replace([
            'news' => $news->toArray()
        ]);
        $request->flash();
        return view('admin.news.create', ['categories' => Category::all()]);
    }
}