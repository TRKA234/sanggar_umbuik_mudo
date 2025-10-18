<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    // ✅ Menampilkan daftar semua event
    public function index()
    {
        $events = Event::latest()->paginate(10);
        return view('admin.events.index', compact('events'));
    }

    // ✅ Menampilkan form tambah event
    public function create()
    {
        return view('admin.events.create');
    }

    // ✅ Simpan event baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_at' => 'nullable|date',
            'end_at' => 'nullable|date|after_or_equal:start_at',
            'location' => 'nullable|string|max:255',
            'fee' => 'nullable|numeric',
            'cover' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')->store('events', 'public');
        }

        Event::create($validated);

        return redirect()->route('admin.events.index')->with('success', 'Agenda kegiatan berhasil ditambahkan.');
    }

    // ✅ Menampilkan form edit event
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.events.edit', compact('event'));
    }

    // ✅ Tampilkan detail event
    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.events.show', compact('event'));
    }

    // ✅ Update event
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_at' => 'nullable|date',
            'end_at' => 'nullable|date|after_or_equal:start_at',
            'location' => 'nullable|string|max:255',
            'fee' => 'nullable|numeric',
            'cover' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('cover')) {
            if ($event->cover) {
                Storage::disk('public')->delete($event->cover);
            }
            $validated['cover'] = $request->file('cover')->store('events', 'public');
        }

        $event->update($validated);

        return redirect()->route('admin.events.index')->with('success', 'Agenda kegiatan berhasil diperbarui.');
    }

    // ✅ Hapus event
    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        if ($event->cover) {
            Storage::disk('public')->delete($event->cover);
        }

        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Agenda kegiatan berhasil dihapus.');
    }
}
