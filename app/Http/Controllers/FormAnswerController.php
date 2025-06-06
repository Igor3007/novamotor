<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Handlers\StoreContactsFormAnswer;
use App\Handlers\StoreFastFormAnswer;
use App\Handlers\StoreCallFormAnswer;
use App\Http\Requests\FormAnswerContactsRequest;
use App\Http\Requests\FormAnswerFastRequest;
use App\Http\Requests\FormAnswerCallRequest;
use Illuminate\Http\Request;

class FormAnswerController extends Controller
{
    public function storeFastForm(FormAnswerFastRequest $formAnswerFastRequest, StoreFastFormAnswer $storeFastFormAnswer): array {

        $formAnswer = $storeFastFormAnswer->handle($formAnswerFastRequest->getDto());

        return [
            'success' => true
        ];
    }

    public function storeCallForm(FormAnswerCallRequest $formAnswerCallRequest, StoreCallFormAnswer $storeCallFormAnswer): array {

        $formAnswer = $storeCallFormAnswer->handle($formAnswerCallRequest->getDto());

        return [
            'success' => true
        ];
    }

    public function storeContactsForm(FormAnswerContactsRequest $formAnswerCallRequest, StoreContactsFormAnswer $storeCallFormAnswer): array {

        $formAnswer = $storeCallFormAnswer->handle($formAnswerCallRequest->getDto());

        return [
            'success' => true
        ];
    }
}
