<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\CardList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CardListController extends Controller
{
    public function store(Request $request, Board $board)
    {
        $request->validate([
            'name' => ['required'],
        ]);

        CardList::create([
            'user_id' => Auth::user()->id,
            'board_id' => $board->id,
            'name' => $request['name'],
        ]);

        return redirect()->back();
    }
}
