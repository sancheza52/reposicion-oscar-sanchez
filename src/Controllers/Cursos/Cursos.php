<?php

namespace Controllers\Cursos;

use Controllers\PublicController;
use Dao\Cursos\Cursos as DaoCursos;
use Views\Renderer;
use Utilities\Site;
use Utilities\Validators;
use Exception;

class Curso extends PublicController
{
    private array $errores = [];
    private array $modes = [
        "INS" => "Nuevo Curso",
        "UPD" => "Editar Curso",
        "DEL" => "Eliminar Curso",
        "DSP" => "Detalle del Curso"
    ];

    private string $mode = "";
    private int $curso_id = 0;
    private string $nombre = "";
    private string $descripcion = "";
    private int $duracion_horas = 0;
    private string $estado = "ACT";

    public function run(): void
    {
        try {
            $this->init();
            if ($this->isPostBack()) {
                $this->procesarFormulario();
            }
            Renderer::render("Cursos/form", $this->getViewData());
        } catch (Exception $ex) {
            Site::redirectToWithMsg("index.php?page=Cursos_Cursos", $ex->getMessage());
        }
    }

    private function init(): void
    {
        if (!isset($_GET["mode"]) || !isset($this->modes[$_GET["mode"]])) {
            throw new Exception("Modo no válido");
        }

        $this->mode = $_GET["mode"];

        if ($this->mode !== "INS") {
            if (!isset($_GET["id"])) {
                throw new Exception("ID requerido");
            }

            $curso = DaoCursos::obtenerCursoPorId(intval($_GET["id"]));
            if (!$curso) {
                throw new Exception("Curso no encontrado");
            }

            $this->curso_id = $curso["curso_id"];
            $this->nombre = $curso["nombre"];
            $this->descripcion = $curso["descripcion"];
            $this->duracion_horas = $curso["duracion_horas"];
            $this->estado = $curso["estado"];
        }
    }

    private function procesarFormulario(): void
    {
        $this->curso_id = intval($_POST["curso_id"] ?? 0);
        $this->nombre = $_POST["nombre"] ?? "";
        $this->descripcion = $_POST["descripcion"] ?? "";
        $this->duracion_horas = intval($_POST["duracion_horas"] ?? 0);
        $this->estado = $_POST["estado"] ?? "ACT";

        if (Validators::IsEmpty($this->nombre)) {
            $this->errores[] = "El nombre es obligatorio";
        }

        if (count($this->errores) > 0) {
            return;
        }

        switch ($this->mode) {
            case "INS":
                DaoCursos::crearCurso(
                    $this->nombre,
                    $this->descripcion,
                    $this->duracion_horas,
                    $this->estado
                );
                break;
            case "UPD":
                DaoCursos::actualizarCurso(
                    $this->curso_id,
                    $this->nombre,
                    $this->descripcion,
                    $this->duracion_horas,
                    $this->estado
                );
                break;
            case "DEL":
                DaoCursos::eliminarCurso($this->curso_id);
                break;
        }

        Site::redirectToWithMsg("index.php?page=Cursos_Cursos", "Proceso realizado correctamente");
    }

    private function getViewData(): array
    {
        return [
            "mode" => $this->mode,
            "modeDsc" => $this->modes[$this->mode],
            "curso_id" => $this->curso_id,
            "nombre" => $this->nombre,
            "descripcion" => $this->descripcion,
            "duracion_horas" => $this->duracion_horas,
            "estado" => $this->estado,
            "errores" => $this->errores,
            "readonly" => ($this->mode === "DSP" || $this->mode === "DEL") ? "readonly" : "",
            "isDelete" => ($this->mode === "DEL"),
            "isDisplay" => ($this->mode === "DSP")
        ];
    }
}