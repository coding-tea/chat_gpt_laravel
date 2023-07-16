<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use OpenAI\Laravel\Facades\OpenAI;

class openaiController extends Controller
{

    public function openai(Request $request){
        $result = OpenAI::completions()->create([
            'model' => 'text-davinci-003',
            'prompt' => $request->message,
        ]);

        DB::table('chats')->insert([
            [
                'role' => 'user',
                'content' => $request->message
            ],
            [
                'role' => 'system',
                'content' => $result->choices[0]->text
            ]
        ]);

        return redirect()->route('chat');
    }

    public function chat(){
        $chat = Chat::all();
        return view('chat', compact('chat'));
    }

}
