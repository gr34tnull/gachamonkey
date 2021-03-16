<?php

namespace App\Imports;

use App\Models\Participant;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NamesImport implements ToModel, WithHeadingRow
{
    use Importable;

    private $group_id;

    public function __construct($group_id)
    {
        $this->group_id = $group_id;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Participant([
            'group_id' => $this->group_id,
            'name' => strtoupper($row['name']),
        ]);
    }
}
