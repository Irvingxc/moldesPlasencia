
<title>Reporte Inventario De Moldes <?php echo($fecha);?></title>

 


<div class="row" style="width: 100%;margin:10px; text-align:center;">
  <h4 style="margin:10px;font-style:oblique;"> Inventario De Moldes, Tabacos de Oriente </h4>
</div>


<div class="row">
<div class="col">

<div style="text-size:20px;margin-bottom:5px;">Fecha:  <?php echo($fecha);?></div>
      

<table  style="width: 100% ;border: solid 2px;">
        <thead >
        <tr style="text-align: center;">
            
            <th style="padding: 2px;text-align: center;border: solid .5px;width:150px" >Figura y tipo</th>
            <th style="padding: 2px;text-align: center;border: solid .5px;width:65px" >Buenos</th>
            <th style="padding: 2px;text-align: center;border: solid .5px;width:65px" >Irregulares</th>
            <th style="padding: 2px;text-align: center;border: solid .5px;width:65px" >Malos</th>
            <th style="padding: 2px;text-align: center;border: solid .5px;width:65px" >Bodega</th>
            <th style="padding: 2px;text-align: center;border: solid .5px;width:65px" >Reparación</th>
            <th style="padding: 2px;text-align: center;border: solid .5px;width:65px" >Salón</th>
            <th style="padding: 2px;text-align: center;border: solid .5px;width:65px" >Total</th>
            
         </tr>
            
         </thead>
         <tbody>

         @foreach($moldes as $molde)
        
            <tr style = "font-size:10px; height:10px;"> 
           
                  <td style="padding: 2px;border: solid .5px;width:100px" > {{$molde->figura_vitola}}</td> 
                  <td style="padding: 2px;text-align: right;border: solid .5px;width:50px" >{{$molde->total_bueno}}</td>
                  <td style="padding: 2px;text-align: right;border: solid .5px;width:50px" >{{$molde->total_irregulares}}</td>
                  <td style="padding: 2px;text-align: right;border: solid .5px;width:50px" >{{$molde->total_malo}}</td>
                  <td style="padding: 2px;text-align: right;border: solid .5px;width:50px" >{{$molde->total_bodega}}</td>
                  <td style="padding: 2px;text-align: right;border: solid .5px;width:50px" >{{$molde->total_repacion}}</td>
                  <td style="padding: 2px;text-align: right;border: solid .5px;width:50px" >{{$molde->total_salon}}</td>
                  <td style="padding: 2px;border: solid .5px;text-align: right; width:50px; font:bold;" >{{$molde->total}}</td>
          
             </tr>
             @endforeach
             <tr style ="font-size:10px; font:bold;">
            <td style="padding: 2px;text-align: center;border: solid .5px;width:50px" ><strong>Moldes Plasencia</strong></td>          
             <td style="padding: 2px;text-align: right;border: solid .5px;width:50px" >
            
                <?php
                $suma_b=0;
                foreach ($moldes as $molde)
                 {
                  $suma_b+=$molde->total_bueno;
                }
                
                ?>   {{$suma_b}}    </td>
            <td style="padding: 2px;text-align: right;border: solid .5px;width:50px" >
              <?php
               $suma_i=0;
               foreach ($moldes as $molde)
                 {
                  $suma_i+=$molde->total_irregulares;
                }
                ?>   {{$suma_i}}</td>
            <td style="padding: 2px;text-align: right;border: solid .5px;width:50px" >
            <?php
             $suma_m=0;
             foreach ($moldes as $molde)
                 {
                  $suma_m+=$molde->total_malo;
                }
                ?>   {{$suma_m}}
            </td >
            <td style="padding: 2px;text-align: right;border: solid .5px;width:50px" >
            <?php
            $suma_bo=0;
            foreach ($moldes as $molde)
                 {
                  $suma_bo+=$molde->total_bodega;
                }
                ?>   {{$suma_bo}}
            </td>
            <td style="padding: 2px;text-align: right;border: solid .5px;width:50px" >
            <?php
            $suma_r=0;
            foreach ($moldes as $molde)
                 {
                  $suma_r+=$molde->total_repacion;
                }
                ?>   {{$suma_r}}
            </td>
            <td style="padding: 2px;text-align: right;border: solid .5px;width:50px" >
            <?php
            $suma_s=0;
            foreach ($moldes as $molde)
             {
                  $suma_s+=$molde->total_salon;
                }
                ?>   {{$suma_s}}
            </td>
            <td style="padding: 2px;text-align: right;border: solid .5px;width:50px" >
           <?php
            $suma_total=0;
            foreach ($moldes as $molde)
                 {
                  $suma_total = $suma_b+$suma_m+$suma_i ;
                 }
                ?>   {{$suma_total}}
            </td>
            </tr>

            </div>
            </div>
          </tbody>
    </table>
    
   

