<x-app-layout>
            
    <div class="pagetitle">
        <h1>{{ __('Post') }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{__('Dashboard')}}</a></li>
                <li class="breadcrumb-item active">{{ __('Resource') }}</li>
                <li class="breadcrumb-item"><a href="{{ route('post.index') }}">{{__('Post')}}</a></li>
                
 
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card p-5">
                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('post.index') }}" type="button" class="btn btn-primary" ><i class="bi bi-reply-fill me-1  "></i> Back to Previous Page</a>
                        </div>
                        <hr class="my-4">
                        <em class="card-title" >Subject : </em>{{ $post->subject }}
                        <p><small class="text-lead"><em class="card-title" >Status : </em> {{ ($post -> status == 1 ? 'Published':'Unpublished') }}</small></p>
                        <div class="card p-5">
                            <p>{{ $post->post }}</p>
                        </div>    
                        @if(auth()->check())
                            <form method="POST" action="{{ route('comments.store') }}">
                                @csrf
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" name="comment" id="comment" placeholder="Post" style="height: 100px" required></textarea>
                                    <label for="floatingTextarea">Comment:</label>
                                </div>
                                <div class="w-100 mt-5">
                                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>       
    </section>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card p-5">
                    <div class="card-body">
                        <ul>
                        
                        <h4 class="card-title">All Comments</h4>
                        <hr class="my-10">
                        @foreach($post->comments as $comment)
                            @if($comment->status)
                                <li>
                                    <em class="card-title">{{ $comment->post->user->name }}</em> - {{ $comment->comment }}  
                                </li>
                            @endif
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>
