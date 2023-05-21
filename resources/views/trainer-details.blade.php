<!DOCTYPE html>
<html lang="en">

@include('partials/header_files')

<body data-color="#E1FF7E" data-color-type="light">
    <div class="container classes_page trainer_page trainer-single-page">
        @include('partials/header_public')
        <section class="classes_header">
            <div class="left" style="background-image: url({{secure_asset('storage/'.$trainer->picture)}});">
                <div class="content">
                    <div class="breadcrumbs">
                        <a href="/">Home</a> / <a href="{{ route('trainers') }}">Trainers</a> / <a href="{{ route('trainers') }}" class="current">{{ $trainer->first_name }} {{ $trainer->last_name }}</a>
                    </div>
                    <h1 class="page_title">{{ $trainer->first_name }} {{ $trainer->last_name }}</h1>
                    <p class="page_subtitle">@foreach($trainer->specializations as $specialization)
                            {{ $loop->first ? '' : ', ' }}
                            {{ $specialization->name }}
                        @endforeach</p>
                    <div class="socials">
                        <a href="#" class="linked-in"></a>
                        <a href="#" class="twitter"></a>
                        <a href="#" class="instagram"></a>
                    </div>
                    <div class="links">
                        <a class="btn js-change " href="{{ route('prices') }}" style="background: none;">JOIN NOW</a>
                        <a href="#shedule" class="anchor js-anchor">Schedule</a>
                    </div>
                </div>
            </div>
            <div class="right js-change" style="background: inherit">
                <div class="video_link getModal js-video" data-href="#video" data-src="XXXXXX" style="background-image: url(img/placeholder.jpg)">
                    <div class="play-btn"></div>
                </div>
            </div>
        </section>
        <section class="schedule" id="shedule">
            <div class="wrap">
                <div class="wrap_float">
                    <h2 class="title">Schedule {{ $trainer->first_name }} {{ $trainer->last_name }}</h2>
                    <div class="section_content">
                        @foreach($trainer->groupSessions as $index => $session)
                            <div class="item">
                                <div class="item_top">
                                    <div class="time">{{ \Carbon\Carbon::parse($session->date)->format('d F') }}, {{ \Carbon\Carbon::parse($session->start_time)->format('h:i A') }}</div>
                                </div>
                                <div class="item_center">
                                    <div class="classroom">Classroom #{{ $index + 1 }}</div>
                                    <h3 class="_title">
                                        {{ $session->name }}
                                    </h3>
                                </div>
                                <div class="item_bottom">
                                    <div class="trainer">
                                        <div class="img ie-img">
                                            <img src="{{secure_asset('storage/'.$trainer->picture)}}" alt="">
                                        </div>
                                        <div class="name">{{ $trainer->first_name }} {{ $trainer->last_name }}</div>
                                    </div>
                                    <a href="{{ route('user.group-sessions.browse', $session->id) }}" class="btn getModal">Join now</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        @include('partials/footer_public')
    </div>

    <div style="display: none;">
        <div class="modal modal_video" id="video">
            <div class="modal_wrap">
                <div class="video" id="video_wrap"></div>
                <div class="modal_close"></div>
            </div>
        </div>
    </div>

    <div style="display: none;">
        <div class="modal modal_window modal_question" id="ask">
            <div class="modal_wrap">
                <h2 class="modal_title">
                    Ask the coach a question
                </h2>
                <div class="modal_subtitle">
                    Any questions or&nbsp;something <br>is&nbsp;not working? Ask the coach
                </div>
                <form class="form">
                    <div class="input_wrap">
                        <input type="text" placeholder="Name*" class="input">
                    </div>
                    <div class="input_wrap tel">
                        <input type="tel" placeholder="Phone number*" class="input js-tel">
                    </div>
                    <div class="input_wrap fullwidth textarea_wrap">
                        <textarea class="textarea" placeholder="Message text"></textarea>
                    </div>
                    <div class="agreement">
                        <input type="checkbox" id="check-2" checked>
                        <label for="check-2">
                            I consent to the processing of <a href="#">personal data</a> and agree to the terms and <a href="#">privacy policy</a>
                        </label>
                    </div>
                    <button type="submit" class="btn submit js-send-btn">Send</button>
                </form>
                <div class="modal_close"></div>
            </div>
        </div>
    </div>

    <div style="display: none;">
        <div class="modal modal_window modal_training" id="buy">
            <div class="modal_wrap">
                <h2 class="modal_title">
                    1 individual training
                </h2>
                <div class="trainer">
                    <div class="userpic ie-img">
                        <img src="img/placeholder.jpg" alt="">
                    </div>
                    <div class="name">
                        John Digistrict
                    </div>
                </div>
                <div class="cost">$ 3235 / month</div>
                <form class="form">
                    <div class="input_wrap">
                        <input type="text" placeholder="Name*" class="input">
                    </div>
                    <div class="input_wrap tel">
                        <input type="tel" placeholder="Phone number*" class="input js-tel">
                    </div>
                    <div class="agreement">
                        <input type="checkbox" id="check-3" checked>
                        <label for="check-3">
                            I consent to the processing of <a href="#">personal data</a> and agree to the terms and <a href="#">privacy policy</a>
                        </label>
                    </div>
                    <button type="submit" class="btn submit js-send-btn">BUY NOW</button>
                </form>
                <div class="modal_close"></div>
            </div>
        </div>
    </div>

    <div style="display: none;">
        <div class="modal modal_window modal_training" id="join">
            <div class="modal_wrap">
                <h2 class="modal_title">
                    CrossFit Basics
                </h2>
                <div class="trainer">
                    <div class="userpic ie-img">
                        <img src="img/placeholder.jpg" alt="">
                    </div>
                    <div class="name">
                        John Digistrict
                    </div>
                </div>
                <div class="cost">$ 3235 / month</div>
                <form class="form">
                    <div class="input_wrap">
                        <input type="text" placeholder="Name*" class="input">
                    </div>
                    <div class="input_wrap tel">
                        <input type="tel" placeholder="Phone number*" class="input js-tel">
                    </div>
                    <div class="agreement">
                        <input type="checkbox" id="check-4" checked>
                        <label for="check-4">
                            I consent to the processing of <a href="#">personal data</a> and agree to the terms and <a href="#">privacy policy</a>
                        </label>
                    </div>
                    <button type="submit" class="btn submit js-send-btn">BUY NOW</button>
                </form>
                <div class="modal_close"></div>
            </div>
        </div>
    </div>

    <div style="display: none;">
        <div class="modal modal_window modal_training" id="vacancy">
            <div class="modal_wrap">
                <h2 class="modal_title">
                    Corporate sales Manager
                </h2>
                <div class="modal_subtitle">
                    Leave a request and we will contact you
                </div>
                <form class="form">
                    <div class="input_wrap">
                        <input type="text" placeholder="Name*" class="input">
                    </div>
                    <div class="input_wrap tel">
                        <input type="tel" placeholder="Phone number*" class="input js-tel">
                    </div>
                    <div class="agreement">
                        <input type="checkbox" id="check-5" checked>
                        <label for="check-5">
                            I consent to the processing of <a href="#">personal data</a> and agree to the terms and <a href="#">privacy policy</a>
                        </label>
                    </div>
                    <button type="submit" class="btn submit js-send-btn">Apply</button>
                </form>
                <div class="modal_close"></div>
            </div>
        </div>
    </div>

    <div style="display: none;">
        <div class="modal modal_window modal_success" id="success">
            <div class="modal_wrap">
                <h2 class="modal_title">
                    Thanks! Your data has been sent
                </h2>
                <div class="modal_subtitle">
                    Expect a response soon
                </div>
                <div class="modal_close"></div>
            </div>
        </div>
    </div>

    <script src="{{ secure_asset('public-website/js/jquery.min.js') }}"></script>
    <script src="{{ secure_asset('public-website/js/jquery-ui.min.js') }}"></script>
    <script src="{{ secure_asset('public-website/js/device.min.js') }}"></script>
    <script src="{{ secure_asset('public-website/js/lightgallery.js') }}"></script>
    <script src="{{ secure_asset('public-website/js/slick.min.js') }}"></script>
    <script src="{{ secure_asset('public-website/js/jquery.arcticmodal.min.js') }}"></script>
    <script src="{{ secure_asset('public-website/js/scripts.js') }}"></script>
</body>

</html>
