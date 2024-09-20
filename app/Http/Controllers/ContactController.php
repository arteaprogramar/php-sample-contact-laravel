<?php

namespace App\Http\Controllers;

use App\Arch\Domain\Response\BaseResponse;
use App\Arch\Domain\UseCase\IndexContact;
use Illuminate\Http\Request;

class ContactController extends Controller {

    public function index(Request $request, IndexContact $case) {
        $this -> applyRules($request, [
            'search' => 'string|nullable|sometimes',
        ]);

        return $this -> getResponse($case -> setRequest($request) -> apply() -> getResponse());
    }

}

