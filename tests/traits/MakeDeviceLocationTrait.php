<?php

use Faker\Factory as Faker;
use App\Models\DeviceLocation;
use App\Repositories\DeviceLocationRepository;

trait MakeDeviceLocationTrait
{
    /**
     * Create fake instance of DeviceLocation and save it in database
     *
     * @param array $deviceLocationFields
     * @return DeviceLocation
     */
    public function makeDeviceLocation($deviceLocationFields = [])
    {
        /** @var DeviceLocationRepository $deviceLocationRepo */
        $deviceLocationRepo = App::make(DeviceLocationRepository::class);
        $theme = $this->fakeDeviceLocationData($deviceLocationFields);
        return $deviceLocationRepo->create($theme);
    }

    /**
     * Get fake instance of DeviceLocation
     *
     * @param array $deviceLocationFields
     * @return DeviceLocation
     */
    public function fakeDeviceLocation($deviceLocationFields = [])
    {
        return new DeviceLocation($this->fakeDeviceLocationData($deviceLocationFields));
    }

    /**
     * Get fake data of DeviceLocation
     *
     * @param array $postFields
     * @return array
     */
    public function fakeDeviceLocationData($deviceLocationFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $deviceLocationFields);
    }
}
