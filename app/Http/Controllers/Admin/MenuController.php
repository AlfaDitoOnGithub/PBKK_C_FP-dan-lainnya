<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MenuStoreRequest;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.menus.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuStoreRequest $request)
    {
        $image = $request->file('image')->store('public/menus');

        $menu = Menu::create([
            'name' => $request->name,
            'image' => $image,
            'description' => $request->description,
            'price' => $request->price
        ]);

        if($request->has('categories')){
            $menu->categories()->attach($request->categories);
        }

        return to_route('admin.menus.index')->with('success', 'Menu created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        $categories = Category::all();
        return view('admin.menus.edit', compact('menu', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        if($request->name !== $menu->name){
            $request->validate([
                'name' => ['required', 'unique:menus'],
                'description' => ['required'],
                'image' => ['required','image'],
                'price' => ['required']
            ]);
        } else {
            $request->validate([
                'description' => ['required'],
                'image' => ['required','image'],
                'price' => ['required']
            ]); 
        }
        
        $image = $menu->image;
        if($request->hasFile('image')){
            Storage::delete($menu->image);
            $image = $request->file('image')->store('public/menus');
        }

        $menu->update([
            'name' => $request->name,
            'image' => $image,
            'description' => $request->description,
            'price' => $request->price
        ]);

        if($request->has('categories')){
            $menu->categories()->sync($request->categories);
        }

        return to_route('admin.menus.index')->with('success', 'Menu updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        Storage::delete($menu->image);
        $menu->categories()->detach();
        $menu->delete();

        return to_route('admin.menus.index')->with('danger', 'Menu deleted successfully');
    }
}
