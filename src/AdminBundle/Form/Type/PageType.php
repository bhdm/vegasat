<?php

namespace AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('category', null, ['label' => 'Категория'])

            ->add('title', null, ['label' => 'Название товара'])
            ->add('titleAlternative', null, ['label' => 'Доп. Название'])
            ->add('slug', null, ['label' => 'URI товара'])
            ->add('brand', null, ['label' => 'Бренд'])
            ->add('model', null, ['label' => 'Модель'])
            ->add('descrption', null, ['label' => 'Описание'])
            ->add('price', null, ['label' => 'Цена'])
            ->add('priceSale', null, ['label' => 'Цена со скидкой'])
            ->add('priceWholesale', null, ['label' => 'Цена для опт'])
            ->add('priceUsd', null, ['label' => 'Цена USD'])
            



            ->add('photo', FileType::class, ['label' => 'Фото обложки', 'data_class' => null, 'required' => false])
            ->add('year', null, ['label' => 'Год выпуска'])
            ->add('month', null, ['label' => 'Месяц выпуска'])
            ->add('tom', null, ['label' => 'Том'])
            ->add('pages', null, ['label' => 'Страницы'])
            ->add('description', null, ['label' => 'Описание', 'attr' => ['class' => 'ckeditor']])
            ->add('keywords', null, ['label' => 'Ключевые слова'])


            ->add('enabled',ChoiceType::class,  array(
                'choices' => array(
                    'Открыт' => '1',
                    'Закрыт' => '0',
                ),
                'label' => 'Доступ',
                'required'  => false,
            ))
        ;
    }


    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Product'
        ));
    }
}
