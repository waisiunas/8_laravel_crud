<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class TrashedCountryController extends Controller
{
    public function index()
    {
        return view('country.trashed', [
            'countries' => Country::onlyTrashed()->get(),
        ]);
    }

    public function restore($id)
    {
        if (Country::onlyTrashed()->find($id)->restore()) {
            return redirect()->back()->with(['success' => "Magic has been spelled!"]);
        } else {
            return redirect()->back()->with(['failure' => "Magic has failed to spell!"]);
        }
    }

    public function delete($id)
    {
        if (Country::onlyTrashed()->find($id)->forceDelete()) {
            return redirect()->back()->with(['success' => "Magic has been spelled!"]);
        } else {
            return redirect()->back()->with(['failure' => "Magic has failed to spell!"]);
        }
    }
}
