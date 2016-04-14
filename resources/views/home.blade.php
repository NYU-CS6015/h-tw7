@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" id="timeline">
        <div class="col-md-4">
            <form action="#" v-on:submit="postStatus">
                <div class="form-group">
                    <textarea class="form-control" rows="5" placeholder="What are you upto?" maxlength="140" required v-model="post"></textarea>
                </div>
                <input type="submit" value="Post" class="form-control">
            </form>
        </div>
        <div class="col-md-8">
            <p v-if="!posts.length">No posts to see here yet.</p>
            <div class="posts" v-if="posts.length">
                <div class="media" v-for="post in posts" track-by="id" transition="expand">
                    <div class="media-body">
                        <div class="user">
                            @foreach ($posts as $post)
                                <a href="{{ url('/users/' . $post->user->name) }}"><strong>@{{ $post->user->name }}</strong></a> 
                                <p>{{ $post->body }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <a href="#" class="btn btn-primary" v-if="total > posts.length" v-on:click="getMorePosts($event)">Show more</a>
        </div>
    </div>
</div>
@endsection
