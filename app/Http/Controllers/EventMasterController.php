<?php

namespace App\Http\Controllers;

use App\Models\EventMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EventMasterController extends Controller {

      /**
       * Display a listing of events.
       */
      public function index() {
            // Paginate or get all
            $events = EventMaster::orderBy('date_time', 'desc')->paginate(10);
            return view('events.index', compact('events'));
      }

      /**
       * Show the form for creating a new event.
       */
      public function create() {
            return view('events.create');
      }

      /**
       * Store a newly created event.
       */
      public function store(Request $request) {
            $data = $request->validate([
                      'event_name' => 'required|string|max:255',
                      'date_time' => 'required|date',
                      'description' => 'nullable|string',
                      'image' => 'nullable|image|max:2048',
                      'banner_image' => 'nullable|image|max:4096',
                      'is_active' => 'required|boolean',
            ]);

            // Handle file uploads, if any:
            if ($request->hasFile('image')) {
                  $path = $request->file('image')->store('events/images', 'public');
                  $data['image'] = $path;
            }

            if ($request->hasFile('banner_image')) {
                  $path = $request->file('banner_image')->store('events/banners', 'public');
                  $data['banner_image'] = $path;
            }

            // Assume currently authenticated user creates:
            $data['is_create_by'] = auth()->id();

            EventMaster::create($data);

            return redirect()->route('events.index')
                        ->with('success', 'Event created successfully.');
      }

      /**
       * Display the specified event.
       */
      public function show(EventMaster $event) {
            return view('events.show', compact('event'));
      }

      /**
       * Show the form for editing the event.
       */
      public function edit(EventMaster $event) {
            return view('events.edit', compact('event'));
      }

      /**
       * Update the specified event in storage.
       */
      public function update(Request $request, EventMaster $event) {
            $data = $request->validate([
                      'event_name' => 'required|string|max:255',
                      'date_time' => 'required|date',
                      'description' => 'nullable|string',
                      'image' => 'nullable|image|max:2048',
                      'banner_image' => 'nullable|image|max:4096',
                      'is_active' => 'required|boolean',
            ]);

            if ($request->hasFile('image')) {
                  // Delete old file if exists
                  if ($event->image) {
                        Storage::disk('public')->delete($event->image);
                  }
                  $data['image'] = $request->file('image')->store('events/images', 'public');
            }

            if ($request->hasFile('banner_image')) {
                  if ($event->banner_image) {
                        Storage::disk('public')->delete($event->banner_image);
                  }
                  $data['banner_image'] = $request->file('banner_image')->store('events/banners', 'public');
            }

            $event->update($data);

            return redirect()->route('events.index')
                        ->with('success', 'Event updated successfully.');
      }

      /**
       * Remove the specified event.
       */
      public function destroy(EventMaster $event) {
            // Optionally delete images from storage
            if ($event->image) {
                  Storage::disk('public')->delete($event->image);
            }
            if ($event->banner_image) {
                  Storage::disk('public')->delete($event->banner_image);
            }

            $event->delete();

            return redirect()->route('events.index')
                        ->with('success', 'Event deleted successfully.');
      }
}
