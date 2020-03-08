<?php

namespace App\DataFixtures;

use App\Entity\Pays;
use App\Entity\Continent;

use Faker\Factory as Faker;
use App\DataFixtures\ContinentFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class PaysFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // pays = product
     
        $faker = Faker::create();

	    for($i = 0; $i < 50; $i++) {
	    	// instanciation d'une entité
		    $pays = new Pays();
		    $pays->setName( $faker->sentence(3) );
		    $pays->setCapital( $faker->text(200) );
		    $pays->setImage('default.jpg');

		    // récupération des références des continents
		    $randomContinent = random_int(0, 4);
		    $continent = $this->getReference("continent$randomContinent");

		    // associer une continent au pays
		    $pays->setIdContinent($continent);

		    $manager->persist($pays);
	    }

        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            ContinentFixtures::class
        ];
    }
}
