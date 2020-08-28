@extends('layouts.app')

@section('content')
<header class="mb-6">
    <img
        src="/images/timeline.jpeg"

        alt=""
        class="mb-2"
        >

        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-bold text-2xl">{{ $user->name }}</h2>
                <p class="text-sm">Joined {{ $user->created_at->diffForHumans() }}</p>
            </div>


            <div>
                <a href="" class="rounded-full border border-gray-300 shadow py-2 px-4 text-black text-xs mr-2">Edit Profile</a>
                <a href="" class="bg-blue-500 rounded-full shadow py-2 px-4 text-white text-xs">Follow Me</a>
            </div>

            <img
                src="{{ $user->avatar }}"
                alt=""
                class="rounded-full absolute"
                style="width: 150px;margin-top: -38px;left: calc(50% - 75px)"
            >

        </div>
</header>

    @include('_timeline',[
        'tweets' => $user->tweets
    ])

@endsection
