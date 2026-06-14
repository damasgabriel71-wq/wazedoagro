<?php
class HomeController {
    public function index(): void {
        // Define o caminho base para os includes do home
        $public = BASE_PATH . '/public';
        require_once $public . '/home.php';
    }
}