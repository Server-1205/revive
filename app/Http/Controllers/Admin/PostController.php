<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $posts = Post::all();
        return view('blog.admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $categoryList = Category::all();
        return view('blog.admin.posts.create',compact('categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request): ?RedirectResponse
    {
        $this->validate($request, [
            'title' => 'required|unique:posts,title|string|max:100|min:3',
            'slug' => '|unique:posts,slug|max:100|min:3',
            'image' => 'required|image|mimes:jpg,jpeg,png',
        ]);

        $data = $request->all();
        $file = $request->file('image');

        $path = $file->store('images','public');

        if (empty($data['slug'])){
            $data['slug'] = Str::slug($data['title']);
        }
        $data['author_id'] = 1;
        $data['image'] = $path;
        $res = Post::create($data);
        if ($res){
            return redirect()
                ->route('admin.posts.index')
                ->with(['success' => 'Статья успешно добавлена']);
        }
        return back()
            ->withErrors(['msg' => 'Ошибка сохранения'])
            ->exceptInput();
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd(__METHOD__, $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
