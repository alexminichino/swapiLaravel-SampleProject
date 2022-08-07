<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use AlexMinichino\Swapi\Models\People;
use AlexMinichino\Swapi\Models\Planet;

class PeopleAndPlanetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){    
        if(count(Planet::all()) == 0){
            $url = 'https://swapi.dev/api/planets?format=json';
            do{   
                $json = json_decode(file_get_contents($url));
                $url= $json->next;
                for ($i = 0; $i < count($json->results); $i++){
                    $planet = $json->results[$i];         
                    $new_planet= new Planet();
                    $new_planet->name= $planet->name;
                    $new_planet->rotation_period=intval($planet->rotation_period);
                    $new_planet->orbital_period=intval($planet->orbital_period);
                    $new_planet->diameter=intval($planet->diameter);
                    $new_planet->climate=$planet->climate;
                    $new_planet->gravity=$planet->gravity;
                    $new_planet->terrain=$planet->terrain;
                    $new_planet->surface_water=intval($planet->surface_water);
                    $new_planet->population=intval($planet->population);
                    $new_planet->url=$planet->url;           
                    $new_planet->save();
                }
            } while ($url != null);
        }
        if(count(People::all()) == 0){
            $url = 'https://swapi.dev/api/people?format=json';
            do{   
                $json = json_decode(file_get_contents($url));
                $url= $json->next;
                for ($i = 0; $i < count($json->results); $i++){
                    $person = $json->results[$i];         
                    $people= new People();
                    $people->name= $person->name;
                    $people->height=intval($person->height);
                    $people->mass=intval($person->mass);
                    $people->hair_color=$person->hair_color;
                    $people->skin_color=$person->skin_color;
                    $people->eye_color=$person->eye_color;
                    $people->birth_year=$person->birth_year;
                    $people->gender=$person->gender;
                    $people->url=$person->url; 
                    $parts = explode("/",$person->homeworld);
                    $home = $parts[count($parts) -2];
                    if(ctype_digit($home) ){
                        $people->homeworld_id= $home;
                    }
                         
                    $people->save();
                }
            } while ($url != null);
        }
    
    }
}
?>
