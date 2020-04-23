<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('blog.admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $categories = Category::with('children')->where('parent_id', 0)->get();
        //dd($categories);
        return view('blog.admin.categories.create', ['categories' => $categories, 'delimiter' => '']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $data = $request->input();
        $this->validate($request,[
            'title' => 'string|max:50|unique:categories,title',
            'slug'  => 'unique:categories,slug|max:40|',
            'description' => 'string'
        ]);


        if (empty($data['slug'])){
            $data['slug'] = Str::slug($data['title']);
        }

        $res = Category::create($data);

        if (!$res->exists()){
            return redirect()
                ->back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }

        return redirect()
            ->route('admin.categories.index')
            ->with(['success' => "Категория [{$res->title}] добавлена"]);

    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Response
     */
    public function show($id): ?Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return View
     */
    public function edit($id):View
    {
        $delimiter = '';
        $category = Category::findOrFail($id);
        $categories = Category::with('children')->where('parent_id', 0)->get();
        return view('blog.admin.categories.edit',compact('category','categories','delimiter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $category = Category::find($id);

        $res = $category->update($request->all());

        return redirect()->route('admin.categories.edit',$category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Category $category): RedirectResponse
    {
        $res = $category->delete();
        if($res){
            return back()->with(['success' => "Запись с id {$category->id} удалена"]);
        }

        return back()->withErrors(['msg' => 'Ошибка удаления']);
    }
}
