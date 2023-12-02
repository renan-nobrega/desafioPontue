<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;
use App\Http\Requests\StoreUpdateUserRequest;

class UserController extends Controller
{
    public function index(){
        $users = User::paginate();

        return UserResource::collection($users);
    }

    public function store(StoreUpdateUserRequest $request){

        $data = $request->validated();
        $data['password'] = bcrypt($request->password);
        $user = User::create($data);
        return new UserResource($user);
    }

    public function show($id){
        $user = User::findOrFail($id);
        return new UserResource($user);
    }
    public function update(StoreUpdateUserRequest $request, $id){
        $user = User::findOrFail($id);
        $data = $request->validated();
        if($request->password){
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);
        return new UserResource($user);
    }
    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return response()->noContent();
    }
}
