<?php

namespace App\Http\Controllers;
use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {

        $todos = Todo::all();
        return view('todos.index')->with('todos',$todos);
    }
    public function shoW(Todo $todo)
    {
        //$todo = Todo::find($todoId);
        return view('todos.show')->with('todo', $todo);
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store()
    {

        $this->validate(request(), [
        'name' => 'required|min:6|max:12',
        'description' => 'required'
      ]);

        $data=request()->all();

        $todo = new Todo();

        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed= false;

        $todo->save();
        session()->flash('success','Todo Created Sucessfully');


        return redirect('/todos');
    }

    public function edit(Todo $todo)
    {
        //$todo = Todo::find($todoId);

        return view('todos.edit')->with('todo',$todo);
    }

    public function update(Todo $todo)
    {
         $this->validate(request(), [
        'name' => 'required|min:6|max:12',
        'description' => 'required'
      ]);
      $data=request()->all();

     // $todo = Todo::find($todoId);
      $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->save();
        session()->flash('success','Todo Updated Sucessfully');

        return redirect('/todos');

    }
    public function destroy(Todo $todo ){

        //$todo = Todo::find($todoId);

        $todo->delete();
            
        session()->flash('delete','Todo Deleted Sucessfully');
        return redirect('/todos');

    }
    public function completed(Todo $todo){
        $todo->completed = true;
        $todo->save();
           session()->flash('success','Todo Completed Sucessfully');
        return redirect('/todos');
    }
}
