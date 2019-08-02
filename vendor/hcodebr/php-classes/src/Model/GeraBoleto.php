<?php

namespace Estoque\Model;

use Estoque\Recebimento;
use Estoque\Model;
use function GuzzleHttp\json_encode;

class GeraBoleto extends Model {
    

    public static function gerarBoleto($client, $product) {
    
        $valor_total = 0;

        $descricao = array();

        // array_push($descricao, '<table class="table table-striped">
        //                             <thead>
        //                                 <tr>
        //                                     <th style="width: 100px">Código Produto</th>
        //                                     <th style="width: 300px">Nome do Produto</th>
        //                                     <th style="width: 100px">Preço</th>
        //                                     <th>Quantidade em Estoque (Unid)</th>                                             
        //                                 </tr>
        //                             </thead>');    
                                        
                                        
        // array_push($descricao,'<tbody>');
        
            foreach ($product as $key => $value){
                
                $valor_total += $value['vlprice'] * $value['vlqtde'];


                array_push($descricao,"<tr><td>".$value["idproduct"]."</td>.................");        
                array_push($descricao,"<td>".$value["desproduct"]."</td>...............");  
                array_push($descricao,"<td>R$".$value['vlprice']."</td>.........");
                array_push($descricao,"<td>".$value['vlqtde']." Unids</br></br></br>");                                              
                                        
            
            }
                // array_push($descricao,'</tbody></table>');

        // echo implode(" ", $descricao);
               
        $credencial = "3d0ef66356a4b21f01c68df33cbcc5ec07dcb771";
        $chave = "540e8f2d683a6148c143e312fd4a2bf2e186d865";
      
        $PJBankRecebimentos = new Recebimento($credencial, $chave);

        $boleto = $PJBankRecebimentos->Boletos->NovoBoleto();

        $boleto->setNomeCliente($client['tb_nome_cli'])            
            ->setCpfCliente($client['tb_cpf_cli'])
            ->setValor($valor_total)
            ->setVencimento("10/08/2019")
            ->setPedidoNumero(rand(0, 999))
            ->setTexto(implode(" ", $descricao))   
            ->setLogoUrl('https://www.defatoonline.com.br/wp-content/uploads/2019/06/2477_img.png')      
            ->gerar();

        print_r($boleto->getNossoNumero() . PHP_EOL);
        print_r($boleto->getLink() .  PHP_EOL);
        print_r($boleto->getPedidoNumero() . PHP_EOL);


    }
       

}