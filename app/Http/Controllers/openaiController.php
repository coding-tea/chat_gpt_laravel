<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;

class openaiController extends Controller
{

    public function openai(Request $request){
        $result = OpenAI::completions()->create([
            'model' => 'text-davinci-003',
            'prompt' => 'what is 2 + 8',
        ]);

        Chat::create([
            [
                'role' => 'user',
                'content' => $request->message
            ],
            [
                'role' => 'system',
                'content' => $result->choices[0]->text
            ]
        ]);

        return redirect()->back();
    }

    public function chat(){
        $chat = Chat::all();
        return view('chat', compact('chat'));
    }

}
