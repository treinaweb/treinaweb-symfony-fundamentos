<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use App\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

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
    public function show(Task $task)
    {
        return $this->render("tasks/show.html.twig", [
            "task" => $task
        ]);
    }

    /**
     * Cria uma nova tarefa
     *
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        if ($request->isMethod("POST")) {
            $task = new Task;
            $task->setTitle($request->request->get("title"));
            $task->setDescription($request->request->get("description"));
            $task->setScheduling(new \DateTime());
    
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($task);
            $entityManager->flush();
    
            return $this->redirectToRoute("tasks_show", ["id" => $task->getId()]);
        }

        return $this->render("tasks/new.html.twig");
    }

    /**
     * Editamos as tarefas
     *
     * @param Request $request
     * @param Task $task
     * @return Response
     */
    public function edit(Request $request, Task $task): Response
    {
        return $this->render("tasks/edit.html.twig", [
            "task" => $task
        ]);
    }
}