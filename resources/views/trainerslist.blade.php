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
