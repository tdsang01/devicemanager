<?php

use Faker\Factory as Faker;
use App\Models\DeviceStatuses;
use App\Repositories\DeviceStatusesRepository;

trait MakeDeviceStatusesTrait
{
    /**
     * Create fake instance of DeviceStatuses and save it in database
     *
     * @param array $deviceStatusesFields
     * @return DeviceStatuses
     */
    public function makeDeviceStatuses($deviceStatusesFields = [])
    {
        /** @var DeviceStatusesRepository $deviceStatusesRepo */
        $deviceStatusesRepo = App::make(DeviceStatusesRepository::class);
        $theme = $this->fakeDeviceStatusesData($deviceStatusesFields);
        return $deviceStatusesRepo->create($theme);
    }

    /**
     * Get fake instance of DeviceStatuses
     *
     * @param array $deviceStatusesFields
     * @return DeviceStatuses
     */
    public function fakeDeviceStatuses($deviceStatusesFields = [])
    {
        return new DeviceStatuses($this->fakeDeviceStatusesData($deviceStatusesFields));
    }

    /**
     * Get fake data of DeviceStatuses
     *
     * @param array $postFields
     * @return array
     */
    public function fakeDeviceStatusesData($deviceStatusesFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $deviceStatusesFields);
    }
}
