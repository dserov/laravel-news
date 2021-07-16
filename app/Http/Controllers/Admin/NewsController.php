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
use http\Url;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('admin.news.index', ['news' => News::query()->with(['category'])->paginate(10)]);
    }

    public function create()
    {
        return view('admin.news.create', ['categories' => Category::getList()]);
    }

    public function save(SaveNewsRequest $request)
    {
        $news = $request->input('news');
        unset($news['enclosure']);

        // save enclosure
        if($uploadedFile = $request->file('news.enclosure')) {
            $fileName = $uploadedFile->store('', 'public');
            $news['enclosure'] = \Storage::url($fileName);
        }

        // insert or update news
        $newsModel = News::updateOrCreate(['id' => $news['id']], $news);
        if (is_null($newsModel)) {
            // remove file
            \Storage::disk('public')->delete($fileName);

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
                ->withErrors([$exception->getMessage()])
                ->withInput();
        }
    }

    public function update(Request $request, News $news)
    {
        $request->replace([
            'news' => $news->toArray()
        ]);
        $request->flash();
        return view('admin.news.create', ['categories' => Category::getList()]);
    }
}
