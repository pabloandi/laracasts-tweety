<h3 class="font-bold text-xl mb-4">Friends</h3>
<ul>
    @forelse (current_user()->follows as $follow)
        <li class="mb-4">
            <div>
                <a href="{{ $follow->profileRoute }}" class="flex items-center text-sm">
                    <img
                        src="{{ $follow->avatar }}"
                        alt="Avatar"
                        class="rounded-full mr-2"
                        width="40"
                        height="40"
                    >
                    {{ $follow->name }}
                </a>
            </div>
        </li>
    @empty
        <li>No friends yet!</li>
    @endforelse
</ul>
