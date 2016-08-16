<?php

namespace Blogger\FinanceBundle\Service;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\FormBuilderInterface;

class FinanceFormsService
{
    public function NewIncomeForm(FormBuilderInterface $builderInterface, array $options) {
        $builderInterface
            ->add('Date', DateType::class)
            ->add('Amount', MoneyType::class)
            ->add('Note', TextType::class);
    }
}