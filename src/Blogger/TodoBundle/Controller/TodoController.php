<?php

namespace Blogger\TodoBundle\Controller;

use Blogger\TodoBundle\Service\TodoApiService;
use Blogger\TodoBundle\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class TodoController extends Controller
{
    /**
     * @Route("/", name="BloggerTodoBundle_home")
     */
    public function indexAction() {
        $api = new TodoApiService();
        //$incomeForm = $this->createForm(FinanceFormsService::class, new Income());


        /*
        $task = new Task();
        $incomeForm = $this->createFormBuilder($income)
            ->add('Date', DateType::class)
            ->add('Amount', MoneyType::class)
            ->add('Note', TextType::class)
            ->getForm();

        */

        return $this->render('BloggerTodoBundle:Page:index.html.twig', array(
            'tasks' => $api->getTasks(),
        ));
    }
}
