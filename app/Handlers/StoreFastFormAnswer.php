<?php

namespace App\Handlers;

use App\DTOs\FormAnswerFastDTO;

final class StoreFastFormAnswer
{
    public function handle(FormAnswerFastDTO $dto): \App\Models\FormAnswer
    {
        $formAnswer = new \App\Models\FormAnswer();
        $formAnswer->page = $dto->getPage();
        $formAnswer->form_name = $dto->getFormName();
        $formAnswer->name = $dto->getName();
        $formAnswer->phone = $dto->getPhone();
        $formAnswer->save();

        return $formAnswer;
    }
}
