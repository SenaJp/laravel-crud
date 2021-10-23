<?php

namespace App\Http\Controllers\api;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\TaskFormRequest;

class ToDoAPIController extends Controller
{
    public function getAllTasks()
    {
        $tasks = Task::where('status', 1)->paginate(100)->toJson(JSON_PRETTY_PRINT);
        return response($tasks, 200);
    }

    public function getAllUsers()
    {
        $users = User::get()->toJson(JSON_PRETTY_PRINT);
        return response($users, 200);
    }

    public function getUsersTasks(request $request)
    {
        $user = $request->user_id;

        if (Task::where('user_id', $user)->exists()) {
            $user = Task::where('user_id', '=', $user)->paginate(100)->toJson(JSON_PRETTY_PRINT);
            return response($user, 200);
        } else {
            return response()->json([
                "Error"     => "User activities not found"
              ], 404);
        }
    }
    public function getUser(request $request)
    {
        $user = $request->id;

        if (User::where('id', $user)->exists()) {
            $user = User::where('id', '=', $user)->get()->toJson(JSON_PRETTY_PRINT);
            return response($user, 200);
        } else {
            return response()->json([
                "Error"     => "User not found"
              ], 404);
        }
    }

    public function createUser(request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        return response()->json([
            "message"=> "user created"
        ], 202);
    }

    public function createTask(request $request)
    {
        $task = new Task;
        $task->task = $request->task;
        $task->user_id = $request->user_id;
        $task->save();

        return response()->json([
            "message" => "task created successfully"
        ], 202);
    }

    public function updateUser(request $request, $id)
    {
        $id = $request->id;

        if(User::where('id', $id)->exists()) {
            $user = User::find($id);
            $user->name = is_null($request->name) ? $user->name : $request->name;
            $user->email = is_null($request->email) ? $user->email : $request->email;
            $user->save();

            return response()->json([
                "message"   => "records updated sucessfully"
            ], 200);
        } else {
            return response()->json([
                "message"   => "user not found"
            ], 404);
        }
    }

    public function deleteUser(request $request)
    {
        $id = $request->id;
        if(User::where('id', $id)->exists()) {
            $user = User::find($id);
            $user->delete();

            return response()->json([
                "message" => "deleted user"
            ], 202);
        } else {
            return response()->json([
                "message" => "user not found"
            ], 404);
        }
    }
}