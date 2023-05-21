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
                <h1 class="page_title">Purchase a club card</h1>
                <div class="text">
                    Own Your Fitness Journey: Purchase Your Club Card Today and Gain Access to a World of Health and Wellness. Enjoy exclusive benefits, flexible membership options, and a wide range of fitness facilities, all conveniently available with our Club Card. Start your fitness transformation and invest in a healthier lifestyle now
                </div>
                <div class="links">
                    <a class="btn" href="#lessons-accordion">BUY NOW</a>
                    <a href="#lessons-accordion" class="lessons-link js-anchor">Memberships Plans</a>
                </div>
                <div class="clubcard">
                    <div class="left ie-img">
                        <img src="{{ asset('public-website/img/card.png') }}" alt="">
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
                                    <button class="btn js-subscribe getModal" data-href="#buy"></button>
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
    <div class="modal modal_window modal_training membership-modal" id="buy">
        <div class="modal_wrap">
            <h2 class="modal_title membership-name">

            </h2>
            <div class="trainer">
                <div class="userpic ie-img">
                    <img src="{{ secure_asset('images/logo/logo-c.svg') }}" alt="">
                </div>
                <div class="name">
                    Gym Tracker
                </div>
            </div>
            <div class="cost membership-cost"></div>
            <form class="form" id="subscriptionForm" method="POST">
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
                <button type="submit" class="btn js-subscribe"></button>
            </form>
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
    window.Laravel = {!! json_encode([
        'isLoggedin' => auth()->check(),
        'hasSubscription' => auth()->check() && auth()->user()->member->getSubscriptionStatus() == 'active',
    ]) !!};

    console.log(window.Laravel.user);
</script>

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

    });

    fetch('/member-data')
        .then(response => response.json())
        .then(member => {
            if (window.Laravel.isLoggedin && !window.Laravel.hasSubscription && member) {
                $('#subscriptionForm').attr('action', '/resubscribe');
                $('.js-subscribe').text('Resubscribe');

                $('input[name="first_name"]').val(member.first_name).prop('disabled', true);
                $('input[name="last_name"]').val(member.last_name).prop('disabled', true);
                $('input[name="email"]').val(member.email).prop('disabled', true);
                $('input[name="phone_number"]').val(member.phone_number).prop('disabled', true);
                $('input[name="date_of_birth"]').val(member.date_of_birth).prop('disabled', true);
                $('input[name="address"]').val(member.address).prop('disabled', true);
            } else {
                $('#subscriptionForm').attr('action', '/subscribe');
                $('.js-subscribe').text('Subscribe');

                $('input[name="first_name"], input[name="last_name"], input[name="email"], input[name="phone_number"], input[name="date_of_birth"], input[name="address"]').val('').prop('disabled', false);
            }
        });



</script>
</body>

</html>
