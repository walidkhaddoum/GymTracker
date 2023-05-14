<!DOCTYPE html>
<html lang="en">

@include('partials/header_files')

<body>
<div class="container page">
    @include('partials/header_public2')
    <div class="breadcrumbs">
        <div class="wrap">
            <div class="wrap_float">
                <a href="/">Home</a> / <a href="#" class="current">Classes</a>
            </div>
        </div>
    </div>
    <section class="classes_list_section">
        <div class="wrap">
            <div class="wrap_float">
                <h2 class="page_title">Classes</h2>
                <div class="classes_list">
                    @foreach($sessions as $session)
                        <a href="{{ route('user.group-sessions.browse', $session->id) }}" class="classes_item" style="background-color: #FF5100" data-color-type="dark">
                            <div class="classes_item_right">
                                <div class="image ie-img">
                                    <img class="js-image" alt="">
                                </div>
                            </div>
                            <div class="classes_item_left">
                                <p class="block _category">Group programs</p>
                                <h3 class="block _title">{{ $session->name }}</h3>
                                <div class="_author">
                                    <div class="img ie-img">
                                        <img src="{{asset('storage/'.$session->session_assignments->first()->trainer->picture)}}" alt="">
                                    </div>
                                    <p class="block name">{{ $session->session_assignments->first()->trainer->first_name }} {{ $session->session_assignments->first()->trainer->last_name }}</p>
                                </div>
                            </div>
                            <div class="bg js-image-background"></div>
                        </a>
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

    var colors = ["#FF5100", "#7749FF", "#FF4F58", "#FF9D00", "#E1FF7E", "#FFDC49", "#343434"];
    var items = document.getElementsByClassName('classes_item');
    for(var i = 0; i < items.length; i++) {
        items[i].style.backgroundColor = colors[Math.floor(Math.random()*colors.length)];
    }
    let numImages = $(".classes_item").length;

    let pexelsAPIKey = "vyLPmwijFSiv4I4dNzffZANpduGv1qSe5UedPgkG95cRsgOOimKgwHv5";

    fetch(`https://api.pexels.com/v1/search?query=fitness&per_page=${numImages}&page=1`, {
        headers: {
            Authorization: pexelsAPIKey
        }
    }).then(response => response.json())
        .then(data => {
            let imageUrls = data.photos.map(photo => photo.src.medium);
            assignImages(imageUrls);
        }).catch(error => console.log('error', error));

    function assignImages(imageUrls) {
        $(".classes_item").each(function(i, elem) {
            if (imageUrls[i]) {
                $(this).find(".js-image").attr("src", imageUrls[i]);
                $(this).find(".js-image-background").css("background-image", `url(${imageUrls[i]})`);
            }
        });
    }



</script>
</body>

</html>
