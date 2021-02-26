<?php

namespace App\DataFixtures;

use App\Entity\Profil;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ProfilsFixtures extends Fixture
{
 
    public const ADMIN_SYSTEME_USER="ADMIN_SYSTEME";
    public const UTILISATEUR_AGENCE_USER="UTILISATEUR_AGENCE";
    public const CAISSIER_USER="CAISSIER";
    public const ADMIN_AGENCE_USER="ADMIN_AGENCE";
    public function load(ObjectManager $manager)
    {
        $profils =["ADMIN-SYSTEME" ,"UTILISATEUR_AGENCE" ,"CAISSIER" ,"ADMIN_AGENCE"];

        for($i=0; $i<4; $i++)
        {
            $newprofils =new Profil() ; 
            $newprofils ->setLibelle($profils[$i]);
            if($profils[$i]==="ADMIN_SYSTEME"){

                $this->setReference(self::ADMIN_SYSTEME_USER,$newprofils);
            }
            if($profils[$i]==="UTILISATEUR_AGENCE"){

                $this->setReference(self::UTILISATEUR_AGENCE_USER,$newprofils);
            }
            if($profils[$i]==="CAISSIER"){

                $this->setReference(self::CAISSIER_USER,$newprofils);
            }
            if($profils[$i]==="ADMIN_AGENCE"){

                $this->setReference(self::ADMIN_AGENCE_USER,$newprofils);
            }
    

            $manager ->persist ($newprofils);
           
            $manager->flush();
        }
    }
}
