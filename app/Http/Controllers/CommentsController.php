<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminCommentsRequest;
use App\Models\Comments;

class CommentsController extends Controller
{
    public function addComment(AdminCommentsRequest $request)
    {
        $model = new Comments();
        $model->fill($request->all());
        $model->save();

        return redirect()->route('news::cardNews', ['id' => $model->news_id]);
    }
}
