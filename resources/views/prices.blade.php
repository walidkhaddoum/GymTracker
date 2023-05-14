<!DOCTYPE html>
<html lang="en">

@include('partials/header_files')

<body>
<div class="container page price-page">
    @include('partials/header_public2')
    <div class="breadcrumbs">
        <div class="wrap">
            <div class="wrap_float">
                <a href="/">Home</a> / <a href="price.html" class="current">Price</a>
            </div>
        </div>
    </div>
    <section class="price_section">
        <div class="wrap">
            <div class="wrap_float">
                <h1 class="page_title">To purchase a club card <br>or Individual lesson</h1>
                <div class="text">
                    Introductory instruction in the direction of Cycle Connect-training based on the power index (FTP). Each time you connect to the system, the simulator adjusts the complexity to a specific person. Thus, in one lesson, people with different levels of training can be at neighboring simulators.
                </div>
                <div class="links">
                    <button class="btn getModal" data-href="#buy">BUY NOW $235</button>
                    <a href="#lessons-accordion" class="lessons-link js-anchor">INDIVIDUAL LESSONS</a>
                </div>
                <div class="clubcard">
                    <div class="left ie-img">
                        <img src="img/card.png" alt="">
                    </div>
                    <div class="right">
                        <h3 class="_title">The club card includes</h3>
                        <ul>
                            <li>Trial (introductory) massage session</li>
                            <li>Classes in the gym</li>
                            <li>Cardio classes</li>
                            <li>Swimming pool visit</li>
                            <li>Lessons in the halls of group programs</li>
                            <li>Yoga classes</li>
                            <li>A series of martial arts training</li>
                            <li>Wi-Fi</li>
                            <li>Towels</li>
                        </ul>
                    </div>
                </div>
                <div class="lessons-accordion" id="lessons-accordion">
                    <h2 class="title">Individual lesson</h2>
                    <div class="lessons">
                        @php
                            $colors = ['E1FF7E', '7749FF', 'FF5100', 'FF4F58', 'FF9D00', 'FFDC49'];
                        @endphp

                        @foreach($memberships as $index => $membership)
                            @php
                                $color = $colors[$index % count($colors)];
                            @endphp
                            <div class="accordion-item js-price-item" id="membership-{{ $membership->id }}" data-color="#{{ $color }}" data-color-type="light">
                                <div class="lessons_top">
                                    <h3 class="title">{{ $membership->name }}</h3>
                                    <div class="cost">From {{ $membership->price }}DH/Month</div>
                                    <button class="btn js-subscribe getModal" data-href="#buy">Subscribe</button>
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
    <div class="modal modal_window modal_training membership-modal" id="buy">
        <div class="modal_wrap">
            <h2 class="modal_title membership-name">

            </h2>
            <div class="trainer">
                <div class="userpic ie-img">
                    <img src="{{ asset('images/logo/logo-c.svg') }}" alt="">
                </div>
                <div class="name">
                    Gym Tracker
                </div>
            </div>
            <div class="cost membership-cost"></div>
            <form class="form" method="POST" action="/subscribe">
                @csrf
                <input type="hidden" name="gym_membership_id" id="gym_membership_id" value="">
                <div class="input_wrap" style="margin-bottom: 40px;margin-right: 40px;">
                    <input type="text" name="first_name" placeholder="First Name*" class="input">
                </div>
                <div class="input_wrap" style="margin-bottom: 40px;">
                    <input type="text" name="last_name" placeholder="Last Name*" class="input">
                </div>
                <div class="input_wrap" style="margin-bottom: 40px;margin-right: 40px;">
                    <input type="email" name="email" placeholder="Email*" class="input">
                </div>
                <div class="input_wrap" style="margin-bottom: 40px;">
                    <input type="text" name="phone_number" placeholder="Phone Number*" class="input">
                </div>
                <div class="input_wrap" style="margin-bottom: 40px;margin-right: 40px;">
                    <input type="date" name="date_of_birth" placeholder="Date of birth*" class="input">
                </div>
                <div class="input_wrap" style="margin-bottom: 40px;">
                    <input type="text" name="address" placeholder="Address*" class="input">
                </div>
                <div class="agreement" style="margin-bottom: 10px;">
                    <input type="checkbox" id="check-3" checked>
                    <label for="check-3">
                        I consent to the processing of <a href="#">personal data</a> and agree to the terms and <a href="#">privacy policy</a>
                    </label>
                </div>
                <button type="submit" class="btn">Subscribe</button>
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
                Thank You for Subscribing!
            </h2>
            <div class="modal_subtitle">
                You now have access to your dashboard. Use your email as your password to log in. Please remember to change your password after your first login. Enjoy your workouts!
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
        $('.js-price-item').click(function() {
            $('.membership-modal').show();
            // Get the membership id
            var membershipId = $(this).attr('id').split('-')[1];

            // Get the membership name and price
            var membershipName = $(this).find('.title').text();
            var membershipCost = $(this).find('.cost').text();

            // Update the gym_membership_id in the form
            $('#gym_membership_id').val(membershipId);

            // Update the modal
            $('.membership-modal .membership-name').text(membershipName);
            $('.membership-modal .membership-cost').text(membershipCost);

            // Open the modal
            $('.membership-modal').show();
        });

        // Close the modal when the close button is clicked
        $('.modal_close').click(function() {
            $('.membership-modal').hide();
        });
    });

    $('.subscribe-btn').click(function() {
        // Get the membership id
        var membershipId = $(this).closest('.js-price-item').attr('id').split('-')[1];

        // Get the membership name and price
        var membershipName = $(this).closest('.js-price-item').find('.title').text();
        var membershipCost = $(this).closest('.js-price-item').find('.cost').text();


        // Update the modal
        $('.membership-modal .membership-name').text(membershipName);
        $('.membership-modal .membership-cost').text(membershipCost);

        // Update the hidden input
        $('#gym_membership_id').val(membershipId);

        // Open the modal
        $('.membership-modal').show();
    });

</script>

</body>

</html>
