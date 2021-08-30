<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Suggestion;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Notifications\Root\NotifyNewSuggestion;

class SuggestionController extends Controller
{
    public function __invoke(Request $request) : RedirectResponse
    {
        $request->validate([
            'subject' => ['required', 'max:100'],
            'body' => ['required'],
        ]);
        $suggestion = Suggestion::create($request->all());

        $rootUsers = User::query()->whereIn('email', config('littlepets.roles.root'))->get();
        \Notification::send($rootUsers, new NotifyNewSuggestion($suggestion));

        return redirect()->route('web.suggestions.index')->with('success', 'Gracias por tus sugerencias!');
    }
}
