<h1>{{modedsc}}</h1>
<section>
  <form method="post" action="index.php?page=Comunicaciones&mode={{mode}}&clientid={{clientid}}">
    <input type="hidden" name="mode" value="{{mode}}"/>
    <input type="hidden" name="clientid" value="{{clientid}}"/>
    <input type="hidden" name="xsstoken" value="{{xsstoken}}"/>     
  </form>
</section>

<script>
  $().ready(function(){
    $("#btncancel").click(function(e){
      e.preventDefault();
      e.stopPropagation();
      location.assign("index.php?page=Comunicaciones");
    });
  });
</script>
