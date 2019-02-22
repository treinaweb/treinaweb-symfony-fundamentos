<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use App\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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

        $task = $repository->find($id);

        if (!$task) {
            throw $this->createNotFoundException("Tarefa não encontrada");
        }

        return $this->render("tasks/show.html.twig", [
            "task" => $task
        ]);
    }

    /**
     * Inserir uma tarefa
     *
     * @return void
     */
    public function create(): Response
    {
        $task = new Task;
        $task->setTitle("Visitar o cliente X");
        $task->setDescription("Visitar o cliente X por razão X");
        $task->setScheduling(new \DateTime());

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($task);
        $entityManager->flush();

        return $this->redirectToRoute("tasks_show", ["id" => $task->getId()]);
    }
}