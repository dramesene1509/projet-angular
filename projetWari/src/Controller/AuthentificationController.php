<?php

namespace App\Controller;

use App\Entity\Profil;
use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/api")
 */
class AuthentificationController extends AbstractController
{
    /**
     * @Route("/register", name="register",methods={"POST"})
    */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $entityManager, SerializerInterface $serializer, ValidatorInterface $validator)
    {
        $values=json_decode($request->getcontent());
        if(isset($values->username,$values->password)){
            $user = new Utilisateur();
            $user->setUsername($values->username);
            $user->setPassword($passwordEncoder->encodePassword($user,$values->password));
            $user->setRoles(['ROLE_USER']);
            $user->setNom($values->nom);
            $user->setPrenom($values->prenom);
            $user->setEmail($values->email);
            $user->setTelephone($values->telephone);
            $user->setAdresse($values->adresse);
            $user->setCni($values->cni);
            $user->setStatut($values->statut);
            $profil=$user->setProfil($this->getDoctrine()->getRepository(Profil::class)->find($values->profil));
            
           
            $errors = $validator->validate($user);

            if(count($errors)) {
                $errors = $serializer->serialize($errors, 'json');
                 return new Response($errors, 500, [
                    'Content-Type' => 'application/json'
                ]);
             }
            $entityManager->persist($user);
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
    /**
    * @Route("/login_check", name="login", methods={"POST"})
    */
    public function login(Request $request)
    {
        $user = $this->getUser();
        return $this->json([
            'username' => $user->getUsername(),
            'roles' => $user->getRoles()
        ]);
    }
        
}
