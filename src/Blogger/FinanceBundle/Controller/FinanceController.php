<?php

namespace Blogger\FinanceBundle\Controller;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Blogger\FinanceBundle\Entity\Income;
use Blogger\FinanceBundle\Service\FinanceApiService;
use Blogger\FinanceBundle\Service\FinanceFormsService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FinanceController extends Controller
{
    /**
     * @Route("/", name="BloggerFinanceBundle_home")
     */
    public function indexAction()
    {

        $api = new FinanceApiService();
        //$incomeForm = $this->createForm(FinanceFormsService::class, new Income());

        $income = new Income();
        $income->setDate(new \DateTime());

        $incomeForm = $this->createFormBuilder($income)
            ->add('Date', DateType::class)
            ->add('Amount', MoneyType::class)
            ->add('Note', TextType::class)
            ->getForm();


        return $this->render('BloggerFinanceBundle:Page:index.html.twig', array(
            'wallets' => $api->getWallets(),
            'incomes' => $api->getIncomes(),
            'incomeForm' => $incomeForm->createView()
        ));
    }

    /**
     * @Route("/ajax/newincome", name="BloggerFinanceBundle_newincome")
     */
    public function newIncomeAction(Request $request)
    {
        $note = $request->request->get('note');
        $amount = $request->request->get('amount');
        $year = $request->request->get('year');
        $month = $request->request->get('month');
        $day = $request->request->get('day');

        $api = new FinanceApiService();
        $date = $month . "-" . $day . "-" . $year;
        $api->newIncome($note, $amount, $date);

        $response = array("Date" => $date, "Amount" => $amount, "Note" => $note, "wallets" => $api->getWallets());
        return new Response(json_encode($response));
    }
}
