<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index()
   {
       return view("admin.dashboard" ,
       [
           'usersCount' => User::count(),
           'postsCount' => Post::count(),
           'categoriesCount'=> Category::count(),
           'tagsCount'=> Tag::count(),
       ]);
   }
}
