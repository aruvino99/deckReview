@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                
                <div class="card-header">
                    <div style="float: left;" class="mt-1"><span>Thread list</span></div>
                    <div style="text-align: right;"><a href="/create"><button type="button" class="btn btn-primary btn-sm">New</button></a></div>
                </div>

                <div class="card-body">
                    @foreach ($threads as $thread)
                    <a href="/thread/{{$thread->id}}" style="text-decoration: none; color: black;">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-text">User : {{ $users[($thread->user_id - 2)]->name }}</p>
                                <h5 class="card-title">{{ $thread->title }}</h5>
                            </div>
                            <div class="small card-footer text-muted text-right">
                                {{$thread->updated_at}}
                            </div>
                        </div>
                        <br>
                    </a>
                    @endforeach
                </div>

                <div style="margin: 0 auto;">
                    {{$threads->links()}}
                </div>
                
            </div>
        </div>
    </div>
</div>

@endsection
