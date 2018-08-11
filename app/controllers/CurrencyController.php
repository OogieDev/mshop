<?php
/**
 * Created by PhpStorm.
 * User: RAIN
 * Date: 05.08.2018
 * Time: 17:59
 */

namespace app\controllers;


use app\models\Cart;
use ishop\App;

class CurrencyController extends AppController
{

    public function changeAction()
    {
        $currency = !empty($_GET['curr']) ? $_GET['curr'] : null;

        if($currency && array_key_exists($currency, App::$app->getProperty('currencies'))){
            $curr = \R::findOne('currency', 'code = ?', [$currency]);
            App::$app->setProperty('currency', $currency);
            setcookie('currency', $currency, time() + 3600 * 24 * 7, '/');
            Cart::recalc($curr);
        }
        redirect();
    }
}