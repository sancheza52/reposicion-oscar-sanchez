<h2>Listado de Cursos</h2>

<table class="striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Duración (horas)</th>
            <th>Estado</th>
            <th>
                <a href="index.php?page=Cursos_Curso&mode=INS">Nuevo</a>
            </th>
        </tr>
    </thead>
    <tbody>
        {{foreach cursos}}
        <tr>
            <td>{{curso_id}}</td>
            <td>{{nombre}}</td>
            <td>{{descripcion}}</td>
            <td>{{duracion_horas}}</td>
            <td>{{estado}}</td>
            <td>
                <a href="index.php?page=Cursos_Curso&mode=DSP&id={{curso_id}}">Ver</a>
                <a href="index.php?page=Cursos_Curso&mode=UPD&id={{curso_id}}">Editar</a>
                <a href="index.php?page=Cursos_Curso&mode=DEL&id={{curso_id}}">Eliminar</a>
            </td>
        </tr>
        {{endfor cursos}}
    </tbody>
</table>