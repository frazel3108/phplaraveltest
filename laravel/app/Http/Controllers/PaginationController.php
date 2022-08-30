<?php

namespace App\Http\Controllers;

use App\Models\Notebook;
use Illuminate\Http\Request;

class PaginationController extends Controller
{
    public function notebooks() {
        $notebooks = Notebook::paginate(5);
        return view('notebooks', compact('notebooks'));
    }
}
