<?php

namespace Estoque\Model;
use Estoque\DB\Sql;
use Estoque\Model;



class Conta extends Model {


    public static function listConta($iduser) {

               
        $sql = new Sql();

        $results = $sql->select("
                   SELECT * FROM tb_conta c inner join tb_users u on u.iduser = c.iduser
                   WHERE c.iduser = :iduser;", array(
                  ":iduser" => $iduser,
        ));

       return $results[0];
              

    }


}