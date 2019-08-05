<?php

namespace App\Controller;
use App\Entity\Compte;
use App\Entity\Partenaire;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


/**
 * @Route("/api")
 */
class CompteController extends AbstractController
{
   
    public function addCompte(Request $request, EntityManagerInterface $entityManager,SerializerInterface $serializer, ValidatorInterface $validator)
    {
        $values=json_decode($request->getcontent());

        if(isset($values->solde)){
            $compte= new Compte();
            $numero=random_int(100000,999999);
            $compte->setNumeroCompte($numero);

            $compte->setDateCréation(new \DateTime());          
            $partenaire = $this->getDoctrine()->getRepository(Partenaire::class)->find($values->partenaire);
            $compte->setPartenaire($partenaire);
            $compte->setSolde($values->solde);

            $entityManager->persist($compte);
            $entityManager->flush();

            $data= [
            'status' => 201,
            'message' => 'Le compte a été créé'
        ];
        return new JsonResponse($data, 201);
        }  
        $datas= [
                
            'status' => 500,
            'message' => 'erreur '
        ];
        return new JsonResponse($datas, 500);

        }  
    }

