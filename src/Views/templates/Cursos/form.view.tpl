<h2>{{modeDsc}}</h2>

{{if errores}}
<ul>
    {{foreach errores}}
    <li>{{this}}</li>
    {{endfor errores}}
</ul>
{{endif errores}}

<form method="post" action="index.php?page=Cursos_Curso&mode={{mode}}&id={{curso_id}}">

    <label>ID</label>
    <input type="text" name="curso_id" value="{{curso_id}}" readonly>

    <label>Nombre</label>
    <input type="text" name="nombre" value="{{nombre}}" {{readonly}}>

    <label>Descripción</label>
    <input type="text" name="descripcion" value="{{descripcion}}" {{readonly}}>

    <label>Duración (horas)</label>
    <input type="number" name="duracion_horas" value="{{duracion_horas}}" {{readonly}}>

    <label>Estado</label>

    {{if readonly}}
        <input type="text" name="estado" value="{{estado}}" readonly>
    {{endif readonly}}

    {{ifnot readonly}}
        <select name="estado">
            <option value="ACT" {{if estado == 'ACT'}}selected{{endif estado}}>Activo</option>
            <option value="INA" {{if estado == 'INA'}}selected{{endif estado}}>Inactivo</option>
        </select>
    {{endifnot readonly}}

    <br><br>

    <a href="index.php?page=Cursos_Cursos">Cancelar</a>

    {{ifnot isDisplay}}
        <button type="submit">
            {{if isDelete}}Eliminar{{endif isDelete}}
            {{ifnot isDelete}}Guardar{{endifnot isDelete}}
        </button>
    {{endifnot isDisplay}}

</form>