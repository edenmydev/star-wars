<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SeedDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'starwars:seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed the starwars db';

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
     * @return int
     */
    public function handle()
    {
       $this->info('Seeding Species table...');
       $this->seedSpecies();

       $this->info('Seeding Films table...');
       $this->seedFilms();

       $this->info('Seeding People table...');
       $this->seedPeople();

    }

    private function seedSpecies()
    {
       $url =  'https://swapi.dev/api/species';
       $species = [];

       do{
           $response = Http::get($url);
           $species = array_merge($species, $response['results']); 
           $url = $response['next'];
       } while ($response['next']!== null);
       
    }

    private function seedFilms(){

    }

    private function seedPeople(){

    }
}
