<?php

namespace App\Controller;

use App\Entity\Partenaire;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Repository\PartenaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/api")
 */
class PartenaireController extends AbstractController
{
    /**
     * @Route("/partenaire", name="partenaire",methods={"POST"})
     */
    public function Add(Request $request, EntityManagerInterface $entityManager,SerializerInterface $serializer, ValidatorInterface $validator ){
        $valeurs = json_decode($request->getContent());
        if(isset($valeurs->nomentreprise,$valeurs->registreCommerce,$valeurs->raisonSociale,$valeurs->email,$valeurs->telephone,$valeurs->nomAdmin,$valeurs->prenomAdmin,$valeurs->emailAdmin,$valeurs->cni,$valeurs->adresse,$valeurs->statut)){
            $partenaire= new Partenaire();
            $partenaire->setNomEntreprise($valeurs->nomentreprise);
            $partenaire->setRegistreCommerce($valeurs->registreCommerce);
            $partenaire->setRaisonSociale($valeurs->raisonSociale);
            $partenaire->setEmailAdmin($valeurs->emailAdmin);
            $partenaire->setTelephone($valeurs->telephone);
            $partenaire->setNomAdmin($valeurs->nomAdmin);
            $partenaire->setPrenomAdmin($valeurs->prenomAdmin);
            $partenaire->setEmail($valeurs->email);
            $partenaire->setCni($valeurs->cni);
            $partenaire->setAdresse($valeurs->adresse);
            $partenaire->setStatut($valeurs->statut);
            
            $entityManager->persist($partenaire);
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
