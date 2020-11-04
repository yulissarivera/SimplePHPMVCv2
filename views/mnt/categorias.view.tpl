<section><h1>Mantenimiento de Categorías</h1></section>
<section>AQuí va el Formulario de Categorías</section>
<section>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Estado</th>
                <th>Detalles</th>
            </tr>
        </thead>
        <tbody>
            {{foreach categorias}}
            <tr>
                <td>{{catecod}}</td>
                <td>{{catenom}}</td>
                <td>{{cateest}}</td>
                <td>
                    <a href="index.php?page=categoria&mode=INS&catecod={{catecod}}">Insertar</a><br/>
                    <a href="index.php?page=categoria&mode=UPD&catecod={{catecod}}">Actualizar</a><br/>
                    <a href="index.php?page=categoria&mode=VS&catecod={{catecod}}">Ver</a><br/>

                </td>
            </tr>
            {{endfor categorias}}
        </tbody>
    </table>
</section>