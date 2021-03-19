<?php

/*
    Может стоит создать отдельную папку form ?
    не совсем понятно почему этот класс лежит в controller
*/

namespace App\Controller;


use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostForm extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('title'       ,TextType::class)
            ->add('content'     ,TextareaType::class)
            ->add('activeForm'  ,DateTimeType::class);
    }

    /* Что он делает и зачем он нужен ? */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults( ['data_class'=>Post::class] );

    }

}