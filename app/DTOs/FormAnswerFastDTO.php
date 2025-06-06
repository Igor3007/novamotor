<?php

declare(strict_types=1);

namespace App\DTOs;

use Illuminate\Support\Arr;

final readonly class FormAnswerFastDTO
{
    public function __construct(
        private string $page,
        private string $form_name,
        private ?string $name,
        private string $phone,
    ) {
    }

    public function getPage(): string
    {
        return $this->page;
    }

    public function getFormName(): string
    {
        return $this->form_name;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            Arr::get($data, 'page', ''),
            Arr::get($data, 'form_name', ''),
            Arr::get($data, 'name', ''),
            Arr::get($data, 'phone', ''),
        );
    }
}
