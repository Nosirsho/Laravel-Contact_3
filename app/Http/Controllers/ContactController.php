<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function addContact(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|max:50',
            'phone' => 'required|max:20'
        ]);
    }
}
