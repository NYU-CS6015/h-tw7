@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $user->name }}</h2>
                <h4>Location: {{$user->location}}</h4>

                @if (Auth::user()->isNot($user))
                    @if (Auth::user()->isFollowing($user))
                        <a href="{{ route('user.unfollow', $user) }}">Unfollow</a>
                    @else
                        <a href="{{ route('user.follow', $user) }}">Follow</a>
                    @endif
                @endif
                <h3> following &nbsp; {{sizeof($followees)}} &nbsp; people </h3>
                
                @foreach ($followees as $followee)
                    <ol>
                        {{ $followee->name }}
                    </ol>
                @endforeach
                
                <h3> followed by &nbsp; {{sizeof($followers)}} &nbsp; people  </h3>
                @foreach ($followers as $follower)
                    <ol>
                        {{ $follower->name }}
                    </ol>
                @endforeach
            </div>
        </div>
    </div>
@endsection
