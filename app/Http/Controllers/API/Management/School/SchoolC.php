<?php

namespace App\Http\Controllers\API\Management\School;

use App\{
    Http\Controllers\BaseC,
    Services\Management\School\SchoolService
};

use Illuminate\{
    Http\Request
};

class SchoolC extends BaseC
{
    public function __construct(protected SchoolService $schoolService)
    {
        $this->schoolService = $schoolService;
    }

    public function index()
    {
        return $this->handleCallback(fn() => 
            $this->success($this->schoolService->getAllSchool())
        );
    }

    public function show($schoolId)
    {
        return $this->handleCallback(fn() => 
            $this->success($this->schoolService->getById($schoolId))
        );
    }

    public function store(Request $req)
    {
        $data = $this->validateRequest($req,[
            'npsn'    => 'required|digits:8',
            'address' => 'required|string',
            'phone'   => 'nullable|string|max:16',
        ]);

        return $this->handleCallback(fn() =>
            $this->success($this->schoolService->create($data))
        );
    }

    public function update(Request $req, $schoolId)
    {
        $data = $this->validateRequest($req,[
            'npsn'    => 'required|digits:8',
            'address' => 'required|string',
            'phone'   => 'nullable|string|max:15',
        ]);

        return $this->handleCallback(fn() =>
            $this->success($this->schoolService->update($schoolId, $data))
        );
    }

    public function destroy($schoolId)
    {
        $this->schoolService->delete($schoolId);

        return $this->handleCallback(fn() =>
            $this->success($this->schoolService->delete($schoolId))
        );
    }
}
