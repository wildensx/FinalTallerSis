<!DOCTYPE html>
<html lang="es">
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Licoreria "Super Originales"</title>
    <link rel="stylesheet" href="css\style.css" media="all" />
   </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="http://192.168.99.100/FinalTallerSis/public/imagenes/articulos/logo.jpg" width="730" height="160">
      </div>
      <div style="line-height:0.1">
      <h3><center>Licoreria "Super Originales"</center></h3>
          <h5><center>La Paz S.A</center></h5>
          <h5><center>Casa Matriz</center></h5>
          <h5><center>Calle 28 Los Pinos</center></h5>
          <h5><center>Telf: 2727431</center></h5>
          <h5><center>La Paz - Bolivia</center></h5>
          <h5><center>FACTURA ORIGINAL</center></h5>
          <h5><center>Numero de factura: {{$venta->num_comprobante}}</center></h5>
          <h5><center>Codigo de factura: {{$venta->serie_comprobante}}</center></h5>
          <h5>Fecha: <?php $fecha = date("j/n/Y"); echo $fecha; ?> Hora: <?php $hora = date("h:i:s"); echo $hora ?></h5>
          <h5>Nit/Ci: {{$venta->num_documento}}</h5>
          <h5>Señor(es): {{$venta->nombre}}</h5>
          <h5>Detalle:</h5>
<table>
   <thead>
       <tr>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>% de descuento</th>
            <th>Monto descontando</th>
            <th>Subtotal</th>
          </tr>
        </thead>
   <tbody>
@foreach($detalle as $det)
      <tr>
          <td class="item">{{$det->articulo}}</td>
        <td> <img src="http://192.168.99.100/FinalTallerSis/public/imagenes/articulos/{{$det->imagen}}" width="80" height="60"> </td>
        <td class="number">{{$det->cantidad}}</td>
        <td class="item"><output>{{$det->precio_venta}}</output></td>
          <td class="item"><output>{{$det->descuento}}</output></td>
          <td class="item"><output>{{(($det->cantidad*$det->precio_venta)*($det->descuento/100))}}</output></td>
        <td class="item"><output>{{($det->cantidad*$det->precio_venta)-(($det->cantidad*$det->precio_venta)*($det->descuento/100))}}</output></td>
      </tr>
         @endforeach
     </tbody>
</table>    
    <footer>
    <table> 
    <thead>
       <tr>
            <th>---------------------------------------------------------------------------------------------</th>
            <th>-----------------------------------------------------------</th>
          </tr>
        </thead>
        <tfoot>
        <th></th>
        <th><h4 id="total">Total: {{$venta->total_venta}} BS</h4></th>
        </tfoot>
    </table>
      <div style="line-height:0.1">
          <h5><center>ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAIS, SU USO ILICITO SERA SANCIONADO POR LEY</center>></h5><br>
          <h5><center>Ley N° 453: Los servicios deben suministrase en condiciones de inocuidad, calidad y seguridad</center>></h5>
      </div>
    </footer>
      </div>
    </header>
</body>
</html>