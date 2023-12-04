<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        $categories = Category::all();
        return view('menus.index', compact('menus'), compact('categories'));
        
    }
}
