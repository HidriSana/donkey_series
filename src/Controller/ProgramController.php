<?php

namespace App\Controller;

use App\Entity\Program;
use App\Repository\ProgramRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/program', name: 'program_')]
class ProgramController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(ProgramRepository $programRepository): Response
    {   
        $programs = $programRepository->findAll();
        return $this->render('program/index.html.twig', [
            'programs' => $programs
        ]);
    }
    #[Route('/list/{page}', name: 'list')]
    public function list(int $page) : Response {
        return $this->render('program/list.html.twig', [
            'page' => $page
        ]);
    }

    #[Route('/{id<^\d+$>}', methods: ["GET"],name: 'show_by_id')]
    public function show(Program $program) : Response {
        return $this->render('program/show.html.twig', [
            'program' => $program
        ]);
    }

}