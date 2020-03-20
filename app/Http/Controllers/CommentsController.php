<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    private $comments = [
        'Саша' => 'Тест'
    ];

    public function addComment(Request $request)
    {
        if ($request->isMethod('post')) {

            $comments[$request->post('userName')] = $request->post('text');

            return redirect()->route('news::cardNews', [
                'name' => $request->post('name'),
                'title' => $request->post('title'),
                'comments' => $this->comments
            ]);
        }
    }

    public function getComment() {
        return $this->comments;
    }
}
