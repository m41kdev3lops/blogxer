@if ( count($posts) )
    @foreach( $posts as $post )
        <div class="row">
            <div class="col-md-12 bg-light pt-3" style="border-radius: 5px">
                <h3>
                    <a href="{{ $post->getLink() }}">{{ $post->title }}</a>
                    
                    @if ( loggedIn() )
                        <form action="{{ $post->getLink() }}" method="post" class="pull-right">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}

                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?');"><i class="fa fa-trash"></i></button>
                        </form>
                    @endif
                </h3>
                
                <p>{{ $post->getShortDescription() }}</p>
                
                <p class="text-right" style="color: #9e9e9e; font-size: 14px;">
                    in <a href="{{ $post->category->getLink() }}"> {{ $post->category->name }}</a> 
                    {{ $post->created_at->diffForHumans() }}
                </p>
            </div>
        </div>

        <br>
    @endforeach
@else
    <p class="text-center">There are no posts here.</p>
@endif
