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
    public function index()
    {
        $repository = $this->getDoctrine()->getManager()->getRepository(Task::class);

        return $this->render("tasks/index.html.twig", [
            "tasks" => $repository->findAll()
        ]);
    }

    /**
     * Mostra tarefa especifica
     */
    public function show($id)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository(Task::class);

        return $this->render("tasks/show.html.twig", [
            "task" => $repository->find($id)
        ]);
    }

    /**
     * Inserir uma tarefa
     *
     * @return void
     */
    public function create()
    {
        $task = new Task;
        $task->setTitle("Visitar o cliente X");
        $task->setDescription("Visitar o cliente X por razão X");
        $task->setScheduling(new \DateTime());

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($task);
        $entityManager->flush();

        return new Response("Registro criado com sucesso id: " . $task->getId());
    }
}