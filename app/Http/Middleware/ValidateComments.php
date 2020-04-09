<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Validator;

class ValidateComments
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:50',
            'content' => 'required',
            'news_id' => 'exists:news,id',
            'publish_date' => 'date'
        ];
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $validator = Validator::make($request->all(), $this->rules());
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator->errors())
                ->withInput();
        }

        return $next($request);
    }
}
