<?php

use \Estoque\PageAdmin;
use \Estoque\Model\Conta;
use \Estoque\Model\User;


$app->get('/admin/conta/:iduser', function ($iduser) {

User::verifyLogin();

$user = new User();

$user->get((int)$iduser);

$conta = new Conta();

$page = new PageAdmin();

$page->setTpl("conta", array(

     "conta" => $conta->listConta($iduser)
    
    ));
});