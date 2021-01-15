<x-app>
    <header class="mb-6" style="position: relative;">
        <img
            src="/images/default-profile-banner.png"
            alt="banner"
            class="rounded-3xl mb-2"
        >

        <div class="flex justify-between items-center mb-4">
            <div>
                <h2 class="font-bold text-2xl">{{ $user->name }}</h2>
                <p class="text-sm">Joined {{ $user->created_at->diffForHumans() }} </p>
            </div>

            <div>
                <a href="#" class="tweet-button is-default mr-2">Edit Profile</a>
                <a href="#" class="tweet-button is-active">Follow me</a>
            </div>
        </div>

        <img
            src="{{ $user->avatar }}"
            alt="Avatar"
            class="profile-avatar"
        >

        <p class="text-sm"> {{ $user->description }}</p>

    </header>

    @include('_timeline-list', ['tweets' => $user->tweets])

</x-app>

