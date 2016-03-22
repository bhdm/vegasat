<?php

namespace BasketBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ApiController extends Controller
{
    /**
     * Показать весь список товаров в корзине
     * @Route("/basket/api/v1/get-products", name="api_get_basket_list" )
     */
    public function getBasketListAction()
    {
        return new JsonResponse();
    }

    /**
     * Добавить товар в корзину
     *  Параметры товара передаются через Request
     * @Route("/basket/api/v1/add-product", name="api_get_basket_add" )
     */
    public function basketAddAction(Request $request)
    {

    }

    /**
     * Изменить параметры/количество товара
     *  id товара в Get, параметры в Request
     * @Route("/basket/api/v1/edit-product/{productId}", name="api_get_basket_edit" )
     */
    public function basketEditAction(Request $request)
    {

    }

    /**
     * Удалить товар из корзины
     *  id товара передается через Get
     * @Route("/basket/api/v1/remove-product/{productId}", name="api_get_basket_remove" )
     */
    public function basketRemoveAction()
    {

    }

    /**
     * Очистить корзщину от товаров
     * @Route("/basket/api/v1/clear-basket", name="api_get_basket_clear" )
     */
    public function basketClearAction(Request $request)
    {

    }

    /**
     * Создать ссылку на корзину
     * @Route("/basket/api/v1/save-basket", name="api_get_basket_save" )
     */
    public function basketSaveAction()
    {

    }
}
