
@extends('layouts.app')
@section('content')

<div class="row tm-row">
    <div class="col-12">
        <hr class="tm-hr-primary tm-mb-55">
          <img src="{{asset('img/'.$article['image'])}}">
    </div>
</div>
<div class="row tm-row">
    <div class="col-lg-8 tm-post-col">
        <div class="tm-post-full">                    
            <div class="mb-4">
                <h2 class="pt-2 tm-color-primary tm-post-title">{{$article->title}}</h2>
                <p class="tm-mb-40">{{$article->created_at}} posted by Admin {{$article->user->name}}</p>
                <p>
                    {{$article->body}} </p>
                
                <span class="d-block text-right tm-color-primary">Creative . Design . Business</span>
            </div>
            
            <!-- Comments -->
            <div>
                <h2 class="tm-color-primary tm-post-title">Comments</h2>
                <hr class="tm-hr-primary tm-mb-45">
                @foreach ($comment as $comment)

                <div class="tm-comment tm-mb-45">
                    <figure class="tm-comment-figure">
                        @if ($comment->user_id)
                        <img src="{{asset('img/'.$comment->user->image)}}" width="90" alt="Image" class="mb-2 rounded-circle img-thumbnail"> 
                        <figcaption class="tm-color-primary text-center">{{$comment->user->name}}</figcaption> 
                        </figure> 
                        @else
                        <img src="{{asset('img/about-03.jpg')}}" width="90" alt="Image" class="mb-1 rounded-circle img-thumbnail"> 
                        <figcaption class="tm-color-primary text-center">Vistor</figcaption> 
                        </figure> 
                        @endif
                                                
                    <div>
                        <p>
                            {{$comment->text}}
                        </p>
                        <div class="d-flex justify-content-between">
                            <span class="tm-color-primary">{{$comment->created_at}}</span>
                        </div>                                                 
                    </div>                                
                </div>
                @endforeach
                <form method="POST" action="{{ action('commentController@store') }}" class="mb-5 tm-comment-form">
                   @csrf
                    <h2 class="tm-color-primary tm-post-title mb-4">Your comment</h2>
                    @auth
                    <input class="form-control" name="user_id" type="hidden" value="{{ Auth::user()->id }}">
                    <input class="form-control" placeholder="name" name="name" type="hidden" value="{{ Auth::user()->name }}">                        
                    @else
                    <div class="mb-4">
                        <input class="form-control" placeholder="name" name="name" type="text">
                    </div>
                    
                    @endauth                    
                    <input class="form-control" name="article_id" type="hidden" value="{{$article->id}}">

                    <div class="mb-4">
                        <textarea class="form-control" name="message" rows="6"></textarea>
                    </div>
                    <div class="text-right">
                        <button class="tm-btn tm-btn-primary tm-btn-small" type="submit">Submit</button>                        
                    </div>                                
                </form>                          
            </div>
        </div>
    </div>
    <aside class="col-lg-4 tm-aside-col">
        <div class="tm-post-sidebar">
            <hr class="mb-3 tm-hr-primary">
            <h2 class="mb-4 tm-post-title tm-color-primary">Categories</h2>
            <ul class="tm-mb-75 pl-5 tm-category-list">
                @foreach ($category as $cat)
                <li><a href="#" class="tm-color-primary">{{$cat->name}}</a></li>
                @endforeach
            </ul>
                         
    </aside>
</div>


@endsection