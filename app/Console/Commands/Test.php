<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use DB;
use Twilio\Rest\Client;
use Auth;
include '/Users/Vishal/Thrive/app/Http/Controllers/config.php';

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cronjob test';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $time_obj = Carbon::now('Asia/Kolkata');
        $curr_time = $time_obj . '';
        $curr_time = substr($curr_time,0,16);
        $transaction = DB::table('transaction_queue')->orderBy('created_at', 'desc')
                        ->first();
        $next_notification_time = $transaction->created_at;
        $next_notification_time = substr($next_notification_time,0,16);
        if($curr_time == $next_notification_time)
        {
            $sid = TWILIO_SID;
            $token = TWILIO_TOKEN;
            $client = new Client($sid, $token);

            if($transaction->status == 0)
            {
                $message = "$";

                if($transaction->money_in == 0)
                {
                    $message .=  $transaction->money_out . " paid to " . 
                    $transaction->merchant_name . 
                    " on " . $transaction->created_at;
                }
                else
                {
                    $message .= $transaction->money_in . " deposited in your account by " . 
                                $transaction->merchant_name . 
                                " on " . $transaction->created_at;
                }
                $message .= " - " . $transaction->bank_name;
            }
            else
            {
                $message = "Autosweep alert-Transferred $" . $transaction->money_out . 
                        " - " . $transaction->bank_name . "," . $transaction->country;  
            }

            $client->messages->create(
                "+919819861875",
                array(
                    'from' => TWILIO_NO,
                    'body' => $message,
                )
            );  
            $this->info("Notification sent successfully!");
        }
    }
}
