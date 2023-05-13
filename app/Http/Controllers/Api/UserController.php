<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
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
        $user = User::findOrFail($id);

        $validated = $request->validated();

        $user->email = $validated['email'];

        $user->save();

        return $user;

    }

    public function password(UserRequest $request, string $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validated();

        $user->password = Hash::make($validated['password']);

        $user->save();

        return $user;

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

    public function image(UserRequest $request, string $id)
    {
      $user = User::findOrfail($id);

      if ( !is_null($user->image) ){
        Storage::disk('public')->delete($user->image);
      }

      $validated = $request->validated();

      $user->image = $request->file('image')->storePublicly('images', 'public');

      $user->save();

      return $user;
    }
}


 