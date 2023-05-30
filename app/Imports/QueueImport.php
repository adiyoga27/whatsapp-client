<?php

namespace App\Imports;

use App\Events\ImportCondition;
use App\Models\QueueMessage;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class QueueImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function __construct(protected $id)
    {
    }
    public function model(array $row)
    {
        return QueueMessage::query()->updateOrCreate([
            'name' => $row['name'],
            'phone' => ImportCondition::dispatch($row['phone'])[0],
            'message_id' => $this->id,
            'status' => 'pending'
        ]);
    }
}
