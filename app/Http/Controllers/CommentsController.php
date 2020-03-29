<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function addComment(Request $request)
    {
        if ($request->isMethod('post')) {
            $model = new Comments();
            $model->fill($request->all());
            $model->save();

            return redirect()->route('news::cardNews', ['id' => $model->news_id]);
        }
    }
}
