<?php

namespace App\Controller;

use App\Entity\Batiment;
use App\Form\BatimentFormType;
use App\Repository\BatimentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BatimentChaffaiYassineController extends AbstractController
{
    #[Route('/batiment/chaffai/yassine', name: 'app_batiment_chaffai_yassine')]
    public function index(): Response
    {
        return $this->render('batiment_chaffai_yassine/index.html.twig', [
            'controller_name' => 'BatimentChaffaiYassineController',
        ]);
    }
    #[Route('/batiment/list', name: 'app_batiment_list')]
    public function list(BatimentRepository $batimentRepository): Response
    {   
        $batiments= $batimentRepository->findAll();
        return $this->render('batiment_chaffai_yassine/list.html.twig', [
            'batiments' => $batiments,
        ]);
    }

    #[Route('/batiment/create', name:'app_batiment_create')]
    public function createBatiment(Request $request, EntityManagerInterface $em){
        $batiment = new Batiment();
        $form= $this->createForm(BatimentFormType::class, $batiment);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $em->persist($batiment);
            $em->flush();
            return $this->redirectToRoute('app_batiment_list');
        }
        return $this->render('batiment_chaffai_yassine/form.html.twig', [
            "title" => "Create Batiment",
            "form" => $form
        ]);
    }
    #[Route('/batiment/delete/{id}', name:'app_batiment_delete')]
    public function deleteAuthor($id, EntityManagerInterface $em, BatimentRepository $batimentRepository){
        $batiment = $batimentRepository->find($id);
        $em->remove($batiment);
        $em->flush();
        return $this->redirectToRoute('app_batiment_list');
    }

    #[Route('/batiment/update/{id}', name:'app_batiment_update')]
    public function updateAuthor($id,Request $request, EntityManagerInterface $em, BatimentRepository $batimentRepository){
        $batiment =  $em->getRepository(Batiment::class)->find($id);
        $form= $this->createForm(BatimentFormType::class, $batiment);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $em->flush();
            return $this->redirectToRoute('app_batiment_list');
        }
        return $this->render('batiment_chaffai_yassine/form.html.twig', [
            "title" => "Update Batiment",
            "form" => $form
        ]);
    }
    #[Route('/batiment/details/{id}', name: 'app_batiment_details')]
    public function details($id, BatimentRepository $batimentRepository): Response{
        
        $batiment = $batimentRepository->find($id);
        return $this->render('batiment_chaffai_yassine/detail.html.twig', [
            "batiment" => $batiment,
            "title" => "Batiment Details",
        ]);
    }
}
