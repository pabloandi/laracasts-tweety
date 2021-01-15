<div class="timeline-list">
    @foreach ($tweets as $tweet)
        @include('_tweet', $tweet)
    @endforeach
</div>
