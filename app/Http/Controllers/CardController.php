<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CardController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'board_id' => ['required', 'exists:boards,id'],
            'card_list_id' => ['required', 'exists:card_lists,id'],
            'title' => ['required'],
        ]);

        Card::create([
            'user_id' => Auth::user()->id,
            'board_id' => $request['board_id'],
            'card_list_id' => $request['card_list_id'],
            'title' => $request['title'],
        ]);

        return redirect()->back();
    }

    public function update(Request $request, Card $card)
    {
        $request->validate([
            'title' => ['required'],
        ]);

        $card->update([
            'title' => $request['title'],
        ]);

        return redirect()->back();
    }

    public function move(Card $card)
    {
        request()->validate([
            'cardListId' => ['required', 'exists:card_lists,id'],
            'position' => ['required', 'numeric'],
        ]);

        $card->update([
            'card_list_id' => request('cardListId'),
            'position' => round(request('position'), 5),
        ]);

        return redirect()->back();
    }
}
