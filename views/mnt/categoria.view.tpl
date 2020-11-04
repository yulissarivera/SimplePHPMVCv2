<h1>{{modedsc}}</h1>
<section>
    <form method="post" action="index.php?page=categorias&mode={{mode}}&catecod={{catecod}}">
        <input type="hidden" name="mode" value="{{mode}}" />
        <input type="hidden" name="catecod" value="{{catecod}}">
        <div>
            <label for="catenom">Categoria:</label>
            <input type="text" name="catenom" id="catenom" value="catenom" placeholder="Categoria" />
        </div>
        <div>
            <label for="cateest">Estado</label>
            <input type="text" name="cateest" id="cateest" value="cateest" placeholder="estado" />
        </div>
        <button id="btnsubmit" type="submit" name="btnsubmit">Enviar</button>
        <button id="btncancel">Cancelar</button>

    </form>
</section>

<script>
    $().ready(function(){
        $("#btncancel").click(function(e){
            e.preventDefault();
            e.stopPropagation();
            location.assign("index.php?page=categorias");
        });
    });
</script> 