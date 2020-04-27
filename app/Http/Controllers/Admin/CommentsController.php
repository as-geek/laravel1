<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comments;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index()
    {
        return view('admin.comments.index', ['comments' => Comments::getCommentsAll()]);
    }

    public function update($id)
    {
        return view('admin.comments.update', [
            'commentsItem' => Comments::getCommentsItem($id)->first(),
        ]);
    }

    public function saveUpdate($id, Request $request)
    {
        /** @var Comments $comments */
        $comments = Comments::find($id);
        $comments->fill($request->all());
        $comments->save();

        return redirect()->route('admin::comments::index');
    }

    public function delete($id)
    {
        Comments::destroy([$id]);
        return redirect()->route("admin::comments::index");
    }
}
