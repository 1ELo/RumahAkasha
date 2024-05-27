<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class NonCoffeeController extends Controller
{
    public function store(Request $request)
    {
        $client = new Client();

        $response = $client->post('http://localhost:8080/api/formNonCoffee', [
            'multipart' => [
                [
                    'name'     => 'name',
                    'contents' => $request->name
                ],
                [
                    'name'     => 'price',
                    'contents' => $request->price
                ],
                [
                    'name'     => 'image',
                    'contents' => fopen($request->file('image')->getPathname(), 'r'),
                    'filename' => $request->file('image')->getClientOriginalName()
                ],
                [
                    'name'     => 'description',
                    'contents' => $request->description
                ],
            ]


        ]);
        return redirect()->route('noncoffee.index');
    }

    public function get()
    {
        $menu = Menu::where('kategori', 'noncoffee')->get();
        return view('owner.noncoffee', compact('menu'));
    }

    public function edit($id_menu)
    {
        $menu = Menu::findOrFail($id_menu);
        return view('owner.editNonCoffee', compact('menu'));
    }

    public function update(Request $request, $id_menu)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required',
            // 'category' => 'required',

        ]);

        $menu = Menu::find($id_menu);

        if (!$menu) {
            return response()->json(['message' => 'Menu not found'], 404);
        }

        $menu->name = $request->name;
        $menu->price = $request->price;
        $menu->description = $request->description;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('img/menu'), $imageName);
            $menu->image = 'img/menu/' . $imageName;
        }

        $menu->save();

        return redirect()->route('noncoffee.index');
    }

    public function destroy($id_menu)
    {
        $menu = Menu::findOrFail($id_menu);
        $menu->delete();

        // return response()->json(['message' => 'Menu deleted successfully']);
        return redirect()->route('noncoffee.index');
    }
}
