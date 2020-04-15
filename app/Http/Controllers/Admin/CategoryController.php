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
        return view('blog.admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {

        $data = $request->input();
        $this->validate($request,[
            'title' => 'string|max:50',
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
     * @return Response
     */
    public function edit($id): ?Response
    {
        dd(__METHOD__);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return Response
     */
    public function update(Request $request, $id): ?Response
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $res = Category::destroy($id);
        if($res){
            return back()->with(['success' => "Запись с id {$id} удалена"]);
        }

        return back()->withErrors(['msg' => 'Ошибка удаления']);
    }
}
