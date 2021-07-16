<?php
/**
 * Created by PhpStorm.
 * User: MegaVolt
 * Date: 18.04.2021
 * Time: 19:52
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\SaveCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index', ['categories' => Category::query()->with(['news'])->paginate(10)]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function save(SaveCategoryRequest $request)
    {
        // insert or update news
        $categoryModel = Category::query()->firstOrNew(['id' => $request->input('category.id')]);
        $categoryModel->fill($request->input('category'));
        if (!$categoryModel->save()) {
            return redirect()
                ->route('admin::category::create')
                ->withErrors(['Не удалось сохранить!'])
                ->withInput();
        }

        return redirect()
            ->route('admin::category::index')
            ->with('success', 'Категория сохранена!');
    }

    public function delete(Category $category)
    {
        try {
            if ($category->delete()) {
                return redirect()
                    ->route('admin::category::index')
                    ->with('success', 'Категория удалена!');
            }
            throw new \Exception('Не удалось удалить категорию!');
        } catch (\Exception $exception) {
            return redirect()->route('admin::category::index')
                ->withErrors([$exception->getMessage()])
                ->withInput();
        }
    }

    public function update(Request $request, Category $category)
    {
        $request->replace([
            'category' => $category->toArray()
        ]);
        $request->flash();
        return view('admin.category.create');
    }
}
