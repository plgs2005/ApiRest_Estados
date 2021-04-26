<?php

use Database\Seeders\AcreSeeder;
use Database\Seeders\AmapaSeeder;
use Database\Seeders\AmazonasSeeder;
use Database\Seeders\EstadosBrasileirosSeed;

use Database\Seeders\CidadesAcreSeeder;
use Database\Seeders\RioSeeder;
use Database\Seeders\SaoPauloSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		// Estados
        $this->call(EstadosBrasileirosSeed::class);



        // Cidades
        $this->call(AcreSeeder::class);
        $this->call(AmapaSeeder::class);
        $this->call(AmazonasSeeder::class);
        $this->call(RioSeeder::class);
        $this->call(SaoPauloSeeder::class);
        
        
	}

}
