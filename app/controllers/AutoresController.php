<?php 

namespace controllers; 

use models\AutorModel;
use DateTime;
use helpers\Log;

class AutoresController 
{ 
    private $erros = array();

    public function index()
    {
        $dados['titulo'] = 'Autores';

        $autorModel = new AutorModel();
        $autores = $autorModel->returnaTodosOsAutores();
        $dados['autores'] = $autores;

        view('autores/index', $dados);
    }

    public function create()
    {
        $dados['titulo'] = 'Cadastrar autor';

        if (isset($_SESSION['erros_de_validacao'])) {
            $dados['erros_de_validacao'] = $_SESSION['erros_de_validacao'];
            unset($_SESSION['erros_de_validacao']);
        }
        
        view('autores/create', $dados);
    }

    public function store()
    {
        $this->validar_campos($_POST['nome'], $_POST['data_nascimento'], $_POST['nacionalidade'], $_POST['biografia'], STATUS_CRIANDO);

        if (!empty($this->erros)) {
            $_SESSION['erros_de_validacao'] = $this->erros;
            header('Location: /autores/create');
            return;
        }
        
        $autoresModel = new AutorModel();
        $resultado = $autoresModel->cadastrar_autor($_POST['nome'], $_POST['data_nascimento'], $_POST['nacionalidade'], $_POST['biografia']);
        if ($resultado->status == 'success') {
            header('Location: /autores');
        } else if ($resultado->status == 'error') {
            Log::critical("Houve um erro em " . __METHOD__ . " com a seguinte mensagem: " . $resultado->msg);
            view('sistema/erro-interno');
        }
    }

    /*
     * Funções para validação dos campos de formulário
     */
    public function validar_campos($nome, $data_nascimento, $nacionalidade, $biografia, $status, $id= null)
    {
        $autor_model = new AutorModel();
        
        if (empty($nome)) {
            $this->erros['nome'] = "O campo nome é obrigatório!";
        } else if (strlen($nome) > 255) {
            $this->erros['nome'] = "O campo nome deve ter menos de 255 caracteres!";
        } else if ($status == STATUS_CRIANDO AND $autor_model->existeNomeCadastrar($nome)) {
            $this->erros['nome'] = 'Já existe um autor cadastrado com esse nome!';
        } else if ($status == STATUS_ATUALIZANDO AND $autor_model->existeNomeAtualizar($id, $nome)) {
            $this->erros['nome'] = 'Já existe outro autor cadastrado com esse nome!';
        }

        $objData = DateTime::createFromFormat("Y-m-d", $data_nascimento);
        if (!$objData OR $objData->format('Y-m-d') != $data_nascimento) {
            $this->erros['data_nascimento'] = "A data informada não é válida!";
        }
        
        if (strlen($nacionalidade) > 255) {
            $this->erros['nacionalidade'] = 'O campo nacionalidade deve ter menos de 255 caracteres';
        }

        if (strlen($biografia) > 3_000) {
            $this->erros['biografia'] = 'O campo biografia deve ter menos de 3.000 caracteres';
        }

        if (!empty($this->erros)) return $this->erros;
        return false;
    }
}