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
        return new Response("Retorna lista de tarefas");
    }

    /**
     * Mostra tarefa especifica
     */
    public function show($id)
    {
        return new Response("Mostrando a tarefa " . $id);
    }
}