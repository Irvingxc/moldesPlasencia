<?php

namespace App\Imports;

use App\Models\Vitola;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VitolasImport implements ToModel
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if ($row[0] == null || $row[0] == "TABACOS DE ORIENTE S. DE R.L." || $row[0]=="INVENTARIO DE MOLDES" ||$row[0]=="VITOLA"){
            $molde = null;
          } else {
            $molde_existe = Vitola::where('vitola', $row[0])->count();
            if ($molde_existe > 0) {
              $molde = null;
            } else {
              $molde =  new vitola([
                'vitola' => $row[0],
                'id_planta' => 3,
              ]);
            }
          }
          return $molde;
    }



    /*public function rules(): array
    {
        return [
            '1' => Rule::in(['patrick@maatwebsite.nl']),

             // Above is alias for as it always validates in batches
             '*.1' => Rule::in(['patrick@maatwebsite.nl']),

             // Can also use callback validation rules
             '0' => function($attribute, $value, $onFailure) {
                  if ($value !== 'Patrick Brouwers') {
                       $onFailure('Name is not Patrick Brouwers');
                  }
              }
        ];
    }*/
}
