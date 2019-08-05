<?php

namespace App\DataFixtures;
use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;




class AuthenFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }  
    public function load(ObjectManager $manager){
         $user = new Utilisateur();
         $user->setUsername('amina');
         $password = $this->encoder->encodePassword($user, 'pass1234');
         $user->setRoles(['ROLE_SUPERADMIN']);
         $user->setPassword($password);
        $user->setNom('drame');
         $user->setPrenom('aminata');
         $user->setEmail('amina');
         $user->setTelephone(778345480);
         $user->setAdresse('pikine');
         $user->setCni (1995201424);
         $user->setStatut('bloquee');

        $manager->persist($user);
        $manager->flush();
        
         
       
    }

}