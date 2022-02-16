<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlunoModel;
use CodeIgniter\Files\File;

class Aluno extends BaseController {


    protected $helpers = ['form'];
    private $AlunoModel;

    public function __construct() {

        $this->AlunoModel = new AlunoModel();

    }

    public function index() {

        return view('alunos', [

            'alunos' => $this->AlunoModel->paginate(10),
            'pager' => $this->AlunoModel->pager

        ]);
    }

    public function delete($id) {

        if($this->AlunoModel->delete($id)){

            echo view('messages', [
                'message' => 'Aluno excluído com sucesso!'
            ]);

        }else{

            echo "Erro na exclusão.";

        }

    }
 
    public function create() {
        
        return view('inserir');

    }

    public function store() {

        $request = \Config\Services::request();
        $fileName =  $request->getFile('foto');
        $imgName = '';
        if(!empty($fileName) && $fileName->getSize() > 0){
            $stringRandomica = $fileName->getRandomName();
            $fileName->move('./public/assets/uploads/', $stringRandomica);
        }else{
            $imgName = $fileName->error();
        }
        if($this->AlunoModel->save($this->request->getPost())) {
            return view('messages',[
                'message' => 'Aluno salvo com sucesso!'
            ]);
        } else {
            echo "Ocorreu um erro.";
        }

    }

    public function edit($id) {
        return view('inserir', [
            'aluno' => $this->AlunoModel->find($id)
        ]);
    }

    public function upload($id) {
        $validationRule = [
            'userfile' => [
                'label' => 'Image File',
                'rules' => 'uploaded[userfile]'
                    . '|is_image[userfile]'
                    . '|mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[userfile,100]'
                    . '|max_dims[userfile,1024,768]',
            ],
        ];
        if (! $this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];

            return view('avatar', $data);
        }

        $img = $this->request->getFile('userfile');

        if (! $img->hasMoved()) {
            $filepath = WRITEPATH . 'assets/uploads/' . $img->store();

            $data = ['foto' => new File($filepath)];

            return view('avatar', $data);
        } else {
            $data = ['errors' => 'The file has already been moved.'];

            return view('avatar', $data);
        }
    }
    

}
