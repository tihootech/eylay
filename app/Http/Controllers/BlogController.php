<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('master');
    }

    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('dashboard.blog.index', compact('blogs'));
    }

    public function create()
    {
        $blog = new Blog;
        $cats = Category::whereType(Blog::class)->get();
        return view('dashboard.blog.form', compact('blog', 'cats'));
    }

    public function store(Request $request)
    {
        $data = self::validation(new Blog);
        $data['author_type'] = auth()->user()->class_type();
        $data['author_id'] = auth()->user()->class_id();
        Blog::create($data);
        return redirect()->route('blog.index')->withMessage(__('CHANGES_MADE_SUCCESSFULLY'));
    }

    public function edit(Blog $blog)
    {
        $cats = Category::whereType(Blog::class)->get();
        return view('dashboard.blog.form', compact('blog', 'cats'));
    }

    public function update(Request $request, Blog $blog)
    {
        $data = self::validation($blog);
        $blog->update($data);
        return redirect()->route('blog.index')->withMessage(__('CHANGES_MADE_SUCCESSFULLY'));
    }

    public function destroy(Blog $blog)
    {
        delete_file([$course->image, $course->bg]);
        $blog->delete();
        return redirect()->route('blog.index')->withMessage(__('CHANGES_MADE_SUCCESSFULLY'));
    }

    public static function validation($blog)
    {
        // init validation
        $data = request()->validate([
            'title' => 'required|unique:blogs,title,'.$blog->id,
            'subtitle' => 'nullable',
            'category_id' => 'nullable|required_without:category_name|exists:categories,id',
            'category_name' => 'nullable|unique:categories,name,NULL,id,type,'.Blog::class,
            'tags' => 'nullable',
            'content' => 'required',
            'image' => Rule::requiredIf(!$blog->id),
            'bg' => Rule::requiredIf(!$blog->id),
        ]);

        // create category if neccessary
        if (request('category_name') && !request('category_id')) {
            $cat = Category::create([
                'name' => request('category_name'),
                'type' => Blog::class,
            ]);
            $data['category_id'] = $cat->id;
        }
        unset($data['category_name']);

        // upload images
        if ( isset($data['image']) && $data['image'] ) {
            $data['image'] = upload($data['image'], $blog->image);
        }
        if ( isset($data['bg']) && $data['bg'] ) {
            $data['bg'] = upload($data['bg'], $blog->bg);
        }
        if ( isset($data['tags']) && $data['tags'] ) {
            $data['tags'] = str_replace("\r\n", ",", $data['tags']);
        }

        return $data;
    }
}
