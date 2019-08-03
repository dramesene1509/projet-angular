<?php

namespace App\Controller;

use App\Entity\Depot;
use App\Entity\Compte;
use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
/**
 * @Route("/api")
 */
class DepotController extends AbstractController
{
    /**
     * @Route("/depot", name="depot",methods={"POST"})
     */
    public function adddepot(Request $request, EntityManagerInterface $entityManager,SerializerInterface $serializer, ValidatorInterface $validator){
        $values = json_decode($request->getContent());

        if(isset($values->montantDéposé)){
            $depot= new Depot();
            $depot->setMontantDéposé($values->montantDéposé);
            $depot->setDateDépot(new \DateTime());
            $recup = $this->getDoctrine()->getRepository(Compte::class)->find($values->compte);
            $recup->setSolde($recup->getSolde() + $values->montantDéposé);
            $depot->setCompte($recup);
            $users = $this->getDoctrine()->getRepository(Utilisateur::class)->find($values->utilisateur);
            $depot->setUtilisateur($users);

            $errors = $validator->validate($depot);

            if(count($errors)) {
                $errors = $serializer->serialize($errors, 'json');
                return new Response($errors, 500, [
                    'Content-Type' => 'application/json'
                ]);
            }

        $entityManager->persist($depot);
        $entityManager->flush();
            $data = [
            'status' => 201,
            'message' => 'ajouté'
        ];
        return new JsonResponse($data, 201);
    }
        $data = [
        'status'=>500,
        'message'=>'Pas insertion'
 ];
 return new JsonResponse($data,500);
}
}