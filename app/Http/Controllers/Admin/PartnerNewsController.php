<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Models\PartnerResources;
use App\Http\Controllers\Controller;
use App\Models\Rubrics;
use Illuminate\Http\Request;

class PartnerNewsController extends Controller
{
    public function index()
    {
        return view('admin.partner.index', ['partners' => PartnerResources::getListAll()]);
    }

    public function create()
    {
        return view('admin.partner.create');
    }

    public function saveCreate(Request $request)
    {
        $news = new PartnerResources();
        $news->fill($request->all());
        $news->save();

        return redirect()->route('admin::partner::create');
    }

    public function update($id)
    {
        return view('admin.partner.update', [
            'cardPartners' => PartnerResources::getCardPartners($id)->first()
        ]);
    }

    public function saveUpdate($id, Request $request)
    {
        /** @var PartnerResources $partners */
        $partners = PartnerResources::find($id);
        $partners->fill($request->all());
        $partners->save();

        return redirect()->route('admin::partner::index');
    }

    public function delete($id)
    {
        PartnerResources::destroy([$id]);
        return redirect()->route("admin::partner::index");
    }
}
