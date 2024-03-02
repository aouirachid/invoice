<?php
namespace App\Imports;

use App\Models\City;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CitiesImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new City([
            'name' => $row['name'],
            // Add more fields as needed
        ]);
    }
}
