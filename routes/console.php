<?php

use Carbon\Carbon;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Mail;
use JobForUs\Model\CoverLetters;
use JobForUs\Model\Membership;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('test', function(){
    Mail::to('alderis@icloud.com')->send(new \JobForUs\Mail\NotificationMail('Mail test'));
})->describe('test command');

Artisan::command('check:memberships', function(){
    $data = Membership::where('notify_status', '>', 0)->get();
    $this->comment('cheking memberships ...');
    if( $data->count() > 0 ){

        foreach($data as $item){
            $hours = Carbon::now()->diffInHours(Carbon::createFromFormat('Y-m-d H:i:s', $item->ends_at), false);
            $this->comment($hours);

            // 1 week notification
            if($hours <= 168
                && $item->notify_status == 1){
                //send notification email
                $message = 'Estimado cliente, su plan vencerá en 7 días más';
                Mail::to($item->user->email)->send(new \JobForUs\Mail\NotificationMail($message));
                //change status
                $item->update([
                    'notify_status' => 2
                ]);

                $this->comment('One week notification');

            }
            // 1 day notification
            if($hours <= 24
                && $item->notify_status == 2){

                //send notification email
                $message = 'Estimado cliente, su plan vencerá en 1 día más';
                Mail::to($item->user->email)->send(new \JobForUs\Mail\NotificationMail($message));
                //change status
                $item->update([
                    'notify_status' => 3
                ]);

                $this->comment('One day');

            }
            // End membership notification
            if($hours <= 0
                && $item->notify_status == 3){

                //send notification email
                $message = 'Estimado cliente, su plan ha caducado, puede renovar ingresando a su perfil en nuestra web';
                Mail::to($item->user->email)->send(new \JobForUs\Mail\NotificationMail($message));
                //change status
                $item->update([
                    'notify_status' => 0
                ]);

                $this->comment('End membership');

            }
        }

    } else {
        $this->comment('Nothing to do');
    }
});

Artisan::command('up-letters', function(){
    $this->comment('Checking cover letters to up');

    $data = CoverLetters::where('status', true)->whereHas('user', function($q){
        $q->whereHas('membership', function($m){
            $m->where('notify_status', '>', 0);
        });
    })->get();

    if( $data->count() > 0 ){

        foreach( $data as $item ){
            $minutes = Carbon::createFromFormat('Y-m-d H:i:s', $item->updated_at)->diffInMinutes();
            if($minutes >= 1440){
                $item->touch();
                $this->comment('Up '.$item->name. ' after '.$minutes.' minutes.');
            } else {
                $this->comment('Letter: '.$item->name. ' have '.$minutes.' minutes, no update necessary.');
            }
        }

    } else {

        $this->comment('Nothing to do');
    }
});

