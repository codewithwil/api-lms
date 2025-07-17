<?php

namespace App\Traits;

trait ApiResponse
{
    protected function successResponse(array $data = [], string $message = 'Success', int $status = 200): array
    {
        return array_merge([
            'status'  => $status,
            'message' => $message,
        ], $data);
    }

    protected function errorResponse(string $message = 'Error', int $status = 400): array
    {
        return [
            'status'  => $status,
            'message' => $message,
        ];
    }
}
