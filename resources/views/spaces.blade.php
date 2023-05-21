<!DOCTYPE html>
<html lang="en">

@include('partials/header_files')

<body>
<div class="container page vacancies-page">
    @include('partials/header_public2')
    <div class="breadcrumbs">
        <div class="wrap">
            <div class="wrap_float">
                <a href="/">Home</a> / <a href="vacancies.html" class="current">Workout Areas</a>
            </div>
        </div>
    </div>
    <section class="vacancies">
        <div class="wrap">
            <div class="wrap_float">
                <h1 class="title">Exploring Gym Tracker Fitness Club's Dynamic Workout Areas</h1>
                <div class="text">
                    Gym Tracker Fitness Club offers a variety of workout spaces to cater to different fitness needs, from cardio zones to weightlifting sections and group exercise studios.
                </div>
                <div class="sorting">
                    <div class="sorting-item">
                        <div class="label">Spaces:</div>
                        <div class="select_div">
                            <div class="select_val">All</div>
                            <select id="space-select" class="js-select">
                                <option value="">All</option>
                                @foreach($spaces as $space)
                                    <option value="{{ $space->id }}" {{ request('space_id') == $space->id ? 'selected' : '' }}>{{ $space->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="section_content">
                    <div class="vacancies_list" id="vacancies_list">
                        @foreach($gyms as $gym)
                            <div class="vacancy-item">
                                <div class="vacancy-head">
                                    <div class="_title">{{ $gym->name }}</div>
                                    <div class="_city" style="width: 100%">Address: <b>{{ $gym->address }}</b></div>
                                </div>
                                <div class="vacancy-body">
                                    <div class="text" style="margin-bottom: 2%">
                                        <p>
                                            Spaces Availables
                                        </p>
                                    </div>
                                    <div class="info">
                                        @foreach($gym->spaces as $space)
                                            @php
                                                $isEmpty = empty($space->description);
                                            @endphp

                                            <div class="_item" {{ $isEmpty ? 'style=margin-bottom:20px' : '' }}>
                                                <h3 class="_title">
                                                    {{ $space->name }}
                                                </h3>

                                                @if(!$isEmpty)
                                                    <div class="p">
                                                        <p>
                                                            {{ $space->description }}
                                                        </p>
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="btn_wrap">
                                        <a class="btn" href="{{ route('prices') }}">JOIN OUR CLUB</a>
                                    </div>
                                    <div class="date">
                                        DATE OF PUBLICATION: {{ \Carbon\Carbon::parse($gym->updated_at)->format('d M. Y') }}
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
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
<script>
    $(document).ready(function() {
        $('#space-select').change(function() {
            var selectedSpace = $(this).val();
            var selectedSpaceText = $(this).find('option:selected').text();
            $('#selected-value').text(selectedSpaceText);
            var url = new URL(window.location.href);

            if (selectedSpace) {
                url.searchParams.set('space_id', selectedSpace);
            } else {
                url.searchParams.delete('space_id');
            }

            window.location.href = url.href;
        });

        // Get the selected text after page reload
        var selectedSpaceText = $('#space-select option:selected').text();
        $('.select_val').text(selectedSpaceText);
    });
</script>

</body>

</html>
