<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Models\Barista;
use Illuminate\Http\Request;

// TESSSS UBUNTU

class BaristaController extends Controller
{
    public function store(Request $request)
    {
        $client = new Client();

        $response = $client->post('http://localhost:8080/api/create-barista', [
            'multipart' => [
                [
                    'name'     => 'nama_barista',
                    'contents' => $request->nama_barista
                ],
                [
                    'name'     => 'deskripsi',
                    'contents' => $request->deskripsi
                ],
                [
                    'name'     => 'tahun_kerja',
                    'contents' => $request->tahun_kerja
                ],
                [
                    'name'     => 'job_desk',
                    'contents' => $request->job_desk
                ],
                [
                    'name'     => 'foto_barista',
                    'contents' => fopen($request->file('foto_barista')->getPathname(), 'r'),
                    'filename' => $request->file('foto_barista')->getClientOriginalName()
                ],
            ]
        ]);

        return redirect()->route('baristas.index');
    }

    public function get()
    {
        $baristas = Barista::all();
        return view('owner.barista', compact('baristas'));
    }

    public function about_us()
    {
        $barista = Barista::all();
        return view('customer.profile', compact('barista'));
    }

    public function edit($id_barista)
    {
        $barista = Barista::findOrFail($id_barista);
        return view('owner.editBarista', compact('barista'));
    }

    public function update(Request $request, $id_barista)
{
    $client = new Client();

    $multipart = [
        [
            'name'     => 'id_barista',
            'contents' => $id_barista
        ],
        [
            'name'     => 'nama_barista',
            'contents' => $request->nama_barista
        ],
        [
            'name'     => 'deskripsi',
            'contents' => $request->deskripsi
        ],
        [
            'name'     => 'tahun_kerja',
            'contents' => $request->tahun_kerja
        ],
        [
            'name'     => 'job_desk',
            'contents' => $request->job_desk
        ]
    ];

    if ($request->hasFile('foto_barista')) {
        $multipart[] = [
            'name'     => 'foto_barista',
            'contents' => fopen($request->file('foto_barista')->getPathname(), 'r'),
            'filename' => $request->file('foto_barista')->getClientOriginalName()
        ];
    }

    $response = $client->request('PUT', 'http://localhost:8080/api/edit-barista', [
        'multipart' => $multipart
    ]);

    // Handle the response from the API as needed
    // return $response->getBody()->getContents();
    return redirect()->route('baristas.index');
}

    public function destroy($id)
    {
        $client = new \GuzzleHttp\Client();

        $response = $client->delete("http://localhost:8080/api/delete-barista?id_barista=$id");

        return redirect()->route('baristas.index');
    }
}
