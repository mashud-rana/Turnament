<?php

namespace App\Http\Controllers;

use App\Mail\WinnerEmail;
use App\Models\Turnament;
use App\Jobs\TurnamentJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class TurnamentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'full_name'=>'string|required',
            'email'    =>'required|email'
        ]);
        // Turnament::create($request->all());  
        $turnaments=Turnament::whereStatus(0)->take(6)->get(['id']);
        if(count($turnaments)===6)
        {
            TurnamentJob::dispatch($turnaments)->delay(now()->addSecond(10));
        }

        foreach($turnaments as $turnament_id){
            $selected=Turnament::whereId($turnament_id->id)->first();
            $selected->update([
                'status'=>1
            ]);
        }

        return back();

    }
}
