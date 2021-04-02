@extends('layouts.app')
@section('content')

<div class="col-3 ">
  <button class="btn btn-primary p-3" data-toggle="modal" data-target="#post_model"style="margin:10px;">
  <i class="fas fa-plus"></i>
  Add Post</button>
  </div>
  <div class="col-3 ">
    <button class="btn btn-info" data-toggle="modal" data-target="#cat_model"style="margin:10px;">
    <i class="fas fa-plus"></i>
    Add Category</button>
    </div>
    
    {{-- create post --}}
    <form method="POST" action="{{Route('article.store')}}" enctype="multipart/form-data">
                @CSRF
                <div class="modal fade" id="post_model" tabindex="-1" role="dialog" 
                      aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Post</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                      <div class="modal-body">
                                              <label>title</label>
                                              <input type="text" class="form-control" name="title">
                                              <label>body</label>
                                              <input type="text" class="form-control" name="body">
                                              <input type="hidden" class="form-control" name="user_id" value={{ Auth::user()->id }}>
                                              <label>image</label>
                                            <input type="file" class="form-control" name="image">
                                              <br>
                                              <label>category</label>
                                            <select class="form-control" name="category_id">
                                                @foreach($categorys as $category)
                                                <option value='{{$category->id}}'>{{$category->name}}</option>
                                                  @endforeach
                                                </select>
    
                                      </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                                      <button type="submit" class="btn btn-primary">save</button>
                                  </div>
                              </div>
                          </div>
                </div>
    </form>  
    {{-- end create post --}}
     {{-- create post --}}
     <form method="POST" action="{{Route('category.store')}}">
      @CSRF
      <div class="modal fade" id="cat_model" tabindex="-1" role="dialog" 
            aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                            <div class="modal-body">
                                    <label>name</label>
                                    <input type="text" class="form-control" name="name">
                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                            <button type="submit" class="btn btn-primary">save</button>
                        </div>
                    </div>
                </div>
      </div>
</form>  
{{-- end create category --}}
    {{-- users table --}}
    <table class="table table-border table-hover table-striped">
      <caption>List of users</caption>
      <thead class="thead-dark">
        <th>name</th>
        <th>email</th>
        <th>admin</th>
        <th colspan="2" style="text-align:center;">Action</th>
        </thead>
        <tbody>
        
          @foreach($user as $user)
          <tr>
          <td> {{$user->name}}</td>
          <td> {{$user->email}}</td>
          <td> {{$user->admin}}</td>
          
          <td> 
            <form method="POST" action="{{route('admindash.update',$user->id)}}">
              @CSRF
              {{method_field('PATCH')}}
            <button type="submit" class="btn btn-success"><i class="fas fa-pen"></i></button>
            </form>
          </td>
          <td> <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_user{{$user->id}}"><i class="fas fa-dumpster"></i></button></td>
          <form method="POST" action="{{route('admindash.destroy',$user->id)}}">
              @CSRF
              {{method_field('DELETE')}}
              <div class="modal fade" id="delete_user{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <h3>Are You Sure</h3>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                      <button type="submit" class="btn btn-danger">yes</button>
                    </div>
                  </div>
                </div>
              </div>
              </form>
          </tr>
          @endforeach
        </tbody>
    </table>
    {{-- end user table --}}
    {{-- contacts table --}}
    <table class="table table-border table-hover table-striped">
      <caption>List of Messages</caption>
      <thead class="thead-dark">
        <th>name</th>
        <th>email</th>
        <th>subject</th>
        <th>message</th>
        <th>Delete</th>
        </thead>
        <tbody>
                
            @foreach($contact as $contact)
            <tr>
            <td> {{$contact->name}}</td>
            <td> {{$contact->email}}</td>
            <td> {{$contact->subject}}</td>
            <td> {{$contact->message}}</td>
            <td> <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_post{{$contact->id}}"><i class="fas fa-dumpster"></i></button></td>
            <form method="POST" action="{{route('contact.destroy',$contact->id)}}">
            @CSRF
            {{method_field('DELETE')}}
            <div class="modal fade" id="delete_post{{$contact->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <h3>Are You Sure</h3>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger">yes</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{-- end contact table --}}
    {{-- categorys table --}}
     <table class="table table-border table-hover table-striped">
      <caption>List of categories</caption>
      <thead class="thead-dark">
        <th>name</th>
        <th>delete</th>
        </thead>
        <tbody>
                
            @foreach($categorys as $category)
            <tr>
            <td> {{$category->name}}</td>
            
            <td> <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_cat{{$category->id}}"><i class="fas fa-dumpster"></i></button></td>
            <form method="POST" action="{{route('category.destroy',$category->id)}}">
            @CSRF
            {{method_field('DELETE')}}
            <div class="modal fade" id="delete_cat{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <h3>Are You Sure</h3>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger">yes</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        </tr>
        @endforeach
      </tbody>
    </table> 
    {{-- end category table --}}
  
@endsection