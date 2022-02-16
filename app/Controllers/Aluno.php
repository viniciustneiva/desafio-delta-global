<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlunoModel;
use CodeIgniter\Files\File;
use CodeIgniter\Database\Database;

class Aluno extends BaseController {


    protected $helpers = ['form'];
    private $AlunoModel;

    public function __construct() {

        $this->AlunoModel = new AlunoModel();

    }

    public function index() {
        // função para a exibição da página inicial

        return view('layouts/alunos', [

            // paginação dos elementos
            'alunos' => $this->AlunoModel->paginate(10),
            'pager' => $this->AlunoModel->pager

        ]);

    }

    public function delete($id) {
        // função de exclusão de um aluno
        
        if($this->AlunoModel->delete($id)){

            echo view('layouts/messages', [

                'message' => 'Aluno excluído com sucesso!'

            ]);

        }else{

            echo "Erro na exclusão.";

        }

    }
 
    public function create() {
        // funcao para a acesso a view de criação de um aluno

        return view('layouts/inserir');

    }



    public function store() {
        // salva os dados no banco

        $request = \Config\Services::request();
        $db = \Config\Database::connect();
        
        $fileName =  $request->getFile('foto'); // arquivo temporário
        $aluno = $this->request->getPost()['idAluno'];
        $query = $db->query('SELECT * FROM alunos WHERE idAluno='.$aluno.' LIMIT 1');
        //   = $db->query("SELECT idAluno FROM alunos WHERE idAluno=$aluno");
        $imgName = $_FILES['foto']['name']; // nome verdadeiro do arquivo
        
        if(!empty($fileName) && $fileName->getSize() > 0){
            // se a imagem de fato existe, é movida para a pasta 'uploads'

            $fileName->move('assets/uploads/', $imgName);

        }

        $data = [

            'nome' =>  $this->request->getPost()['nome'],
            'logradouro' =>  $this->request->getPost()['logradouro'],
            'numero' =>  $this->request->getPost()['numero'],
            'bairro' =>  $this->request->getPost()['bairro'],
            'cidade' =>  $this->request->getPost()['cidade'],
            'foto' =>  $_FILES['foto']['name'],

        ];
        if($db->table('alunos')->like('idAluno', $aluno)->countAllResults() == 0){ 
            // verifica se existe algum aluno neste ID antes de guardar

            if($this->AlunoModel->save($aluno,$data)) {
    
                return view('layouts/messages',[
                    'message' => 'Aluno salvo com sucesso!'
                ]);
    
            } else {
    
                echo 'Erro ao criar o aluno.';
    
            }
        }else{
            if($this->AlunoModel->update($aluno,$data)) {
    
                return view('layouts/messages',[
                    'message' => 'Aluno atualizado com sucesso!'
                ]);
    
            } else {
    
                echo 'Erro ao atualizar o aluno.';
    
            }
        }        

    }

    public function edit($id) {
        // função que dá acesso a view de edição com os dados do aluno

        return view('layouts/inserir', [

            'aluno' => $this->AlunoModel->find($id)

        ]);
    }
    

}
