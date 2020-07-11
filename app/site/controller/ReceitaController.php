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
        $receita = $this->getInput();

        $result = $this->receitaModel->insert($receita);

        if ($result <= 0) {
            $this->showMessage('Erro', 'Houve um erro ao tentar cadastrar, tente novamente mais tarde.');
            return;
        }

        redirect(BASE . '?url=editar&id=' . $result);
    }
}