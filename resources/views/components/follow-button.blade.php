
@can('follow', $user)
    <form method="POST" action="{{ route('profile.follow', $user) }}">
        @csrf
        <button type="submit" class="tweet-button is-active">
            {{ current_user()->isFollowing($user) ? 'Unfollow me' : 'Follow me' }}
        </button>
    </form>

@endcan

