
@extends('layouts.app')
@section('content')
 <!-- Search form -->
 <div class="row tm-row">
    <div class="col-12">
        
        <form method="GET" class="form-inline tm-mb-80 tm-search-form">                
            <select class="form-control tm-search-input" name="category_id">
                @foreach($category as $category)
                <option value='{{$category->id}}'>{{$category->name}}</option>
                  @endforeach
                </select>

            <button class="tm-search-button" type="submit">
                <i class="fas fa-search tm-search-icon" aria-hidden="true"></i>
            </button>                                
        </form>
    </div>                
</div> 
   @foreach ($articles as $item)
   <article class="col-12 col-md-6 tm-post">
    <hr class="tm-hr-primary">
    <a href="{{route('article.show',$item->id)}}" class="effect-lily tm-post-link tm-pt-60">
        <div class=" tm-post-link-inner">
            <img src="{{asset('img/'.$item->image)}}" alt="Image" class="img-fluid">                            
        </div>
        <span class="position-absolute tm-new-badge">New</span>
        <h2 class="tm-pt-30 tm-color-primary tm-post-title">{{$item->title}}</h2>
    </a>                    
    <p class="tm-pt-30">
        {{$item->body}}
    </p>
    <div class="d-flex justify-content-between tm-pt-45">
        @if ($item->category_id)
        <span class="tm-color-primary">{{$item->category->name}}</span>
        @endif
        <span class="tm-color-primary">{{$item->create_at}}</span>
    </div>
    <hr>
    <div class="d-flex justify-content-between">
        @if ($item->user_id)
             <span>by Admin {{$item->user->name}}</span> 
        @endif
    </div>
</article>

   @endforeach
@endsection

