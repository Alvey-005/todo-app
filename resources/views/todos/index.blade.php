
@extends('layouts.app')

@section('title')
Todos list
    
@endsection

@section('content')
         <h1 class="text-center m-5">TODOS PAGE</h1>
            <div class="row justify-content-center">
                <div class="col-md-8">
                     <div class="card card-default">
      <div class="card-header">
          Todos
      </div>
      <div class="card-body">
           <ul class="list-group">
        @foreach ($todos as $todo)
       <li class="list-group-item">
            {{$todo->name}}


             

            @if (!$todo->completed)
            <a href="/todos/{{$todo->id}}/delete" class="btn btn-danger sm float-right">
                Delete
            </a>
               <a href="/todos/{{$todo->id}}/completed" class="btn btn-warning sm float-right mr-2">
                Completed
            </a> 
            <a href="/todos/{{$todo->id}}/edit" class="btn btn-primary sm float-right mr-2">
                Edit
            </a>
            @endif
             
             
            <a href="/todos/{{$todo->id}}" class="btn btn-primary sm float-right mr-2">
                view
            </a>
           
       </li>
     @endforeach
      </ul>
       </div>
                </div>
            </div>
@endsection