<!DOCTYPE html>
<html lang="en">

@include('partials/header_files')

<body>
<div class="container">
    @include('partials/header_public')
    <section class="top_slider">
        <div class="slider_wrap" id="main_slider">
            <div class="slide" data-color="#FF5100" data-color-type="dark">
                <div class="left" style="background-image: url({{ asset('public-website/img/placeholder.jpg') }})">
                    <div class="slide_content">
                        <div>
                            <h2 class="_title">
                                The Best Fitness Classes With Professionals
                            </h2>
                            <p class="_subtitle">
                                Make a website you’ll be proud of
                            </p>
                            <a href="{{ url('/courses-list') }}" class="btn">JOIN NOW</a>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <div class="right_top">
                        <p class="p">
                            <i></i>
                            The Best Fitness <br>Classes <a href="{{ route('trainers') }}">With <br>Professionals</a>
                        </p>
                    </div>
                    <div class="right_bottom">
                        <a class="video_link getModal js-video" data-href="#video" data-src="XXXXXX" style="background-image:  url({{ asset('public-website/img/video_link.jpg') }})">
                            <div class="play-btn"></div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="slide" data-color="#FF4F58" data-color-type="dark">
                <div class="left" style="background-image: url({{ asset('public-website/img/slider4.jpg') }})">
                    <div class="slide_content">
                        <div>
                            <h2 class="_title">
                                The Best CrossFit Classes With Professionals
                            </h2>
                            <p class="_subtitle">
                                Make a website you’ll be proud of
                            </p>
                            <a href="{{ url('/courses-list') }}" class="btn">JOIN NOW</a>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <div class="right_top">
                        <p class="p">
                            <i></i>
                            The Best CrossFit <br>Classes <a href="{{ route('trainers') }}">With <br>Professionals</a>
                        </p>
                    </div>
                    <div class="right_bottom">
                        <a class="video_link getModal js-video" data-href="#video" data-src="XEwYuqMWo8U" style="background-image: url({{ asset('public-website/img/video_link_4.jpg') }})">
                            <div class="play-btn"></div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="slide" data-color="#7749FF" data-color-type="dark">
                <div class="left" style="background-image: url({{ asset('public-website/img/slider3.jpg') }})">
                    <div class="slide_content">
                        <div>
                            <h2 class="_title">
                                The Best Yoga Classes With Professionals
                            </h2>
                            <p class="_subtitle">
                                Make a website you’ll be proud of
                            </p>
                            <a href="{{ url('/courses-list') }}" class="btn">JOIN NOW</a>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <div class="right_top">
                        <p class="p">
                            <i></i>
                            The Best Yoga <br>Classes <a href="{{ route('trainers') }}">With <br>Professionals</a>
                        </p>
                    </div>
                    <div class="right_bottom">
                        <a class="video_link getModal js-video" data-href="#video" data-src="XXXXXX" style="background-image: url({{ asset('public-website/img/video_link_3.jpg') }})">
                            <div class="play-btn"></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom_block">
            <div class="wrap">
                <div class="wrap_float">
                    <a href="#schedule" class="scroll_down pulse js-anchor">
                        Scroll
                    </a>
                    <div class="socials">
                        <a href="#" class="linked-in"></a>
                        <a href="#" class="twitter"></a>
                        <a href="#" class="instagram"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="arrows">
            <div class="arrow prev"></div>
            <div class="arrow next"></div>
        </div>
    </section>
    <section class="classes">
        <div class="wrap">
            <div class="wrap_float">
                <div class="section_top">
                    <h2 class="title">Our classes</h2>
                    <div class="arrows">
                        <div class="arrow prev">Prev</div>
                        <div class="arrow next">Next</div>
                    </div>
                    <a href="{{ route('courses-list') }}" class="link"><span>All Classes</span></a>
                </div>
                <div class="slider_wrap">
                    <div class="classes_slider" id="classes_slider">
                        @foreach($sessions as $session)
                            <a href="{{ route('session.redirect', $session) }}" class="slide classes_item" style="background-color: #FF5100" data-color-type="dark">
                                <div class="slide_right">
                                    <div class="image ie-img">
                                        <img class="js-image" alt="">
                                    </div>
                                </div>
                                <div class="slide_left">
                                    <div class="_category">Group programs</div>
                                    <h3 class="_title">{{ $session->name }}</h3>
                                    <div class="_author">
                                        <div class="img ie-img">
                                            <img src="{{asset('storage/'.$session->trainers->first()->picture)}}" alt="">
                                        </div>
                                        <p class="name">{{ $session->trainers->first()->first_name ?? '' }} {{ $session->trainers->first()->last_name ?? '' }}</p>
                                    </div>
                                </div>
                                <div class="bg js-image-background"></div>
                            </a>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="schedule" id="schedule">
        <div class="wrap">
            <div class="wrap_float">
                <h2 class="title">Schedule</h2>
                <div class="date date-field js-date">
                    <div class="date-span"><span class="js-day"></span> <span class="js-month"></span> <span class="js-year"></span></div>
                    <input type="text" class="js_calendar input-date">
                    <input type="hidden" value="" class="input-date-value">
                </div>
                <div class="section_content">
                    <div class="schedule-container">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="trainers">
        <div class="wrap">
            <div class="wrap_float">
                <div class="section_top">
                    <h2 class="title">Our trainers</h2>
                    <div class="arrows">
                        <div class="arrow prev">Prev</div>
                        <div class="arrow next">Next</div>
                    </div>
                    <a href="{{ route('trainers') }}" class="link"><span>All trainers</span></a>
                </div>
                <div class="section_content">
                    <div class="trainers_slider" id="trainers_slider">
                        @foreach($trainers as $trainer)
                            <div class="item">
                                <a href="{{ route('trainer.show', ['id' => $trainer->id]) }}" class="photo ie-img">
                                    <img src="{{asset('storage/'.$trainer->picture)}}" alt="">
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
        </div>
    </section>
    <section class="blog_section">
        <div class="wrap">
            <div class="wrap_float">
                <div class="section_top">
                    <h2 class="title">Blog</h2>
                    <a href="#" class="link">All Post</a>
                </div>
                <div class="section_content">
                    <a href="#" class="blog_item">
                        <div class="img ie-img">
                            <img src="{{ asset('public-website/img/blog-1.jpg') }}" alt="">
                        </div>
                        <p class="_date">FITNESS / 20 MAI. 2023</p>
                        <h3 class="_title">
                            Sweat it Out: Unleashing Your Inner Athlete
                        </h3>
                    </a>

                    <a href="#" class="blog_item">
                        <div class="img ie-img">
                            <img src="{{ asset('public-website/img/blog-2.jpg') }}" alt="">
                        </div>
                        <p class="_date">FITNESS / 20 MAI. 2023</p>
                        <h3 class="_title">
                            Fit and Fabulous: Your Journey to a Healthier You
                        </h3>
                    </a>

                    <a href="#" class="blog_item">
                        <div class="img ie-img">
                            <img src="{{ asset('public-website/img/blog-3.jpg') }}" alt="">
                        </div>
                        <p class="_date">FITNESS / 20 MAI. 2023</p>
                        <h3 class="_title">
                            From Couch Potato to Fitness Enthusiast: Embracing the Active Lifestyle
                        </h3>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="video_section ie-img">
        <img src="{{ asset('public-website/img/video_img.jpg') }}" class="img" alt="">
        <div class="wrap">
            <div class="wrap_float">
                <h2 class="title">
                    The Best Fitness <br>Classes With <br>Professionals
                </h2>
                <div class="play_btn getModal js-video" data-href="#video" data-src="XXX">
                    Watch <br>the video
                </div>
            </div>
        </div>
    </section>
    <section class="section_description">
        <div class="wrap">
            <div class="wrap_float">
                <h2 class="title">Gym Tracker Fitness Club</h2>
                <p class="block text">
                    Gym Tracker Fitness Club is a project developed by Walid Khaddoum using the Laravel framework. It is a comprehensive fitness management system designed to streamline and enhance the operations of fitness clubs. With Gym Tracker, fitness club owners and managers can effortlessly manage memberships, track attendance, schedule classes, and handle billing and payments. The project incorporates a user-friendly interface that allows members to easily access their profiles, view class schedules. Gym Tracker Fitness Club aims to optimize efficiency and provide a seamless experience for both fitness club administrators and members, ensuring a smooth and enjoyable fitness journey for all.
                </p>
            </div>
        </div>
    </section>
    <div class="instagram-block">
        <a class="item ie-img">
            <img src="{{ asset('public-website/img/picture1.jpg') }}" alt="">
        </a>
        <a class="item ie-img">
            <img src="{{ asset('public-website/img/picture2.jpg') }}" alt="">
        </a>
        <a class="item ie-img">
            <img src="{{ asset('public-website/img/picture3.jpg') }}" alt="">
        </a>
        <a class="item ie-img">
            <img src="{{ asset('public-website/img/picture4.jpg') }}" alt="">
        </a>
    </div>
    @include('partials/footer_public')
