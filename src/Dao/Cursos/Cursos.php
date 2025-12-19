<?php

namespace Dao\Cursos;

use Dao\Table;

class Cursos extends Table
{
    public static function obtenerCursos(): array
    {
        $sql = "SELECT * FROM cursos;";
        return self::obtenerRegistros($sql, []);
    }

    public static function obtenerCursoPorId(int $id): array
    {
        $sql = "SELECT * FROM cursos WHERE curso_id = :id;";
        return self::obtenerUnRegistro($sql, ["id" => $id]);
    }

    public static function crearCurso(
        string $nombre,
        string $descripcion,
        int $duracion_horas,
        string $estado
    ): int {
        $sql = "INSERT INTO cursos
                (nombre, descripcion, duracion_horas, estado)
                VALUES
                (:nombre, :descripcion, :duracion_horas, :estado);";

        return self::executeNonQuery($sql, [
            "nombre" => $nombre,
            "descripcion" => $descripcion,
            "duracion_horas" => $duracion_horas,
            "estado" => $estado
        ]);
    }

    public static function actualizarCurso(
        int $curso_id,
        string $nombre,
        string $descripcion,
        int $duracion_horas,
        string $estado
    ): int {
        $sql = "UPDATE cursos SET
                    nombre = :nombre,
                    descripcion = :descripcion,
                    duracion_horas = :duracion_horas,
                    estado = :estado
                WHERE curso_id = :curso_id;";

        return self::executeNonQuery($sql, [
            "curso_id" => $curso_id,
            "nombre" => $nombre,
            "descripcion" => $descripcion,
            "duracion_horas" => $duracion_horas,
            "estado" => $estado
        ]);
    }

    public static function eliminarCurso(int $curso_id): int
    {
        $sql = "DELETE FROM cursos WHERE curso_id = :curso_id;";
        return self::executeNonQuery($sql, [
            "curso_id" => $curso_id
        ]);
    }
}