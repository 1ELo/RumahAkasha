<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class SignatureController extends Controller
{
    public function get()
    {
        $menu = Menu::where('kategori', 'signature')->get();
        return view('owner.signature', compact('menu'));
    }

    public function store(Request $request)
    {
        $client = new Client();

        $response = $client->post('http://localhost:8080/api/formSignature', [
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

        return redirect()->route('signature.index');
    }



    public function edit($id_menu)
    {
        $menu = Menu::findOrFail($id_menu);
        return view('owner.editSignature', compact('menu'));
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
                'contents' => 'signature'
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

        $response = $client->request('PUT', 'http://localhost:8080/api/editMenu', [
            'multipart' => $multipart
        ]);

        return redirect()->route('signature.index');
    }

    public function destroy($id_menu)
    {
        $client = new Client();

        $response = $client->delete('http://localhost:8080/api/delete-menu', [
            'query' => ['id' => $id_menu]
        ]);

        return redirect()->route('signature.index');
    }
}
