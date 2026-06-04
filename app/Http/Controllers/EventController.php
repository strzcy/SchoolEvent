<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    // Hapus atau komentari bagian ini:
    // public function __construct()
    // {
    //     $this->middleware('auth')->except(['index', 'show']);
    // }

    // Halaman depan (public)
    public function index()
    {
        $events = Event::latest()->get();
        return view('events.index', compact('events'));
    }

    // Halaman detail (public)
    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.detail', compact('event'));
    }

    // Admin: form tambah event
    public function create()
    {
        return view('events.create');
    }

    // Admin: simpan event
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'category' => 'required',
            'date' => 'required|date|after:today',
            'quota' => 'required|integer|min:1',
            'description' => 'required|min:10',
            'poster' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $posterPath = $request->file('poster')->store('posters', 'public');

        Event::create([
            'title' => $request->title,
            'category' => $request->category,
            'date' => $request->date,
            'quota' => $request->quota,
            'description' => $request->description,
            'poster' => $posterPath,
        ]);

        return redirect()->route('events.index')->with('success', 'Event berhasil ditambahkan!');
    }

    // Admin: form edit
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('events.edit', compact('event'));
    }

    // Admin: update event
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'title' => 'required|min:3',
            'category' => 'required',
            'date' => 'required|date',
            'quota' => 'required|integer|min:1',
            'description' => 'required|min:10',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = [
            'title' => $request->title,
            'category' => $request->category,
            'date' => $request->date,
            'quota' => $request->quota,
            'description' => $request->description,
        ];

        if ($request->hasFile('poster')) {
            if ($event->poster) {
                Storage::disk('public')->delete($event->poster);
            }
            $data['poster'] = $request->file('poster')->store('posters', 'public');
        }

        $event->update($data);

        return redirect()->route('events.index')->with('success', 'Event berhasil diupdate!');
    }

    // Admin: hapus event
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        if ($event->poster) {
            Storage::disk('public')->delete($event->poster);
        }
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event berhasil dihapus!');
    }
}