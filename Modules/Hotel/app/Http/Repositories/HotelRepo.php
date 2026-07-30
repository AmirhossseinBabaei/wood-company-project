<?php

declare(strict_types=1);

namespace Modules\Hotel\Http\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Modules\Hotel\Models\Hotel;

class HotelRepo
{
    protected function query(): Builder
    {
        return Hotel::query();
    }

    public function create(array $data)
    {
        $hotel = $this
            ->query()
            ->create($data);

        $hotel
            ->properties()
            ->sync($data['properties']);

        return $hotel;
    }

    public function update(array $data, Hotel $hotel): bool
    {
        $hotel->update($data);
        $hotel->properties()->sync($data['properties']);

        return true;
    }

    public function destroy(Hotel $hotel): bool
    {
        $hotel->properties()->detach();
        $hotel->delete();

        return true;
    }
}
