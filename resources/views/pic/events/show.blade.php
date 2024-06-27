@extends('pic.layout.app')

@section('content')
    <div class="hero">

        <div class="details-content container">
            <div class="d-flex flex-wrap justify-content-lg-center gap">
                <!-- Left Side Description -->
                <div class="d-flex flex-column description">
                    <div class="headline">
                        {{ $event->event_title }}
                    </div>
                    <div class="event-details">
                        <h6>Event Details</h6>
                        <p class="details-paragraph">
                            {!! nl2br(e($event->event_description)) !!}
                        </p>
                    </div>
                    <div class="keypoints">
                        <!-- Key 1 -->
                        <div class="d-flex align-items-start gap-3">
                            <img src="{{ asset('assets/icons/ic-check.svg') }}" alt="semina">
                            <span>Hours trying different things and getting nowhere makes them feel like giving up on
                                marketing altogether.</span>
                        </div>
                        <!-- Key 2 -->
                        <div class="d-flex align-items-start gap-3">
                            <img src="{{ asset('assets/icons/ic-check.svg') }}" alt="semina">
                            <span>Hours trying different things and getting nowhere makes them feel like giving up on
                                marketing altogether.</span>
                        </div>
                        <!-- Key 3 -->
                        <div class="d-flex align-items-start gap-3">
                            <img src="{{ asset('assets/icons/ic-check.svg') }}" alt="semina">
                            <span>Hours trying different things and getting nowhere makes them feel like giving up on
                                marketing altogether.</span>
                        </div>
                    </div>
                    <div class="map-location">
                        <h6>Event Location</h6>
                        <div class="map-placeholder">
                            <div class="maps">
                                <img src="{{ asset('assets/images/maps.png') }}" alt="">
                                <div class="absolute d-flex justify-content-center align-items-center" id="hoverMe">
                                    <a href="#" class="btn-navy" id="btn-maps">
                                        View in Google Maps
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card Event -->
                <div class="d-flex flex-column card-event">
                    <!-- Speaker Information -->
                    <h6>Your Speaker</h6>
                    <div class="d-flex align-items-center gap-3 mt-3">
                        <img src="{{ asset('assets/images/avatar.png') }}" alt="semina" width="60">
                        <div>
                            <div class="speaker-name">
                                Shayna Putri
                            </div>
                            <span class="occupation">Designer</span>
                        </div>
                    </div>
                    <hr>
                    <!-- Ticket Information -->
                    <h6>Get Ticket</h6>
                    <div class="price my-3">Rp{{ $event->event_price }}<span>/person</span></div>
                    <div class="d-flex gap-3 align-items-center card-details">
                        <img src="{{ asset('assets/icons/ic-marker.svg') }}" alt="semina"> {{ $event->event_location }}
                    </div>
                    <div class="d-flex gap-3 align-items-center card-details">
                        <img src="{{ asset('assets/icons/ic-time.svg') }}" alt="semina"> {{ $event->event_time }}
                    </div>
                    <div class="d-flex gap-3 align-items-center card-details">
                        <img src="{{ asset('assets/icons/ic-calendar.svg') }}" alt="semina"> {{ $event->event_date }}
                    </div>
                    <a href="#" class="btn-green">Join Now</a>
                </div>
            </div>
        </div>
    </div>


    <section class="stories">
        <div class="d-flex flex-row justify-content-center align-items-center container">
            <img src="{{ asset('assets/images/story.png') }}" alt="semina" class="d-none d-lg-block" width="515" />
            <div class="d-flex flex-column">
                <div>
                    <div class="sub-title">
                        <span class="text-gradient-pink">Story</span>
                    </div>
                    <div class="title">
                        One Great Event. <br class="d-none d-lg-block" />
                        For The Better World.
                    </div>
                </div>
                <p class="paragraph">
                    Baca kisah bagaimana Shayna berhasil membangun <br class="d-none d-lg-block" />
                    sebuah Startup yang membantu warga untuk <br class="d-none d-lg-block" />
                    mendapatkan bantuan selama pandemic.
                </p>
                <a href="#" class="btn-navy">Read</a>
            </div>
        </div>
    </section>

    <section class="statistics container">
        <div class="d-flex flex-row flex-wrap justify-content-center align-items-center gap-5">
            <div class="d-flex flex-column align-items-center gap-1">
                <div class="title">
                    190K+
                </div>
                <p>
                    Events Created
                </p>
            </div>
            <div class="vr"></div>
            <div class="d-flex flex-column align-items-center gap-1">
                <div class="title">
                    3M
                </div>
                <p>
                    People Joined
                </p>
            </div>
            <div class="vr d-none d-md-block"></div>
            <div class="d-flex flex-column align-items-center gap-1">
                <div class="title">
                    5K+
                </div>
                <p>
                    Success Startup
                </p>
            </div>
            <div class="vr"></div>
            <div class="d-flex flex-column align-items-center gap-1">
                <div class="title">
                    113K+
                </div>
                <p>
                    Top Speakers
                </p>
            </div>
        </div>
    </section>

    <script>
        document.getElementById("hoverMe").addEventListener("mouseover", mouseOver);
        document.getElementById("hoverMe").addEventListener("mouseout", mouseOut);

        function mouseOver() {
            document.getElementById("btn-maps").style.opacity = "100"
            document.getElementById("hoverMe").style.backgroundColor = "#151a2638"
        }

        function mouseOut() {
            document.getElementById("btn-maps").style.opacity = "0"
            document.getElementById("hoverMe").style.backgroundColor = "transparent"
        }
    </script>
@endsection
