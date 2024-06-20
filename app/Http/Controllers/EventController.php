<?php

namespace App\Http\Controllers;

use App\Models\Event;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function store(Request $request)
    {
        $client = new Client();

        $response = $client->post('http://192.168.244.132:8080/api/create-event', [
            'multipart' => [
                [
                    'name'     => 'title',
                    'contents' => $request->title
                ],
                [
                    'name'     => 'date',
                    'contents' => $request->date
                ],
                [
                    'name'     => 'time',
                    'contents' => $request->time
                ],
                [
                    'name'     => 'description',
                    'contents' => $request->description
                ],
                [
                    'name'     => 'fee',
                    'contents' => $request->fee
                ],
                [
                    'name'     => 'status',
                    'contents' => $request->status
                ],
                [
                    'name'     => 'image',
                    'contents' => fopen($request->file('image')->getPathname(), 'r'),
                    'filename' => $request->file('image')->getClientOriginalName()
                ],
            ]


        ]);

        // return $response->getBody()->getContents();
        return redirect()->route(Auth::user()->role . '.event');
    }

    public function get()
    {
        $events = Event::orderBy('id', 'desc')->get();

        $userRole = Auth::user()->role;

        // Mengarahkan pengguna ke tampilan yang sesuai dengan peran mereka
        if ($userRole === 'staff') {
            return view('staff.event', compact('events'));
        } elseif ($userRole === 'owner') {
            return view('owner.event', compact('events'));
        }
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $userRole = Auth::user()->role;

        if ($userRole === 'staff') {
            return view('staff.edit-event', compact('event'));
        } elseif ($userRole === 'owner') {
            return view('owner.editEvent', compact('event'));
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    public function update(Request $request, $id)
    {

    $client = new Client();
    $multipart = [
        [
            'name'     => 'title',
            'contents' => $request->title
        ],
        [
            'name'     => 'date',
            'contents' => $request->date
        ],
        [
            'name'     => 'time',
            'contents' => $request->time
        ],
        [
            'name'     => 'description',
            'contents' => $request->description
        ],
        [
            'name'     => 'fee',
            'contents' => $request->fee
        ],
        [
            'name'     => 'status',
            'contents' => $request->status
        ],
        [
            'name'     => 'id',
            'contents' => $id
        ]
    ];

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $multipart[] = [
            'name'     => 'image',
            'contents' => fopen($image->getPathname(), 'r'),
            'filename' => $image->getClientOriginalName()
        ];
    }

    try {
        $response = $client->request('PUT', 'http://192.168.244.132:8080/api/edit-event', [
            'multipart' => $multipart
        ]);

        if ($response->getStatusCode() == 200) {
            return redirect()->route(Auth::user()->role . '.event')->with('success', 'Event updated successfully');
        } else {
            return redirect()->route(Auth::user()->role . '.event')->with('error', 'Failed to update event');
        }
    } catch (\Exception $e) {
        return redirect()->route(Auth::user()->role . '.event')->with('error', 'Failed to update event: ' . $e->getMessage());
    }
    }


    public function destroy($id)
    {
        $client = new \GuzzleHttp\Client();

        try {
            $response = $client->request('DELETE', 'http://192.168.244.132:8080/api/delete-event', [
                'query' => ['id' => $id]
            ]);

            if ($response->getStatusCode() == 200) {
                return redirect()->route(Auth::user()->role . '.event')->with('success', 'Event deleted successfully');
            } else {
                return redirect()->route(Auth::user()->role . '.event')->with('error', 'Failed to delete event');
            }
        } catch (\Exception $e) {
            return redirect()->route(Auth::user()->role . '.event')->with('error', 'Failed to delete event: ' . $e->getMessage());
        }
    }


}
