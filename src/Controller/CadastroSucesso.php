<?php

namespace src\doctrine\Controller;

class CadastroSucesso implements InterfaceProcessaRequisicao
{
    public function processaRequisicao(): void
    {
        // TODO: Implement processaRequisicao() method.
        require_once __DIR__. './../../view/remover-produto.php';
    }

}