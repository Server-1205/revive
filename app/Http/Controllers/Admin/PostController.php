<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $path = Storage::disk('public')->url('');
        $posts = Post::with('categories:id,title')->paginate(6);
        return view('blog.admin.posts.index',compact('posts','path'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $categoryList = Category::with('children')->where('parent_id', 0)->get();
        $delimiter = '';
        return view('blog.admin.posts.create',compact('categoryList','delimiter'));
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
            'preview_text' => 'required|string|max:500|min:3',
            'detail_text' => 'required|string|max:1000|min:3',
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
                ->route('admin.posts.edit', $res)
                ->with(['success' => 'Статья успешно добавлена']);
        }
        return back()
            ->withErrors(['msg' => 'Ошибка сохранения'])
            ->exceptInput();
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return Application|Factory|View
     */
    public function show(Post $post)
    {
        return view('blog.admin.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return Application|Factory|View
     */
    public function edit(Post $post)
    {
        $path = Storage::disk('public')->url('');
        $categoryList = Category::with('children')->where('parent_id', 0)->get();
        $postItem = Post::findOrFail($post->id);
        $delimiter = '';
        return view('blog.admin.posts.edit',compact('postItem','categoryList','path','delimiter'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function update(Request $request, Post $post): RedirectResponse
    {
        $image = $post->image;
        $this->validate($request,[
            'title' => 'string|max:50|',
            'slug'  => 'unique:categories,slug|max:40|',
            'preview_text' => 'required|string|max:200|min:3',
            'detail_text' => 'required|string|max:1000|min:3',
            'image' => 'image|mimes:jpg,jpeg,png'
        ]);

        if ($request->hasFile('image')){
            Storage::disk('public')->delete($post->image);
            $image = $request->file('image')->store('images','public');
        }

        $published = $request['is_published'] ? Carbon::now() : null;

        //dd($published);

        //dd($image);
       $res = $post->update([
           'image' => $image,
           'title' => $request['title'],
           'detail_text' => $request['detail_text'],
           'preview_text' => $request['preview_text'],
           'is_published' => $request['is_published'],
           'category_id' => $request['category_id'],
           'published_at' => $published
       ]);
        if (!$res){
            return back()->withErrors(['msg' => 'Ошибка обновления'])->withInput();
        }
       return redirect()->route('admin.posts.index')->with(['success' => "Статья {$post->title} обновлена "]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return void
     */
    public function destroy($id): void
    {
        //
    }

    public function publish(Post $post)
    {
        $post->is_published = !$post->is_published;
        $post->save();
        return redirect()->route('admin.posts.index');
    }
}
