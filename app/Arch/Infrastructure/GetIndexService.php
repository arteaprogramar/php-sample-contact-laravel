<?php

namespace App\Arch\Infrastructure;

use App\Models\Contact;
use Illuminate\Support\Arr;

class GetIndexService extends BaseService {

    public function execute() {
        $data = $this -> iterator -> transform();

        $query = Contact::where('active', true);

        if (count($data) > 0) {
            $query -> where('name', $data['name']);
        }

        $query = $query -> orderBy('name') -> get() -> toArray();
        $this -> iterator -> feedback($query);
    }

}

