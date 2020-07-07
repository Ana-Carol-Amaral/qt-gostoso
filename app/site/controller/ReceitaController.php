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
        $id = get('id');

        $this->view('receita/editar',[
            'receita' => $$this->receitaModel->readById($id)
        ]);
    }

    /*### INTERNAL ###*/

    public function insert()
    {
        $receita = new Receita(
            null,
            post('txtTitulo'),
            post('txtConteudo', FILTER_SANITIZE_SPECIAL_CHARS),
            null,
            post('txtTags'),
            getCurrentDate()
        );

        $result = $this->receitaModel->insert($receita);

        if($result <= 0)
        {
            $this->showMessage('Erro', 'Ocorreu um erro no cadastro, tente novamente mais tarde.');
            return;
        }

        redirect(BASE . '?url=editar&id=' . $result);
    }
}