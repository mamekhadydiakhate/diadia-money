<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\DataFixtures\ProfilsFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture implements DependentFixtureInterface
{ 
    private $encode;
    public function __construct(UserPasswordEncoderInterface $encode)
    {
        $this->encode=$encode;
    }                
                                                            
    
    public function load(ObjectManager $manager)
    {
        $fake=Factory::create('fr-FR');

        for ($i=1; $i <=20 ; $i++) 
        {
            

            $user = new user();
            $user ->setProfils($this->getReference(ProfilsFixtures::ADMIN_USER))
                  ->setPrenom ($fake->lastname)
                  ->setTelephone($fake ->phoneNumber())
                  ->setUsername ($fake->userName)
                  ->setAvatar ($fake->imageUrl())      
                  ->setNom($fake->firstname)
                  ->setCNI($fake->tollFreePhoneNumber());
                 
            $password = $this->encode->encodePassword ($user, '1234' );
            $user ->setPassword ($password );
            $manager ->persist ($user);
        }
            
        $manager->flush();

        
    }
    public function getDependencies()
    {
        return array(
            ProfilsFixtures::class,
        );
    }
}
