
<title>Reporte Inventario De Moldes <?php echo($fecha);?></title>

 


<div class="row" style="width: 100%;margin:10px; text-align:center;">
  <h4 style="margin:10px;font-style:oblique;"> Inventario De Moldes, Tabacos de Oriente </h4>
</div>


<div class="row">
<div class="col">

<div style="text-size:20px;margin-bottom:5px;">Fecha:  <?php echo($fecha);?></div>
      
<table style="width: 100% ;border: solid 2px;" id="tablaenviadas">
        <thead class= "table-dark">
        <tr style="text-align: center;" >
            <th style="padding: 2px;text-align: center;border: solid .5px;width:100px">Fecha</th>
            <th style="padding: 2px;text-align: center;border: solid .5px;width:100px">De</th>
            <th style="padding: 2px;text-align: center;border: solid .5px;width:100px">Para</th>
            <th style="padding: 2px;text-align: center;border: solid .5px;width:100px">Estado</th>   
            <th style="padding: 2px;text-align: center;border: solid .5px;width:100px">Tipo de molde</th>   
            <th style="padding: 2px;text-align: center;border: solid .5px;width:100px">Cantidad</th>            
         </thead>
         <tbody>
        
         @foreach($moldes as $molde)
            <tr style = "font-size:10px; height:10px;"> 
                <td style="padding: 2px;text-align: center;border: solid .5px;width:100px">{{$molde->fecha}}</td>
                <td style="padding: 2px;text-align: center;border: solid .5px;width:100px">{{$molde->nombre_planta}}</td>
                <td style="padding: 2px;text-align: center;border: solid .5px;width:100px">{{$molde->nombre_fabrica}}</td>
                <td style="padding: 2px;text-align: center;border: solid .5px;width:100px">{{$molde->estado_moldes}}</td>
                <td style="padding: 2px;text-align: center;border: solid .5px;width:120px">{{$molde->tipo_moldes}}</td>
                <td style="padding: 2px;text-align: center;border: solid .5px;width:100px">{{$molde->cantidad}}</td>
              
            </tr>

            @endforeach 
             
           
          <tbody>
    </table>

</div>

</div>






