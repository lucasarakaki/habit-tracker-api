<?php

declare(strict_types = 1);

namespace App\Traits;

use Illuminate\Http\Resources\Json\JsonResource;

trait HttpResponse
{
    public function success(string $message, int $status, array | JsonResource $data): array
    {
        return [
            'message' => $message,
            'status'  => $status,
            'data'    => $data,
        ];
    }

    public function error(string $message, string | int $status, array $errors, array $data = []): array
    {
        return [
            'message' => $message,
            'status'  => $status,
            'errors'  => $errors,
            'data'    => $data,
        ];
    }
}
