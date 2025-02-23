<?php

namespace App\Http\Controllers;
use App\Models\ToDo;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Resources\ToDoResource;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class ToDoController extends Controller implements HasMiddleware
{ 
    public static function middleware()
    {
        return [
            new Middleware('auth:sanctum')
        ];
    }

    // Get all
    public function index()
    {   
        $user_id = auth('sanctum')->id();
        $data=DB::table('to_dos')->where('user_id',$user_id)->get();
        return ToDoResource::collection($data); 
    }

    // Create a new todo
    public function store(Request $request)
    {  
        $fields= $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:todo,in_progress,completed'
        ]);
        
        $todo = $request->user()->todos()->create($fields);
        ToDoResource::make($todo);
        return response()->json(['message' => 'Todo is added successfully!']);
    }

    // Get a specific todo
    public function show(ToDo $todo)
    {   
        Gate::authorize('modify', $todo);
        return ToDoResource::make($todo);
    }

    // Update a todo
    public function update(Request $request, ToDo $todo)
    {   
        Gate::authorize('modify', $todo);

        $fields= $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:todo,in_progress,completed'
        ]);

        $todo->update($fields);
        ToDoResource::make($todo);
        return response()->json(['message' => 'Todo is updated successfully!']);
    }

    // Delete a todo
    public function destroy(ToDo $todo)
    {   
        Gate::authorize('modify', $todo);

        $todo->delete();
        return response()->json(['message' => 'Todo is deleted successfully!']);
    }
}
