<?php

namespace Controllers\Cursos;

use Controllers\PublicController;
use Dao\Cursos\Cursos as DaoCursos;
use Views\Renderer;

class Cursos extends PublicController
{
    public function run(): void
    {
        $viewData = [];
        $viewData["cursos"] = DaoCursos::obtenerCursos();
        Renderer::render("Cursos/lista", $viewData);
    }
}