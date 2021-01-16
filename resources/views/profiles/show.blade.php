<x-app>
    <header class="mb-6" style="position: relative;">
        <div class="relative">
            <img
                src="/images/default-profile-banner.png"
                alt="banner"
                class="rounded-3xl mb-2"
            >
            <img
                src="{{ $user->avatar }}"
                alt="Avatar"
                class="profile-avatar"
            >
        </div>

        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="font-bold text-2xl">{{ $user->name }}</h2>
                <p class="text-sm">Joined {{ $user->created_at->diffForHumans() }} </p>
            </div>

            <div class="flex">
                @can('update', $user)
                    <a href="{{ route('profile.edit', current_user()) }}" class="tweet-button is-default mr-2">Edit Profile</a>
                @endcan

                <x-follow-button :user="$user"></x-follow-button>
            </div>
        </div>



        <p class="text-sm"> {{ $user->description }}</p>

    </header>

    @include('_timeline-list', ['tweets' => $user->tweets])

</x-app>

