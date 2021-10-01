<?php

namespace App\Http\Controllers\Api\Blog;

use Illuminate\Http\Request;
use App\Models\Blog\BlogCategory;
use App\Http\Controllers\Controller;

class BlogCategoryController extends Controller
{
    public function index()
    {
        return BlogCategory::all();
    }
}
