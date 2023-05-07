<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Messages;
use App\Http\Requests\MessageRequest;

class MessagesController extends Controller
{
    public function store(MessageRequest $request)
    {
        $validated = $request->validated();

        $message = Messages::create($validated);

        return $message;
    }

    public function delete(string $id)
    {
        $message = Messages::findOrfail($id);

      $message->delete();

      return $message;
    }


}
