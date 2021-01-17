<div class="timeline-list">
    @forelse ($tweets as $tweet)
        @include('_tweet', $tweet)

    @empty
        <p class="p-4">No tweets yet.</p>
    @endforelse

</div>

{{ $tweets->links() }}
