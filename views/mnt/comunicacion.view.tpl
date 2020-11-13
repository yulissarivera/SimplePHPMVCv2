<h1>{{modedsc}}</h1>
<selection>
    <form method="POST" action="index.php?page=comunicacion&mode={{mode}}&clientid={{clientid}}&cmnid={{cmnid}}">
        <input type="hidden" name="mode" value="{{mode}}"/>
        <input type="hidden" name="cmnid" value="{{cmnid}}"/>
        <input type="hidden" name="clientid" value="{{clientid}}"/>
        <input type="hidden" name="xsstoken" value="{{xsstoken}}"/>
        <div>
        <label for="cmnnotas">Notas de comunicacion: </label>
        <input {{readonly}} type="text" name="cmnnotas" id="cmnnotas" value="{{cmnnotas}}" placeholder="Notas"/>
        </div>
        <div>
        <label for="cmntags">Etiquetas de Comunicacion: </label>
        <input {{readonly}} type="text" name="cmntags" id="cmntags" value="{{cmntags}}" placeholder="Etiqueta"/>
        </div>
        <div>
        <label for="cmntipo">Tipo de Comunicacion: </label>
        <select name="cmntipo" id="cmntipo" {{readonly}}>
            <option value="ACT" {{cmntipo_ACT}}>Activo</option>
            <option value="INA" {{cmntipo_INA}}>Inactivo</option>
        </select>
        </div>
    <button id="btnsubmit" name="btnsubmit" type="submit">Enviar</button>
    <button id="btncancelar">Cancelar</button>
    </form>
</selection>
<script>
  $().ready(function(){
    $("#btncancelar").click(function(e){
      e.preventDefault();
      e.stopPropagation();
      location.assign("index.php?page=comunicaciones&mode=CMN&clientid={{clientid}}");
    });
  });
</script>
