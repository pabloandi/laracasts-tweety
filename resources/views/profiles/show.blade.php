@extends('layouts.app')

@section('content')

<header class="mb-6">
    <img class="rounded-3xl" src="/images/default-profile-banner.png" alt="banner">

    <div class="flex justify-between">
        <div>
            <h2 class="font-bold">{{ $user->name }}</h2>
            <p class="">Joined {{ $user->created_at->diffForHumans() }} </p>
        </div>

        <div>
            <a href="#" class="tweet-button is-default">Edit Profile</a>
            <a href="#" class="tweet-button is-active">Follow me</a>
        </div>
    </div>
</header>

@include('_timeline-list', ['tweets' => $user->tweets])

@endsection
