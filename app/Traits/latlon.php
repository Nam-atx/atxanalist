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
        $geocodeFromAddr = file_get_contents('http://www.mapquestapi.com/geocoding/v1/address?key=y1AKzOhOyI4HSR5VvDvToDvAQt9mPStT&location='.$formattedAddr); 
        $output = json_decode($geocodeFromAddr);
       
       $latlon=end($output->results[0]->locations);
        //Get latitude and longitute from json data
        $data['latitude']  = $latlon->latLng->lat; 
        $data['longitude'] = $latlon->latLng->lng;
        //Return latitude and longitude of the given address
        if(!empty($data)){
            return $data;
        }else{
            return false;
        }
        }else{
            return false;   
        }
    }

}
?>
