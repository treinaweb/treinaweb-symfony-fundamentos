<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaskController 
{
    /**
     * Lista as tarefas do sistema
     * 
     * @Route("/lista", name="lista")
     */
    public function index()
    {
        return new Response("Está é minha primeira página");
    }
}