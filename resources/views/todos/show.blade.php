
@extends('layouts.app')

@section('title')
{{$todo->name}}
    
@endsection

@section('content')
    <h1 class="text-center my-5">
            {{$todo->name}}
        </h1>

       <div class="row justify-content-center">
           <div class="col-md-6">
                <div class="card card-default">
            <div class="card-header">
                Todo
            </div>
            <div class="card-body">
                {{$todo->description}}


            
            </div>
            
        </div>
        
        <a href="/todos/{{ $todo->id }}/edit" class="btn btn-info btn-sm my-5">Edit</a>
        <a href="/todos/{{ $todo->id }}/delete" class="btn btn-danger  my-5">Delete</a>
           </div>
       </div
@endsection