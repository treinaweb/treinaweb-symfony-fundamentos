<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class TaskController 
{
    /**
     * Lista as tarefas do sistema
     */
    public function index()
    {
        return new Response("Está é minha primeira página");
    }
}