@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">

                <div class="card-header">
                    <a href="/" style="text-decoration: none; color: black;"><div style="float: left;"><button type="button" class="btn btn-secondary btn-sm">Back</button></div></a>
                    <div style="text-align: right;" class="mt-1"><span>User : {{$user->name}}</span></div>
                </div>

                <div class="card-body">

                    <h3>{{$thread->title}}</h3>

                    <a href="/{{$thread->image}}">
                        <img style="display: block; margin: auto; height: 300px;" src="/{{$thread->image}}" class="image img-fluid">
                    </a><br>

                    <p class="m-3">{!! nl2br(e($thread->detail)) !!}</p>
                    <div class="text-right"><span>{{$thread->updated_at}}</span></div>

                    <hr>

                    <div class="footer">
                        <form action="/thread/{{$thread->id}}" method="post">
                        {{ csrf_field() }}

                            <div>
                                <span>Comment : </span>
                                <span class="now_cnt">0</span> / 500
                            </div>
                            <textarea class="message form-control" placeholder="Message here" style="height: 100px" name="message"></textarea>

                            <div style="float: left;" class="mt-4">
                                <span>Rating : </span>
                                <select class="form-select" aria-label="Default select" name="star">
                                    <option value="1" selected>1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>

                            <div style="text-align: right;">
                                <input type="submit" class="post_btn mt-3 btn btn-primary" value="Comment" disabled>
                            </div>

                        </form>
                    </div>

                </div>

            </div>

            <!--コメント-->
            <div  class="card mt-3">
                <div class="card-header">
                    <span>Comments</span>
                </div>
                <div class="card-body">
                    @foreach ($comments as $comment)
                        <div  class="card mt-3">
                            <div class="card-header">
                                <div style="float: left;"><span>User : {{ $users[($comment->user_id - 1)]->name }}</span></div>
                                <div style="text-align: right;">Rating : <span class="rating">{{$comment->star}}</span></div>
                            </div>
                            <div class="card-body">
                                <span>{!! nl2br(e($comment->message)) !!}</span>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-3" style="margin: 0 auto;">
                    {{$comments->links()}}
                </div>

            </div>

        </div>
    </div>
</div>

@endsection

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
    jQuery(function($){
        
        $('.image').hide();

        if($('.image').attr('src') != '/'){
            $('.image').show();
        }

        // コメント文字数
        $('.message').on('input', function(){
            var cnt = $(this).val().length;
            $('.now_cnt').text(cnt);
            if(cnt > 0 && 500 >= cnt){
                $('.post_btn').prop('disabled', false);
            }else{
                $('.post_btn').prop('disabled', true);
            }
        });

        $('.rating').each(function() {
            var cnt = parseInt($(this).text());

            switch(cnt){
                case 1:
                    $(this).text('☆')
                    break;
                case 2:
                    $(this).text('☆☆')
                    break;
                case 3:
                    $(this).text('☆☆☆')
                    break;
                case 4:
                    $(this).text('☆☆☆☆')
                    break;
                case 5:
                    $(this).text('☆☆☆☆☆')
                    break;
                default:
                    $(this).text('do not look')
                    break;
            }
            
        });

    });
</script>