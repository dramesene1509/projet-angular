<?php

namespace App\Controller;

use App\Entity\Compte;
use App\Entity\Partenaire;
use App\Entity\Utilisateur;
use App\Repository\PartenaireRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/api")
 */
class PartenaireController extends AbstractController
{
    /**
     * @Route("/partenaire", name="partenaire",methods={"POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function Add(Request $request, EntityManagerInterface $entityManager,SerializerInterface $serializer, ValidatorInterface $validator,UserPasswordEncoderInterface $passwordEncoder ){
        $valeurs = json_decode($request->getContent());
        if(isset($valeurs->nomentreprise)){
            $partenaire= new Partenaire();
            $partenaire->setNomEntreprise($valeurs->nomentreprise);
            $partenaire->setRegistreCommerce($valeurs->registreCommerce);
            $partenaire->setRaisonSociale($valeurs->raisonSociale);
            $partenaire->setAdresse($valeurs->adresse);
            $partenaire->setStatut($valeurs->statut);
            
             
            $user= new Utilisateur();
            $user->setPartenaire($partenaire);
            $user->setUsername($valeurs->username);
            $user->setPassword($passwordEncoder->encodePassword($user,$valeurs->password));
            $user->setRoles($partenaire->getRoles());
            $user->setNom($valeurs->nom);
            $user->setPrenom($valeurs->prenom);
            $user->setEmail($valeurs->email);
            $user->setTelephone($valeurs->telephone);
            $user->setAdresse($valeurs->adresse);
            $user->setCni($valeurs->cni);
            $user->setStatut($valeurs->statut);

            $compte= new Compte();
            $compte->setPartenaire($partenaire);
            $numero=random_int(100000,999999);
            $compte->setNumeroCompte($numero);
            $compte->setDateCréation(new \DateTime()); 
            $compte->setSolde($valeurs->solde);
            $entityManager->persist($partenaire);
            $entityManager->persist($user);
            $entityManager->persist($compte);
            $entityManager->flush();

            $data = [
               'status'=>201,
                'message'=>'L\utilisteur a été créé'
                ];
            return new JsonResponse($data,201);
    }
    $data = [
       'status'=>500,
        'message'=>'vous devez renseignles clés username et password'
    ];
    return new JsonResponse($data,500);
        }
            
            
    
     
           
         
}
