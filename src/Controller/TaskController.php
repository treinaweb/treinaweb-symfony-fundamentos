<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use App\Entity\Task;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TaskController extends AbstractController
{
    /**
     * Lista as tarefas do sistema
     */
    public function index(EntityManagerInterface $entityManager)
    {
        $repository = $entityManager->getRepository(Task::class);

        $tasks = $repository->findAll();

        return $this->render("tasks/index.html.twig", [
            "tasks" => $tasks
        ]);
    }

    /**
     * Mostra tarefa especifica
     */
    public function show($id, \Twig_Environment $twig, EntityManagerInterface $entityManager)
    {
        $repository = $entityManager->getRepository(Task::class);

        $task = $repository->find($id);

        $content = $twig->render("tasks/show.html.twig", [
            "task" => $task
        ]);

        return new Response($content);
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