<h1>Ficha de Desarrollo</h1>
<section>
    <h2>{{Cuenta}} {{Nombre}}</h2>
    <em>Correo: {{Correo}}</em>
</section>
<section>
    <h2>Diplomas</h2>
    <table>
        <tr>
            <td>
            CÓDIGO
            </td>
            <td>
            NOMBRE DEL DIPLOMA
            </td>
            <td>
            ORGANIZACIÓN
            </td>
            <td>
            AÑO
            </td>
        </tr>
        {{foreach diplomas}}
        <tr>
            <td>
            {{id}}
            </td>
            <td>
            {{name}}
            </td>
            <td>
            {{tipo}}
            </td>
            <td>
            {{tiempo}}
            </td>
        </tr>
        {{endfor diplomas}}
    </table>
</section>