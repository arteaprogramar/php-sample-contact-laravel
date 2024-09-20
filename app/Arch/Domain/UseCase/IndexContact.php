<?php

namespace App\Arch\Domain\UseCase;

use App\Arch\Infrastructure\GetIndexService;
use Illuminate\Support\Arr;

class IndexContact extends BaseCase implements BaseIterator {

    private GetIndexService $service;

    public function __construct() {
        parent::__construct();
        $this -> service = new GetIndexService($this);
    }

    public function transform(): array {
        if (Arr::exists($this -> getAttributes(), 'search')) {
            return [
                'name' => Arr::get($this -> getAttributes(), 'search'),
            ];
        }

        return [];
    }

    public function apply(): BaseCase {
        $this -> service -> execute();
        return $this;
    }

    public function feedback(mixed $response) : void {
        $message = is_array($response) && count($response) > 0 ? 'Ok' : 'Sin resultados';
        $this -> setResponse($message, $response);
    }
}
