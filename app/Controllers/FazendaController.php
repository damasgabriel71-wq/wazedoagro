<?php
declare(strict_types=1);

namespace App\Controllers;

use Core\Controller;
use Core\Auth;
use App\Models\Fazenda;

class FazendaController extends Controller
{
    public function index(): void
    {
        Auth::require();
        $user     = Auth::user();
        $model    = new Fazenda();
        $fazendas = $model->findByUsuario((int) $user['id']);

        $this->render('fazenda/index', compact('fazendas', 'user'));
    }

    public function criar(): void
    {
        Auth::require();
        $this->render('fazenda/form');
    }

    public function salvar(): void
    {
        Auth::require();
        $user  = Auth::user();
        $nome  = trim($_POST['nome'] ?? '');

        if (empty($nome)) {
            $this->render('fazenda/form', ['erro' => 'Nome é obrigatório.']);
            return;
        }

        $model = new Fazenda();
        $model->criar($nome, (int) $user['id']);
        $this->redirect('/fazendas');
    }

    public function deletar(): void
    {
        Auth::require();
        $id    = (int) ($_POST['id'] ?? 0);
        $model = new Fazenda();
        $model->delete($id);
        $this->redirect('/fazendas');
    }
}