</div>

<script src="{{ asset('public-website/js/jquery.min.js') }}"></script>
<script src="{{ asset('public-website/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('public-website/js/device.min.js') }}"></script>
<script src="{{ asset('public-website/js/lightgallery.js') }}"></script>
<script src="{{ asset('public-website/js/slick.min.js') }}"></script>
<script src="{{ asset('public-website/js/jquery.arcticmodal.min.js') }}"></script>
<script src="{{ asset('public-website/js/scripts.js') }}"></script>
<script>
    let baseUrl = document.getElementById('base-url').getAttribute('content');
    let storageBaseUrl = baseUrl + "/storage/";
    let today = new Date();
    let day = today.getDate();
    let month = today.toLocaleString('default', { month: 'long' });
    let year = today.getFullYear();

    let formattedDate = ('0' + day).slice(-2) + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + year;

    $(".js-day").text(day);
    $(".js-month").text(month);
    $(".js-year").text(year);

    console.log(formattedDate);

    function fetchSessions(date) {
        $.ajax({
            url: '/get-schedule',
            type: 'GET',
            data: {date: date},
            dataType: 'json',
            success: function (data) {
                displayGroupSessions(data);

            },
            error: function (error) {
                console.log('Error:', error);
            },
        });
    }

    fetchSessions(formattedDate);

    function displayGroupSessions(groupSessions) {
        let container = $('.schedule-container');
        container.empty();

        groupSessions.forEach((groupSession) => {
            let item = `
                        <div class="item" data-color="#FFDC49" data-color-type="light">
                            <div class="item_top">
                                <div class="time">${groupSession.date}, ${groupSession.start_time}</div>
                                <div class="category">${groupSession.name}</div>
                            </div>
                            <div class="item_center">
                                <div class="classroom">Classroom #1</div>
                                <h3 class="_title">
                                    ${groupSession.name}
                                </h3>
                            </div>
                            <div class="item_bottom">
                                <div class="trainer">
                                    <div class="img ie-img">
                                        <img src="${storageBaseUrl}${groupSession.trainer_image}" alt="">
                                    </div>
                                    <p class="name">${groupSession.trainer_name}</p>
                                </div>
                                <button data-href="#join" class="btn getModal">Join now</button>
                            </div>
                        </div>
                        `;

            container.append(item);
        });
    }

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
