<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Employer;
use App\Entity\Service;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class EmployerController extends AbstractController
{
       /**
     * @Route("home", name="home")
     */
    public function home()
    {
        return $this->render('employer/home.html.twig', [
            'controller_name' => 'EmployerController',
        ]);
    }
       /**
     * @Route("/employer", name="lister")
     */
    public function lister(){
        $employer=$this->getDoctrine()->getRepository(Employer::class)->findAll();
        return $this->render('employer/lister.html.twig',[
            'employer' =>$employer,
        ]);
    }
    
      /**
     * @Route("/ajout",name="employer_create")
     * @Route("/employer/{id}/ajout", name="employer_edit")
     */
    public function form(Employer $employer=null,Request $request, ObjectManager $manager){
        if(!$employer){
            $employer= new Employer;
       }
          $form = $this->createFormBuilder($employer);
            $form->add('matricule');
            $form->add('nom');
            $form->add('prenom');
            $form->add('age');
            $form->add('id_service',EntityType::class,[
                'class'=> Service::class,
                'choice_label'=> 'libelle'
            ]);
            $form->add('salaire');
            $form=$form->getForm();
            $form->handleRequest($request);
                if($form->isSubmitted() && $form->isValid()){
                   $manager->persist($employer);
                    $manager->flush();
                    return $this->redirectToroute('lister');
            }
                    return $this->render('add.html.twig',[
                    'formEmployer' =>$form->createView(),'editMode'=>$employer->getId() ==!null
        ]);
    
   

    }
     /**
     * @Route("/employer/{id}/supprimer", name="employer-edit")
     */
    public function Supprimeremployer(Employer $employer,ObjectManager $manager){
            $manager->remove($employer);
            $manager->flush();
            return $this->redirectToroute('lister');
    }


     /**
     * @Route("/employer/service", name="listerservice")
     */
    public function listerService(){
        $service=$this->getDoctrine()->getRepository(Service::class)->findAll();
        return $this->render('employer/listerservice.html.twig',[
            'services' =>$service,
        ]);
    }
    
  
    /**
     * @Route("employer/ajoutservice",name="service-create")
     */

    public function formService(Service $service=null,Request $request, ObjectManager $manager){
        if(!$service){
            $service= new Service;
       }
          $form = $this->createFormBuilder($service);
            $form->add('libelle');
            $form=$form->getForm();
            $form->handleRequest($request);
                if($form->isSubmitted() && $form->isValid()){
                   $manager->persist($service);
                    $manager->flush();
                    return $this->redirectToroute('listerservice');
            }
                    return $this->render('employer/addservice.html.twig',[
                    'formService' =>$form->createView()
        ]);
    
   }
     
  
    
  
}
