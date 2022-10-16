<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodoModel;
class TodoController extends Controller
{
    public function getTodo()
    {
        $todo = TodoModel::orderBy('isComplete','asc')->get();
        return response()->json($todo, 200);
    }

    public function getTodoByID($id)
    {
        $todo = TodoModel::find($id);
        if (is_null($todo)) {
            return response()->json(['message' => 'Todo Not Found'], 404);
        }
        return response()->json($todo::find($id), 200);
    }

    public function addTodo(Request $request){
        $todo = TodoModel::create($request->all());
        $todo->save();
        return response($todo, 201);
    }

    public function updateTodo(Request $request, $id){
        $todo = TodoModel::find($id);
        if(is_null($todo)){
         return response()->json(['message' => 'Todo Not Found'], 404);   
        }
        
        $todo ->update($request->all());
        return response($todo, 200);
    }

    public function deleteTodo(Request $request, $id){
        $todo = TodoModel::find($id);
        if(is_null($todo)){
            return response()->json(['message' => 'Todo Not Found'], 404);   
           }
           $todo ->delete();
           return response()->json(null, 204);
    }

    public function updateTodoData(Request $request, $id){
        $todo = TodoModel::find($id);
        if(is_null($todo)){
         return response()->json(['message' => 'Todo Not Found'], 404);   
        }
        
        $todo ->update($request->all());
        return response($todo, 200);
    }
}
