<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $blogs = Blog::paginate(10);
        return view('blog', compact('blogs'));
    }
    public function getBlogs(Request $request)
    {
        $blogs = Blog::paginate(10);
        // return view('blog', compact('blogs'));
        $html = view('blog-row', compact('blogs'))->render();

        return response()->json([
            'status' => true,
            'html' => $html,
        ]);
    }
}
