<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use App\Traits\latlon;



class EmployeeCron extends Command
{
    use latlon;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'employee:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Emplouyee command for the longitude and latitude calculation update';

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

        $employees = DB::table('employment')->where('longitude','=','0')->where('latitude','=','0')->limit(500)->get();
        
        foreach($employees as $employee){

            $address='';
            if($employee->street1){
                $address.=str_replace('#','',$employee->street1).' ';
            }
            if($employee->street2){
                $address.=str_replace('#','',$employee->street2).' ';
            }

            if($employee->city){
                $address.=str_replace('#','',$employee->city).' ';
            }
            if($employee->state){
                $address.=str_replace('#','',$employee->state).' ';
            }

            if($employee->zipcode){
                $address.=str_replace('#','',$employee->zipcode).' ';
            }
            //echo $address.'<br>';
            try {
            $address=rtrim($address);
               $response=$this->getlatlon($address);

               DB::table('employment')->where('id', $employee->id)->update(['longitude' =>$response['longitude'],'latitude'=> $response['latitude']]);

            } catch (\Exception $e) {
                echo $e->getMessage().'<br>';
            }
            
        }
	}

}
