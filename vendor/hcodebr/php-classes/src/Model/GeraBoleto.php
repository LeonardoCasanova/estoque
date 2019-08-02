<?php

namespace Estoque\Model;

use Estoque\Recebimento;
use Estoque\Model;


class GeraBoleto extends Model {
    

    public static function gerarBoleto() {

        $credencial = "6ef5e5c493f22ef42d1c052e069af5df3060c090";
        $chave = "cfeb3e01f0d7d2217fc5f522f73c67ea56e5a669";

        $PJBankRecebimentos = new Recebimento($credencial, $chave);

        $boleto = $PJBankRecebimentos->Boletos->NovoBoleto();

        $boleto->setNomeCliente("Matheus Fidelis")            
            ->setCpfCliente("29454730000144")
            ->setValor(10.50)
            ->setVencimento("09/01/2017")
            ->setPedidoNumero(rand(0, 999))            
            ->gerar();

        print_r($boleto->getNossoNumero() . PHP_EOL);
        print_r($boleto->getLink() .  PHP_EOL);
        print_r($boleto->getPedidoNumero() . PHP_EOL);


    }
       

}