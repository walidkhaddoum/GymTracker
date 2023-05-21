@foreach($sessions as $session)
    <a href="{{ route('user.group-sessions.browse', $session->id) }}" class="classes_item" style="background-color: #FF5100" data-color-type="dark">
        <div class="classes_item_right">
            <div class="image ie-img">
                <img class="js-image" alt="">
            </div>
        </div>
        <div class="classes_item_left">
            @if ($session->catalogues->isNotEmpty())
                <p class="block _category">{{ $session->catalogues->first()->name }}</p>
            @endif
            <h3 class="block _title">{{ $session->name }}</h3>
            @if($session->session_assignments->isNotEmpty())
                <div class="_author">
                    <div class="img ie-img">
                        <img src="{{secure_asset('storage/'.$session->session_assignments->first()->trainer->picture)}}" alt="">
                    </div>
                    <p class="block name">{{ $session->session_assignments->first()->trainer->first_name }} {{ $session->session_assignments->first()->trainer->last_name }}</p>
                </div>
            @endif
        </div>
        <div class="bg js-image-background"></div>
    </a>
@endforeach
