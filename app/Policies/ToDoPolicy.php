<?php

namespace App\Policies;

use App\Models\ToDo;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ToDoPolicy
{   
    public function modify(User $user, ToDo $toDo): Response
    {
        return $user->id === $toDo->user_id 
            ? Response:: allow()
            : Response:: deny('You are not valid user!');
    }
    
}
