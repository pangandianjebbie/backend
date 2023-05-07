<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }

    public function store(UserRequest $request)
    {
        $validated = $request->validated();
            
            $validated['password'] = Hash::make($validated['password']);

            $user = User::create($validated);
            
        return $user;
    }

   /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return User:: findOrfail($id);
    }
    
    public function update(UserRequest $request, string $id)
    {

        $user = User::findOrfail($id);

        $validated = $request->validated();
        
        $user->name = $validated['name'];

        $user->save();
        
        return $user;
    }

    public function email(UserRequest $request, string $id)
    {

    }

    public function password(UserRequest $request, string $id)
    {

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $user = User::findOrfail($id);

      $user->delete();

      return $user;
    }
}


 