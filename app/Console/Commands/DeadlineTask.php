<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Notification;
use Mail;
class DeadlineTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:deadline';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command for notify deadline of task';

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
        //*
        $hour = (int) date('H');
        $minute = (int) date('i');

        if($hour <10){
            $time = '0'.($hour + 7).':'.($minute -5);
        }else {
            $time = ($hour + 7).':'.($minute -5);
        }
        
        //dd($time);
        $statistic = \App\Models\Histories::with('borrower')->with('periodofclassend')
        ->where('flag_email', 0)
        ->where('date_render', 'Chưa trả')
        ->get();
        $arrEmail = array();
        if($statistic->count()){
            foreach ($statistic as $key => $value) {
                if($time > $value->periodofclassend->timeend){
                    \Log::info($time.'dd'.$value->periodofclassend->timeend);
                    array_push($arrEmail, $value->borrower->email);
                    // update flag
                    $value->flag_email = 1;
                    $value->save();
                }else {
                    \Log::info('Chưa hết giờ');
                }
                
            }
        } else {
            \Log::info('Mang rong!');
        }
        \Log::info($arrEmail);
        //*/
        Mail::send('mail', [], function($message) use ($arrEmail)
        {    
            $message->to($arrEmail)->subject('TRẢ THIẾT BỊ'); 
            $message->from('transang0309@gmail.com', 'Trường Đại học Bách Khoa');
        });
        var_dump( Mail:: failures());
        \Log::info("HTML Email Sent. Check your inbox.");
    }
}
