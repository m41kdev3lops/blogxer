@if ( count( $post->comments ) )
    @foreach( $post->comments as $comment )
        <div class="row">
            <div class="col-md-12 bg-light pt-3">
                <h4>
                    {{ $comment->user }}

                    @if ( loggedIn() )
                        <form action="{{ $comment->getLink() }}" method="post" class="pull-right">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}

                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?');"><i class="fa fa-trash"></i></button>
                        </form>
                    @endif
                </h4>
                <p>{{ $comment->body }}</p>
                <p class="text-right" style="color: #9e9e9e; font-size: 14px;">
                    {{ $comment->created_at->diffForHumans() }}
                </p>
            </div>
        </div>
        
        <br>
    @endforeach
@else
    <p class="text-center">Be the first to comment on this post!</p>
@endif
