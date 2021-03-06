<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Blog;
use App\User;
use App\Category;
use App\Donation;
use App\File;

class LandingController extends Controller
{
    public function index()
    {
        $courses = Course::latest()->limit(2)->get();
        $blog = Blog::latest()->first();

        $latest_blogs = Blog::latest()->skip(1)->limit(3)->get();
        $random_blogs = Blog::inRandomOrder()->limit(3)->get();

        $latest_donations = Donation::latest()->limit(6)->get();
        $toppest_donations = Donation::orderBy('amount', 'DESC')->latest()->limit(6)->get();

    	return view('landing.index', compact('courses', 'blog', 'latest_blogs', 'random_blogs', 'latest_donations', 'toppest_donations'));
    }

    public function blogs($text=null, Request $request)
    {
        // init vars
        $current_cat = null;
        $author = null;
        $tag = null;
        $cats = Category::whereType(Blog::class)->get();
        $count = Blog::count();
        $order = request('order');

        // prepare query
        $blogs = Blog::query();
        if ($text) {
            $text = raw($text);
            $route = rn();
            if ($route == 'blogs_by_author') {
                $author = $text;
                $user = User::whereName($author)->firstOrFail();
                $blogs = $blogs->where('author_id', $user->id);
            }elseif ($route == 'blogs_by_cat') {
                $current_cat = $text;
                $category = Category::whereName($current_cat)->firstOrFail();
                $blogs = $blogs->where('category_id', $category->id);
            }elseif($route == 'blogs_by_tag') {
                $tag = $text;
                $blogs = $blogs->whereRaw("FIND_IN_SET('$tag',tags)");
            }
        }
        if ($phrase = $request->search) {
            $blogs = $blogs->where(function ($query) use ($phrase) {
                $query->orWhere('title', 'like', "%$phrase%")->orWhere('subtitle', 'like', "%$phrase%")->orWhere('tags', 'like', "%$phrase%");
            });
        }
        if ($order == 'seens') {
            $blogs = $blogs->orderBy('seens', 'DESC');
        }elseif($order == 'likes') {
            $blogs = $blogs->withCount('likes')->orderBy('likes_count', 'DESC');
        }else {
            $blogs = $blogs->latest();
            $order = null;
        }
        $blogs = $blogs->paginate(8);
        $random_blogs = Blog::inRandomOrder()->limit(3)->get();
        return view('landing.blogs', compact('blogs', 'cats', 'count', 'tag', 'current_cat', 'author', 'order', 'random_blogs'));
    }

    public function show_blog($title)
    {
        $blog = Blog::whereTitle(raw($title))->firstOrFail();
        $random_blogs = Blog::where('id', '!=', $blog->id)->inRandomOrder()->limit(3)->get();
        $blog->increment('seens');
        return view('landing.blog', compact('blog', 'random_blogs'));
    }

    public function signup_page()
    {
        $registering_courses = Course::whereStatus('registering')->get();
        $performing_courses = Course::whereStatus('performing')->get();
        $closed_courses = Course::whereStatus('closed')->get();
        return view('landing.signup_page', compact('registering_courses', 'performing_courses', 'closed_courses'));
    }

    public function about()
    {
        return view('landing.about');
    }

    public function download_files()
    {
        $files = File::whereAccess('public')->latest()->get();
        return view('landing.download_files', compact('files'));
    }
}
