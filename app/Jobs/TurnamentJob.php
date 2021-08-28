<?php

namespace App\Jobs;

use App\Mail\WinnerEmail;
use App\Models\Turnament;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class TurnamentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $turnament_users_id=[];
    public $email="";
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($turnament_users_id)
    {
        
        foreach($turnament_users_id as $key=>$turnament)
        {
            $this->turnament_users_id[]=$turnament->id;
        }

        $top_member_five=array_rand($this->turnament_users_id,5);
        
        $top_member_three=array_rand($top_member_five,3);
        $top_member_one=array_rand($top_member_three,1);
        
        $winner=Turnament::whereId($this->turnament_users_id[$top_member_one])->first();
        // $winner->update([
        //     'winner'=>1
        // ]);
        $this->email=$winner->email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->email)->send(new WinnerEmail());
    }
}
