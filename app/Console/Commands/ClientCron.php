<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use App\Traits\latlon;
class ClientCron extends Command
{
      use latlon;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'client:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Client cron for the longitude and latitude calculation update';

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
        //

        $clients = DB::table('client')->where('longitude','=','0')->where('latitude','=','0')->limit(10)->get();
        foreach($clients as $client){

            $address='';
           
            if($client->city){
                $address.=$client->city.' ';
            }
            if($client->state){
                $address.=$client->state.' ';
            }

            if($client->zipcode){
                $address.=$client->zipcode.' ';
            }

            try {
                $address=rtrim($address);
               $response=$this->getlatlon($address);

               DB::table('client')->where('id', $client->id)->update(['longitude' =>$response['longitude'],'latitude'=> $response['latitude']]);

            } catch (\Exception $e) {
                echo $e->getMessage();
            }
    }

    }
}
