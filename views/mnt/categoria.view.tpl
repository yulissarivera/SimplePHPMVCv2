<h1>{{modedsc}}</h1>
<selection>
    <form method="POST" action="index.php?page=categoria&mode={{mode}}&catecode={{catecode}}">
        <input type="hidden" name="mode" value="{{mode}}"/>
        <input type="hidden" name="catecode" value="{{catecode}}"/>
        <input type="hidden" name="xsstoken" value="{{xsstoken}}"/>
        <div>
        <label for="catename">Nombre de la Categoria: </label>
        <input {{readonly}} type="text" name="catename" id="catename" value="{{catename}}" placeholder="Nombre de la Categoria"/>
        </div>
        <div>
        <label for="catestatus">Estado: </label>
        <select name="catestatus" id="catestatus" {{readonly}}>
            <option value="ACT" {{catestatus_ACT}}>Activo</option>
            <option value="INA" {{catestatus_INA}}>Inactivo</option>
            <option value="EST" {{catestatus_EST}}>Estado</option>
        </select>
        </div>
        {{if deletemsg}}
            <div class="alert">
                {{deletemsg}}
            </div>
        {{endif deletemsg}}
    <button id="btnsubmit" name="btnsubmit" type="submit">Enviar</button>
    <button id="btncancelar">Cancelar</button>
    </form>
</selection>
<script>
    $().ready(function(){
        $("#btncancelar").click(function(e){
            e.preventDefault();
            e.stopPropagation();
            location.assign("index.php?page=categorias");
        });
    });
</script>