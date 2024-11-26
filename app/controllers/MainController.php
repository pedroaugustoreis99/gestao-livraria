<?php

namespace controllers;

class MainController
{
    public function index()
    {
        view('layouts/header', ['titulo' => 'Gestão para livrarias']);

        view('layouts/footer');
    }
}