<?php

namespace app\site\controller;

use app\core\Controller;

use app\site\entitie\Receita;
use app\site\model\ReceitaModel;

class ReceitaController extends Controller
{
    private $receitaModel;

    public function __construct()
    {
        $this->receitaModel = new ReceitaModel();
    }

    /*### VIEW ###*/
    public function nova()
    {
        $this->view('receita/nova',[]);
    }

    public function ver()
    {
        $this->view('receita/ver',[]);
    }

    public function editar()
    {
        $this->view('receita/editar',[]);
    }

    /*### INTERNAL ###*/

    public function insert()
    {
        $receita = new Receita(
            null,
            post('txtTitulo'),
            post('txtConteudo', FILTER_SANITIZE_SPECIAl_CHARS),
            null,
            post('txtTags'),
            getCurrentDate()
        );

        if($this->receitaModel->insert($receita) <= 0){
            $this->showMessage('Erro', 'Ocorreu um erro no cadastro, tente novamente.');
            return;
        }
    }
}