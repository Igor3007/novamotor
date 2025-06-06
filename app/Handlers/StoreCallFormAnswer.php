<?php

namespace App\Handlers;

use App\DTOs\FormAnswerCallDTO;

final class StoreCallFormAnswer
{
    public function handle(FormAnswerCallDTO $dto): \App\Models\FormAnswer
    {
        $formAnswer = new \App\Models\FormAnswer();
        $formAnswer->page = $dto->getPage();
        $formAnswer->form_name = $dto->getFormName();
        $formAnswer->name = $dto->getName();
        $formAnswer->company = $dto->getCompany();
        $formAnswer->phone = $dto->getPhone();
        $formAnswer->email = $dto->getEmail();
        $formAnswer->message = $dto->getMessage();
        $formAnswer->save();

        return $formAnswer;
    }
}
