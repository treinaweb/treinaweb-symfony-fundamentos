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
        $content = $twig->render("tasks/index.html.twig", [
            "escola" => "Treinaweb Cursos",
            "curso"  => "Laravel",
            "cursos" => [
                0 => [
                    "name" => "Laravel"
                ],
                1 => [
                    "name" => "Symfony"
                ],
                2 => [
                    "name" => "AWS"
                ],
            ]
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