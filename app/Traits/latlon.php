<?php

namespace App\Traits;

trait latlon
{
    // save the date in UTC format in DB table
    public function getlatlon($address){
    	if(!empty($address)){
        //Formatted address
        //$formattedAddr = str_replace(' ','+',$address);
        $formattedAddr = str_replace(' ','+',$address);
        //Send request and receive json data by address
        //echo 'http://www.mapquestapi.com/geocoding/v1/address?key=y1AKzOhOyI4HSR5VvDvToDvAQt9mPStT&location='.$formattedAddr;die;
        $geocodeFromAddr = @file_get_contents('http://www.mapquestapi.com/geocoding/v1/address?key=y1AKzOhOyI4HSR5VvDvToDvAQt9mPStT&location='.$formattedAddr); 
        $output = json_decode($geocodeFromAddr);
       if(!empty($output)){
        $latlon=end($output->results[0]->locations);
       } else{
        $latlon=array();
       }
        //Get latitude and longitute from json data
       if(!empty($latlon->latLng)){
            $data['latitude']  = $latlon->latLng->lat; 
            $data['longitude'] = $latlon->latLng->lng;
        } else{
            $data['latitude']  = 0; 
            $data['longitude'] = 0;
        }
        //Return latitude and longitude of the given address
        if(!empty($data)){
            return $data;
        }else{
            return array('latitude'=>0,'longitude'=>0);
        }
        } else{
            return array('latitude'=>0,'longitude'=>0);  
        }
    }

}
?>
