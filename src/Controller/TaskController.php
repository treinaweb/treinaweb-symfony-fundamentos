<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class TaskController 
{
    /**
     * Lista as tarefas do sistema
     */
    public function index(\Twig_Environment $twig)
    {
        $content = $twig->render("index.html.twig", [
            "escola" => "Treinaweb Cursos",
            "curso"  => "Symfony"
        ]);

        return new Response($content);
    }

    /**
     * Mostra tarefa especifica
     */
    public function show($id)
    {
        return new Response("Mostrando a tarefa " . $id);
    }
}