<h1>Ficha de Desarrollo</h1>
<section>
  <h2>{{cuenta}} {{nombre}}</h2>
  <em>Correo: {{correo}}</em>
</section>    
<section>
  <h2>Proyectos</h2>
  <table>
    <tr>
      <td>
      Código
      </td>
      <td>
      Proyecto
      </td>
    </tr>
    {{foreach proyectos}}
    <tr>
      <td>
      {{id}}
      </td>
      <td>
      {{name}}
      </td>
    </tr>  
    {{endfor proyectos}}
  </table>  
  <h2>Educación</h2>
  <table>
    <tr>
      <td>
      Código
      </td>
      <td>
      Descripción
      </td>
    </tr>
    {{foreach educacion}}
    <tr>
      <td>
      {{id}}
      </td>
      <td>
      {{name}}
      </td>
    </tr>  
    {{endfor educacion}}
   </table>
</section>

