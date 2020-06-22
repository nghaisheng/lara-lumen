<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function __construct()
    {
        
    }

    public function index()
    {
        $users = User::all();
        return $this->responseSuccess($users);
    }

    public function show($id)
    {
    	$user = User::find($id);
        return $this->responseSuccess($user);
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'email' => 'required|email',
        ]);

        $user = new User();
        $user->fill(request()->all());
        $picture = request()->file('picture');
        if ($picture->isValid()) {
            $pictureName = $picture->getClientOriginalName();
            $pictureDir = "images";
            $picture->move($pictureDir, $pictureName);
            $user->picture = "{$pictureDir}/{$pictureName}";
        }
        $user->save();
        return $this->responseSuccess($user, 201);
    }

    public function update($id)
    {
    	$user = User::find($id);
        return $this->responseSuccess($user);
    }

    public function delete($id)
    {
    	$user = User::destroy($id);
        return $this->responseSuccess($user, 204);
    }
}
