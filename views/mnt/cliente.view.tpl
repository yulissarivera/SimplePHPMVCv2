<h1>{{modedsc}}</h1>
<selection>
    <form method="POST" action="index.php?page=cliente&mode={{mode}}&clientid={{clientid}}">
        <input type="hidden" name="mode" value="{{mode}}"/>
        <input type="hidden" name="clientid" value="{{clientid}}"/>
        <input type="hidden" name="xsstoken" value="{{xsstoken}}"/>
        <div>
        <label for="clientname">Nombre del Cliente: </label>
        <input {{readonly}} type="text" name="clientname" id="clientname" value="{{clientname}}" placeholder="Nombre del Cliente"/>
        </div>
        <div>
        <label for="clientgender">Genero: </label>
        <select name="clientgender" id="clientgender" {{readonly}}>
            <option value="FEM" {{clientgender_FEM}}>Femenino</option>
            <option value="MAS" {{clientgender_MAS}}>Masculino</option>
        </select>
        </div>
        <div>
        <label for="clientphone1">Telefono 1: </label>
        <input {{readonly}} type="text" name="clientphone1" id="clientphone1" value="{{clientphone1}}" placeholder="Telefono 1"/>
        </div>
        <div>
        <label for="clientphone2">Telefono 2: </label>
        <input {{readonly}} type="text" name="clientphone2" id="clientphone2" value="{{clientphone2}}" placeholder="Telefono 2"/>
        </div>
        <div>
        <label for="clientmail">Correo: </label>
        <input {{readonly}} type="text" name="clientmail" id="clientmail" value="{{clientmail}}" placeholder="Correo Electronico"/>
        </div>
        <div>
        <label for="clientnumber">Numero de Identidad: </label>
        <input {{readonly}} type="text" name="clientnumber" id="clientnumber" value="{{clientnumber}}" placeholder="Identidad"/>
        </div>
        <div>
        <label for="clientbio">Biografia: </label>
        <input {{readonly}} type="text" name="clientbio" id="clientbio" value="{{clientbio}}" placeholder="Biografia"/>
        </div>
        <div>
        <label for="clientstatus">Estado: </label>
        <select name="clientstatus" id="clientstatus" {{readonly}}>
            <option value="ACT" {{clientstatus_ACT}}>Activo</option>
            <option value="INA" {{clientstatus_INA}}>Inactivo</option>
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
            location.assign("index.php?page=clientes");
        });
    });
</script>