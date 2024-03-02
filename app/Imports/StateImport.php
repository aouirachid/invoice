<?php
namespace App\Imports;

use App\Models\State;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StateImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new State([
            'state' => $row['name'],
            'zipcode' => $row['zipcode'],
            // Add more fields as needed
        ]);
    }
}
