@extends('pic.layout.app')

@section('content')
    <div class="form-container">
        <form action="/pic/events/{{ $event->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <!-- Event Title -->
            <div class="form-group">
                <label for="event_title">Event Title</label>
                <input type="text" class="form-control" id="event_title" name="event_title" placeholder="{{ $event->event_title }}" value="{{ $event->event_title }}" required>
            </div>
            <!-- Event Description -->
            <div class="form-group">
                <label for="event_description">Event Description</label>
                <textarea class="form-control" id="event_description" name="event_description" rows="3" placeholder="{{ $event->event_description }}" required>{{ $event->event_description }}</textarea>
            </div>
            <!-- Event Time -->
            <div class="form-group">
                <label for="event_time">Time</label>
                <input type="text" class="form-control" id="event_time" name="event_time" placeholder="{{ $event->event_time }}" value="{{ $event->event_time }}" required>
            </div>
            <!-- Organizer Name -->
            <div class="form-group">
                <label for="organizer_name">Company/Organizer Name</label>
                <input type="text" class="form-control" id="organizer_name" name="organizer_name" placeholder="{{ $event->organizer_name }}" value="{{ $event->organizer_name }}" required>
            </div>
            <!-- Event Type -->
            <div class="form-group">
                <label for="event_type">Event Type (Seminar/Webinar)</label>
                <select id="event_type" name="event_type" class="form-control form-select" required>
                    <option value="seminar" {{ $event->event_type == 'seminar' ? 'selected' : '' }}>Seminar</option>
                    <option value="webinar" {{ $event->event_type == 'webinar' ? 'selected' : '' }}>Webinar</option>
                </select>
            </div>
            <!-- Event Location or Link (conditionally displayed) -->
            <div class="form-group {{ $event->event_type == 'seminar' ? '' : 'hidden' }}" id="location_container">
                <label for="event_location">Event Location</label>
                <input type="text" class="form-control" id="event_location" name="event_location" placeholder="{{ $event->event_location }}" value="{{ $event->event_location }}">
            </div>
            <div class="form-group {{ $event->event_type == 'webinar' ? '' : 'hidden' }}" id="link_container">
                <label for="event_link">Event Link</label>
                <input type="url" class="form-control" id="event_link" name="event_link" placeholder="{{ $event->event_link }}" value="{{ $event->event_link }}">
            </div>
            <!-- Payment Status -->
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment_status" id="paid" value="paid" {{ $event->payment_status == 'paid' ? 'checked' : '' }}>
                    <label class="form-check-label" for="paid">Paid</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment_status" id="free" value="free" {{ $event->payment_status == 'free' ? 'checked' : '' }}>
                    <label class="form-check-label" for="free">Free</label>
                </div>
            </div>
            <!-- Event Price (conditionally displayed) -->
            <div class="form-group {{ $event->payment_status == 'paid' ? '' : 'hidden' }}" id="price_container">
                <label for="event_price">Event Price</label>
                <input type="number" class="form-control" id="event_price" name="event_price" placeholder="{{ $event->event_price }}" value="{{ $event->event_price }}">
            </div>
            <!-- Image Upload -->
            {{-- <div class="form-group">
                <label for="event_img">Event Image</label>
                <input type="file" class="form-control" id="event_img" name="event_img">
            </div> --}}
            <!-- Submit Button -->
            <button type="submit" class="btn-green">Edit</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var paidRadio = document.getElementById('paid');
            var freeRadio = document.getElementById('free');
            var priceContainer = document.getElementById('price_container');
            var eventTypeSelect = document.getElementById('event_type');
            var locationContainer = document.getElementById('location_container');
            var linkContainer = document.getElementById('link_container');

            function togglePriceInput() {
                if (paidRadio.checked) {
                    priceContainer.classList.remove('hidden');
                } else {
                    priceContainer.classList.add('hidden');
                }
            }

            function toggleLocationOrLink() {
                if (eventTypeSelect.value === 'seminar') {
                    locationContainer.classList.remove('hidden');
                    linkContainer.classList.add('hidden');
                } else if (eventTypeSelect.value === 'webinar') {
                    linkContainer.classList.remove('hidden');
                    locationContainer.classList.add('hidden');
                }
            }

            paidRadio.addEventListener('change', togglePriceInput);
            freeRadio.addEventListener('change', togglePriceInput);
            eventTypeSelect.addEventListener('change', toggleLocationOrLink);

            // Initial setup
            togglePriceInput();
            toggleLocationOrLink();
        });
    </script>
@endsection
