<?php

namespace App\Http\Controllers;

use Illuminate\{
    Foundation\Validation\ValidatesRequests,
    Http\JsonResponse,
    Http\Request
};

class BaseC
{
    use ValidatesRequests;
    protected function validateRequest(Request $request, array $rules, array $messages = []): array
    {
        return $this->validate($request, $rules, $messages);
    }

    protected function success(array $data = [], string $message = 'Success', int $status = 200): JsonResponse
    {
        return response()->json([
            'status'  => $status,
            'message' => $message,
            ...$data,
        ], $status);
    }
    
    protected function error(string $message = 'Error', int $status = 400): JsonResponse
    {
        return response()->json([
            'status'  => $status,
            'message' => $message,
        ], $status);
    }

    protected function handleCallback(\Closure $callback)
    {
        try {
            return $callback();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return $this->error('Data tidak ditemukan', 404);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return $this->error('Validasi gagal', 422);
        } catch (\Exception $e) {
            return $this->error('Terjadi kesalahan server', 500);
        }
    }

}
