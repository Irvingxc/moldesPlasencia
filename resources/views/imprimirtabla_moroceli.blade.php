
<title>Reporte Inventario De Moldes <?php echo($fecha);?></title>




<div class="row" style="width: 100%;margin:10px; text-align:center;">
  <h4 style="margin:10px;font-style:oblique;"> Tabacos de Oriente Morocelí, Inventario De Moldes</h4>
</div>




<div style="text-size:20px;margin-bottom:5px;">Fecha:  <?php echo($fecha);?></div>

<table style="width: 100% ;border: solid 2px;">
        <thead >
        <tr style="text-align: center;" >
        <th style="padding: 2px;text-align: center;border: solid .5px;width:60px" >Vitola</th>
            <th style="padding: 2px;text-align: center;border: solid .5px;width:100px" >Figura y tipo</th>
            <th style="padding: 2px;text-align: center;border: solid .5px;width:65px" >Buenos</th>
            <th style="padding: 2px;text-align: center;border: solid .5px;width:65px" >Malos</th>
            <th style="padding: 2px;text-align: center;border: solid .5px;width:65px " >Bodega</th>
            <th style="padding: 2px;text-align: center;border: solid .5px;width:65px" >Reparación</th>
            <th style="padding: 2px;text-align: center;border: solid .5px;width:65px" >Sálon</th>
            <th style="padding: 2px;text-align: center;border: solid .5px;width:65px" >Total</th>

         </thead>
         <tbody>
            @foreach($moldes as $molde)
            <tr style = "font-size:10px; height:10px;">
            <td style="padding: 5px; text-align: center;border: solid .05px; font-size:10px; " >{{$molde->vitola}}</td>
                  <td style="padding: 5px;;border: solid .05px; font-size:10px; width:50px;">{{$molde->nombre_figura}}</td>
                  <td style="padding: 5px; text-align: center;border: solid .05px; font-size:10px; text-align:right"  >{{$molde->bueno}}</td>
                  <td style="padding: 5px; text-align: center;border: solid .05px; font-size:10px; text-align:right"  >{{$molde->malos}}</td>
                  <td style="padding: 5px; text-align: center;border: solid .05px; font-size:10px; text-align:right" >{{$molde->bodega}}</td>
                  <td style="padding: 5px; text-align: center;border: solid .05px; font-size:10px; text-align:right" >{{$molde->reparacion}}</td>
                  <td style="padding: 5px; text-align: center;border: solid .05px; font-size:10px; text-align:right"  >{{$molde->salon}}</td>
                  <td style="padding: 5px;text-align: center;border: solid .05px; font-size:10px; font:bold;text-align:right"  >{{$molde->total}}</td>



             </tr>

            @endforeach
            <tr style ="font-size:10px; font:bold;">
            <td style="padding: 5px;text-align: center;border: solid .05px;font-style:bold;" colspan="2"><strong>Total General Moldes</strong></td>


            <td  style="padding: 5px;border: solid .05px; text-align:right ">
                <?php
                $suma_b=0;
                foreach ($moldes as $molde)
                 {
                  $suma_b+=$molde->bueno;
                }

                ?>   {{$suma_b}}
            </td>
            <td style="padding: 5px;border: solid .05px; text-align:right " >
              <?php
               $suma_i=0;
                foreach ($moldes as $molde)
                 {
                  $suma_i+=$molde->irregulares;
                }
                ?>   {{$suma_i}}</td>
            <td  style="padding: 5px;border: solid .05px; text-align:right " >
            <?php
             $suma_m=0;
                foreach ($moldes as $molde)
                 {
                  $suma_m+=$molde->malos;
                }
                ?>   {{$suma_m}}
            </td>
            <td  style="padding: 5px;border: solid .05px; text-align:right ">
            <?php
            $suma_bo=0;
                foreach ($moldes as $molde)
                 {
                  $suma_bo+=$molde->bodega;
                }
                ?>   {{$suma_bo}}
            </td>
            <td  style="padding: 5px;border: solid .05px; text-align:right ">
            <?php
            $suma_r=0;
                foreach ($moldes as $molde)
                 {
                  $suma_r+=$molde->reparacion;
                }
                ?>   {{$suma_r}}
            </td>
            <td  style="padding: 5px;border: solid .05px; text-align:right ">
            <?php
            $suma_s=0;
                foreach ($moldes as $molde)
                 {
                  $suma_s+=$molde->salon;
                }
                ?>   {{$suma_s}}
            </td>
            <td  style="padding: 5px;border: solid .05px; text-align:right ">
            <?php
            $suma_total=0;
                foreach ($moldes as $molde)
                 {
                  $suma_total+=$molde->total;
                }
                ?>   <strong>{{$suma_total}}</strong>
            </td>
            </tr>
          <tbody>
    </table>



