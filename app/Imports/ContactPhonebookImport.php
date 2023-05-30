<?php

namespace App\Imports;

use App\Events\ImportCondition;
use App\Models\ContactPhoneBook;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ContactPhonebookImport implements ToModel, WithHeadingRow
{
    public function __construct(protected $id)
    {
    }
    public function model(array $row)
    {
        return ContactPhoneBook::query()->updateOrCreate([
            'phonebook_id' => $this->id,
            'name' =>  $row['name'],
            'phone' => ImportCondition::dispatch($row['phone'])[0]
        ]);
    }
}
