<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Resources\Contact as ResourcesContact;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index() {
        $data = request()->validate([
            'searchTerm' => 'required',
        ]);

        $contacts = Contact::where('name', 'like', '%'. $data['searchTerm'] .'%')
                ->where('user_id', \request()->user()->id)
                ->get();

        return ResourcesContact::collection($contacts);
    }
}
