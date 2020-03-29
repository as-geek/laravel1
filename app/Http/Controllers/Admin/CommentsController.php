<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comments;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
    public function index()
    {
        return view('admin.comments.index', ['comments' => Comments::getCommentsAll()]);
    }

    public function update($id, Request $request)
    {
        if ($request->isMethod('post'))
        {
            /** @var Comments $comments */
            $comments = Comments::find($id);
            $comments->fill($request->all());
            $comments->save();

            return redirect()->route('admin::comments::index');
        }

        return view('admin.comments.update', [
            'commentsItem' => Comments::getCommentsItem($id)->first(),
        ]);
    }

    public function delete($id)
    {
        Comments::destroy([$id]);
        return redirect()->route("admin::comments::index");
    }
}
