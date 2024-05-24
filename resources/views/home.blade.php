@extends('layouts.base')

@section('content')
<div class="container">



<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addTodoModal">
                        Add Todo
                    </button>

                    <!-- Add Modal -->
                    <div class="modal fade" id="addTodoModal" tabindex="-1" role="dialog" aria-labelledby="addTodoModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addTodoModalLabel">Add Todo</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('new') }}">
                                        @csrf

                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control" id="title" name="title" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control" id="status" name="status" required>
                                                <option value="low">Low</option>
                                                <option value="medium">Medium</option>
                                                <option value="high">High</option>
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Add Todo</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


       
            












    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                   
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                 
                    
                    <div class="d-flex flex-row">


                        @foreach($todos as $todo)
                        @if($todo -> status =='medium')
                        <div class="card text-white bg-warning mb-3" style="min-width: 10rem; min-heigth: 1
                        5rem; margin-right: 1rem;">
                            <div class="card-header text-center">{{$todo -> Title}}</div>
                            <div class="card-body">
                                <p class="card-title">{{$todo -> Title}}</p>
                                 
                                <button type="submit" class="btn btn-danger me-1 btn-sm" data-toggle="modal" data-target="#delete">
      <i class="fa-solid fa-trash"></i>
            </button>
                                <button type="submit" class="btn btn-dark" data-toggle="modal" data-target="#updateTodoModal">
                                <i class="fa-solid fa-pen-to-square"></i>
                    </button>

                                
            </button>
                                
                            </div>
                        </div>
                        @endif

                        @if($todo -> status =='high')
                        <div class="card text-white bg-danger mb-3" style="min-width: 10rem; min-heigth: 1
                        5rem; margin-right: 1rem;">
                            <div class="card-header text-center">{{$todo -> Title}}</div>
                            <div class="card-body">
                                <p class="card-title">{{$todo -> Title}}</p>
                                <button type="submit" class="btn btn-danger me-1 btn-sm" data-toggle="modal" data-target="#delete">
      <i class="fa-solid fa-trash"></i>
            </button>
            <button type="submit" class="btn btn-dark" data-toggle="modal" data-target="#updateTodoModal">
            <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                                
                            </div>
                        </div>
                        @endif
                        @if($todo -> status =='low')
                        <div class="card text-white bg-primary mb-3" style="min-width: 10rem; min-heigth: 1
                        5rem; margin-right: 1rem;">
                            <div class="card-header text-center">{{$todo -> Title}}</div>
                            <div class="card-body">
                                <p class="card-title">{{$todo -> Title}}</p>
                                <button type="submit" class="btn btn-dark" data-toggle="modal" data-target="#updateTodoModal">
                                <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                                

                                <button type="submit" class="btn btn-danger me-1 btn-sm" data-toggle="modal" data-target="#delete">
      <i class="fa-solid fa-trash"></i>

                                

                                
            

                                
                            </div>
                        </div>
                        @endif

















                         <!--delete modal  -->
                        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="addTodoModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addTodoModalLabel">Delete Todo</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('delete',$todo -> id) }}">
                                        @csrf

                                      <P>Are u sure u want to delete {{$todo -> Title}}</P>

                                        <button type="submit" class="btn btn-primary">delete Todo</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="modal fade" id="updateTodoModal" tabindex="-1" role="dialog" aria-labelledby="addTodoModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updateTodoModalLabel">update {{$todo -> Title}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{route('update',$todo -> id)}}">
                                        @csrf

                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control" id="title" name="title" value="{{$todo -> Title}}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control" id="status" name="status" value="{{$todo -> status }}" required>
                                                <option value="low">Low</option>
                                                <option value="medium">Medium</option>
                                                <option value="high">High</option>
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-primary">update Todo</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>






                        @endforeach
                        
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div>
@endsection
