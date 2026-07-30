<?php

declare(strict_types=1);

namespace Modules\Hotel\Http\Services;

use Illuminate\Support\Facades\DB;
use Modules\Hotel\Http\Repositories\HotelRepo;
use Modules\Hotel\Models\Hotel;

class HotelService
{
    public function __construct(protected HotelRepo $repo)
    {
    }

    public function create(array $data)
    {
        DB::transaction(function () use ($data) {
            return $this->repo->create($data);
        });
    }

    public function update(array $data, Hotel $hotel)
    {
        DB::transaction(function () use ($data, $hotel) {
            return $this->repo->update($data, $hotel);
        });
    }

    public function destroy(Hotel $hotel)
    {
        DB::transaction(function () use ($hotel) {
            return $this->repo->destroy($hotel);
        });
    }
}
