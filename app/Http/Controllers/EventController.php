<?php
namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventsRequest;
use App\Http\Requests\UpdateEventsRequest;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return view('pic.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pic.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventsRequest $request)
    {
        $data = $request->all();

        // Ensure event_location or event_link is null based on event_type
        if ($data['event_type'] === 'seminar') {
            $data['event_link'] = null;
        } elseif ($data['event_type'] === 'webinar') {
            $data['event_location'] = null;
        }

        // Ensure event_price is null if the event is free
        if ($data['payment_status'] === 'free') {
            $data['event_price'] = "FREE";
        }

        // Create the event
        Event::create($data);

        // Redirect to the events index page with a success message
        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('pic.events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('pic.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventsRequest $request, Event $event)
    {
        $data = $request->all();

        // Ensure event_location or event_link is null based on event_type
        if ($data['event_type'] === 'seminar') {
            $data['event_link'] = null;
        } elseif ($data['event_type'] === 'webinar') {
            $data['event_location'] = null;
        }

        // Ensure event_price is null if the event is free
        if ($data['payment_status'] === 'free') {
            $data['event_price'] = "FREE";
        }

        // Update the event
        $event->update($data);

        // Redirect to the events index page with a success message
        return redirect()->route('events.index')->with('status', 'Event has been edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('status', 'Event has been deleted!');
    }
}