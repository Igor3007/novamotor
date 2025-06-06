<?php

declare(strict_types=1);

namespace App\DTOs;

use Illuminate\Support\Arr;

final readonly class FormAnswerContactsDTO
{
    public function __construct(
        private string $page,
        private string $form_name,
        private ?string $name,
        private ?string $company,
        private string $phone,
        private ?string $email,
        private ?string $message,
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

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }



    public static function fromArray(array $data): self
    {
        return new self(
            Arr::get($data, 'page', ''),
            Arr::get($data, 'form_name', ''),
            Arr::get($data, 'name', ''),
            Arr::get($data, 'company', ''),
            Arr::get($data, 'phone', ''),
            Arr::get($data, 'email', ''),
            Arr::get($data, 'message', ''),
        );
    }
}
