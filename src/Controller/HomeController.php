<?php

namespace App\Controller;

use App\Entity\Average;
use App\Form\AverageFormType;
use App\Repository\AverageRepository;
use App\Service\AverageService;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(AverageService $averageService,Request $request, EntityManagerInterface $entityManager, AverageRepository $averageRepository): Response
    {
        $form = $this->createForm(AverageFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            try {
                $average = $form->getData();

                $arrayNumbers = [$form->get('number1')->getData(), $form->get('number2')->getData()];
                $average->setDetails($arrayNumbers);
                $calculateAverage = $averageService->calculateAverage($arrayNumbers);
                $average->setAverage($calculateAverage);

                $entityManager->persist($average);
                $entityManager->flush();

                $this->addFlash('success', 'La moyenne a bien été calculé et ajoutée.');
                error_log('Redirection réussie vers app_home');
                return $this->redirectToRoute('app_home');

            } catch (Exception $e) {
                $this->addFlash('error', 'Une erreur est survenue. Veuillez réessayer.' . $e->getMessage());
                error_log('Redirection réussie vers app_home');
                return $this->redirectToRoute('app_home');
            }

        }

        $averages = $averageRepository->findAll();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'form' => $form->createView(),
            'averages' => $averages
        ]);
    }
}
