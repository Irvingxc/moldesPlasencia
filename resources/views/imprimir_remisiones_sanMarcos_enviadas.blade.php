<title>Reporte Inventario remisiones San Marcos <?php echo($fecha);?></title>




<div class="row" style="width: 100%;margin:10px; text-align:center;">
    <h4 style="margin:10px;font-style:oblique;"> Remisiones enviadas San Marcos, Tabacos de Oriente </h4>
</div>


<div class="row">
    <div class="col">

        <div style="text-size:20px;margin-bottom:5px;">Fecha: <?php echo($fecha);?></div>

        <table style="width: 100% ;border: solid 2px;">
            <thead>
                <tr style="text-align: center;">
                    <th style="padding: 2px;text-align: center;border: solid .5px;width:100px">Fecha</th>
                    <th style="padding: 2px;text-align: center;border: solid .5px;width:100px">Para</th>
                    <th style="padding: 2px;text-align: center;border: solid .5px;width:100px">Estado</th>
                    <th style="padding: 2px;text-align: center;border: solid .5px;width:150px">Tipo de molde</th>
                    <th style="padding: 2px;text-align: center; border: solid .5px;width:80px;">Cantidad</th>
                    </tr>
            </thead>
            <tbody>

                @foreach($moldes as $molde)
                <tr>
                <td style="padding: 2px;text-align: center;border: solid .5px;width:100px">{{$molde->fecha}}</td>
                    <td style="padding: 2px;border: solid .5px;width:100px">{{$molde->nombre_fabrica}}</td>
                    <td style="padding: 2px ;border: solid .5px;width:100px">{{$molde->estado_moldes}}</td>
                    <td style="padding: 2px; border: solid .5px;width:150px">{{$molde->tipo_moldes}} </td>
                    <td style="padding: 2px;text-align: right;;border: solid .5px;width:80px">{{$molde->cantidad}}</td>
                </tr>
                @endforeach


            </tbody>
        </table>

    </div>

</div>