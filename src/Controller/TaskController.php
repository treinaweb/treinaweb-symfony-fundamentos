<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use App\Entity\Task;
use Doctrine\ORM\EntityManagerInterface;

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

    /**
     * Inserir uma tarefa
     *
     * @return void
     */
    public function create(EntityManagerInterface $entityManager)
    {
        $task = new Task;
        $task->setTitle("Visitar o cliente X");
        $task->setDescription("Visitar o cliente X por razão X");
        $task->setScheduling(new \DateTime());

        $entityManager->persist($task);
        $entityManager->flush();

        return new Response("Registro criado com sucesso id: " . $task->getId());
    }
}