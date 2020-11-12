<section><h1>Mantenimiento de Categorias</h1></section>
<hr/>
<form action="index.php?page=categorias" method="post">
<section class="row">
    <h2>Filtrar por</h2>
    <div class="col-sm-12 col-md-10">
        <label class="col-sm-12 col-md-3" for="cln_txtfilter">Codigo | Nombre</label>
        <input class="col-sm-12 col-md-9" type="text" name="cln_txtfilter" id="cln_txtfilter" value="{{cln_txtfilter}}" placeholder="Codigo | Nombre"/>
    </div>
    <div class="col-sm-12 col-md-2">
        <button type="submit" name="btnFiltrar">Actualizar</button>
    </div>
</section>
</form>
<hr/>
<section>
    <table>
        <thead>
            <tr>
                <th>
                    Codigo
                </th>
                <th>
                    Nombre de Categoria
                </th>
                <th>
                    Estado
                </th>
                <th>
                    <a class="btn depth-1 s-margin" href="index.php?page=categoria&mode=INS&catecode=0"><span class="ion-plus-circled"></span></a><br/>
                </th>
            </tr>
        </thead>
        <tbody>
            {{foreach categorias}}
            <tr>
                <td>
                    {{catecode}}
                </td>
                <td>
                    {{catename}}
                </td>
                <td>
                    {{catestatus}}
                </td>
                <td class="center">
                    <a class="btn depth-1 s-margin" href="index.php?page=categoria&mode=UPD&catecode={{catecode}}"><span class="ion-edit"></span></a>
                    <a class="btn depth-1 s-margin" href="index.php?page=categoria&mode=DSP&catecode={{catecode}}"><span class="ion-eye"></span></a>
                    <a class="btn depth-1 s-margin" href="index.php?page=categoria&mode=DEL&catecode={{catecode}}"><span class="ion-trash-a"></span></a>
                </td>
            </tr>
            {{endfor categorias}}
        </tbody>
    </table>
</section>