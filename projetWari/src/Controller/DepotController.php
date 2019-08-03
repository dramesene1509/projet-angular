<?php

namespace App\Controller;
use App\Entity\Compte;
use App\Entity\Depot;
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
class DepotController extends AbstractController
{
    /**
     * @Route("/depot", name="depot",methods={'POST'})
     */
    public function AddCompte(Request $request, EntityManagerInterface $entityManager,SerializerInterface $serializer, ValidatorInterface $validator)
    {
        $values=json_decode($request->getcontent());
        if(isset($values->montantDéposé,$values->dateDépot)){
            $depot= new Depot();
            if($values->montantDéposé<=75000){
            $depot->setMontantDéposé($values->montantDéposé);
            $depot->setDateDépot(new \DateTime());
            $recup = $this->getDoctrine()->getRepository(Compte::class)->find($values->partenaire);
            $recup->getMontanDéposé(Compte::class);
            }
            else{

               
            }
    }
}
}