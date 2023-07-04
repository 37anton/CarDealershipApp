<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Car;
use App\Entity\User;
use App\Entity\CarCategory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordEncoder;

    public function __construct(UserPasswordHasherInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        // Création des catégories
        for ($i = 0; $i < 10; $i++) {
            $carCategorie = new CarCategory();
            $carCategorie->setName(ucfirst($faker->word));

            $manager->persist($carCategorie);

            // Création des voitures associées à une catégorie
            for ($j = 0; $j < 10; $j++) {
                $car = new Car();
                $car->setNbSeats($faker->numberBetween(2, 5));
                $car->setNbDoors($faker->numberBetween(2, 5));
                $size = $faker->numberBetween(400, 450);
                $car->setPictureUrl("https://picsum.photos/{$size}/{$size}");
                $car->setName(ucfirst($faker->word));
                $car->setCost($faker->randomFloat(2, 10000, 50000));

                // Association de la voiture avec une catégorie
                $car->setBelonging($carCategorie);

                $manager->persist($car);
            }
        }

        $admin = new User();
        $admin->setEmail('admin@admin');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setPassword($this->passwordEncoder->hashPassword($admin, 'admin'));

        $manager->persist($admin);


        $manager->flush();
    }
}
