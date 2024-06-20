<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Controllers\CoffeeController;

class CoffeeController extends Controller
{
    public function get()
    {
        $menu = Menu::where('kategori', 'coffee')->get();
        return view('owner.coffee', compact('menu'));
    }

    public function store(Request $request)
    {
        $client = new Client();

        $response = $client->post('http://192.168.244.132:8080/api/formCoffee', [
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
        return redirect()->route('coffee.index');
    }

    public function edit($id_menu)
    {
        $menu = Menu::findOrFail($id_menu);
        return view('owner.editCoffee', compact('menu'));
    }

    public function update(Request $request, $id_menu)
    {
        $client = new Client();

        $multipart = [
            [
                'name'     => 'name',
                'contents' => $request->name
            ],
            [
                'name'     => 'price',
                'contents' => $request->price
            ],
            [
                'name'     => 'description',
                'contents' => $request->description
            ],
            [
                'name'     => 'kategori',
                'contents' => 'coffee'
            ],
            [
                'name'     => 'id_menu',
                'contents' => $id_menu
            ]
        ];

        if ($request->hasFile('image')) {
            $multipart[] = [
                'name'     => 'image',
                'contents' => fopen($request->file('image')->getPathname(), 'r'),
                'filename' => $request->file('image')->getClientOriginalName()
            ];
        }

        $response = $client->request('PUT', 'http://192.168.244.132:8080/api/editMenu', [
            'multipart' => $multipart
        ]);
        return redirect()->route('coffee.index');
    }

    public function destroy($id_menu)
    {
        $client = new \GuzzleHttp\Client();

        $response = $client->delete('http://192.168.244.132:8080/api/delete-menu', [
            'query' => ['id' => $id_menu]
        ]);
        return redirect()->route('coffee.index');
    }
}
