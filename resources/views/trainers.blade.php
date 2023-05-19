<!DOCTYPE html>
<html lang="en">

@include('partials/header_files')
<meta name="csrf-token" content="{{ csrf_token() }}">

<body>
<div class="container page">
    @include('partials/header_public2')
    <div class="breadcrumbs">
        <div class="wrap">
            <div class="wrap_float">
                <a href="/">Home</a> / <a href="{{ route('trainers') }}l" class="current">Trainers</a>
            </div>
        </div>
    </div>
    <section class="trainers trainers_section">
        <div class="wrap">
            <div class="wrap_float">
                <h1 class="page_title">Trainers</h1>
                <div class="text">
                    Meet our Expert Trainers: Get Ready to Elevate Your Fitness Journey with their Guidance and Support. Experience personalized training sessions tailored to your goals, led by our dedicated team of experienced and certified fitness trainers.
                </div>
                <div class="select-trainer">
                    <div class="trainers-p">Specialities:</div>
                    <div class="select_div">
                        <div class="select_val">All</div>
                        <select class="js-select" id="specializationSelect">
                            <option value="All Classes">All</option>
                            @foreach($specializations as $specialization)
                                <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="section_content" id="trainersContainer">
                    @foreach($trainers as $trainer)
                        <div class="item">
                            <a href="{{ route('trainer.show', ['id' => $trainer->id]) }}" class="photo ie-img">
                                <img src="{{ asset('storage/'.$trainer->picture) }}" alt="">
                            </a>
                            <a href="{{ route('trainer.show', ['id' => $trainer->id]) }}" class="info">
                                <div class="name">{{ $trainer->first_name }} {{ $trainer->last_name }}</div>
                                <div class="category">
                                    @foreach($trainer->specializations as $specialization)
                                        {{ $loop->first ? '' : ', ' }}
                                        {{ $specialization->name }}
                                    @endforeach
                                </div>
                            </a>

                            <div class="socials">
                                <a href="#" class="linked-in"></a>
                                <a href="#" class="twitter"></a>
                                <a href="#" class="instagram"></a>
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

<script src="{{ asset('public-website/js/jquery.min.js') }}"></script>
<script src="{{ asset('public-website/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('public-website/js/device.min.js') }}"></script>
<script src="{{ asset('public-website/js/lightgallery.js') }}"></script>
<script src="{{ asset('public-website/js/slick.min.js') }}"></script>
<script src="{{ asset('public-website/js/jquery.arcticmodal.min.js') }}"></script>
<script src="{{ asset('public-website/js/scripts.js') }}"></script>
<script>
    $(document).ready(function() {
        $('select[name="specialization"]').on('change', function() {
            var specializationId = $(this).val();
            console.log(specializationId);

        });
    })
</script>

<script>
    // Get the select element
    const specializationSelect = document.getElementById('specializationSelect');

    // Get the container element for trainers
    const trainersContainer = document.getElementById('trainersContainer');

    // Add an event listener for the select element
    specializationSelect.addEventListener('change', function() {
        const specializationId = this.value; // Get the selected specialization ID

        // Send an AJAX request to fetch trainers based on the selected specialization
        fetch(`/trainers/${specializationId}`)
            .then(response => response.text())
            .then(data => {
                console.log(data);
                trainersContainer.innerHTML = data; // Populate the trainers container with the fetched data
            })
            .catch(error => {
                console.log('Error:', error);
            });
    });
</script>
<script>
    $(document).ready(function() {
        $('.js-select').change(function() {
            var selectedOption = $(this).children("option:selected").text();
            $('.select_val').text(selectedOption);
        });
    });
</script>
</body>

</html>
