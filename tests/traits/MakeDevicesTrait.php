<?php

use Faker\Factory as Faker;
use App\Models\Devices;
use App\Repositories\DevicesRepository;

trait MakeDevicesTrait
{
    /**
     * Create fake instance of Devices and save it in database
     *
     * @param array $devicesFields
     * @return Devices
     */
    public function makeDevices($devicesFields = [])
    {
        /** @var DevicesRepository $devicesRepo */
        $devicesRepo = App::make(DevicesRepository::class);
        $theme = $this->fakeDevicesData($devicesFields);
        return $devicesRepo->create($theme);
    }

    /**
     * Get fake instance of Devices
     *
     * @param array $devicesFields
     * @return Devices
     */
    public function fakeDevices($devicesFields = [])
    {
        return new Devices($this->fakeDevicesData($devicesFields));
    }

    /**
     * Get fake data of Devices
     *
     * @param array $postFields
     * @return array
     */
    public function fakeDevicesData($devicesFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'quantity' => $fake->randomDigitNotNull,
            'id_classroom' => $fake->randomDigitNotNull,
            'id_devicecat' => $fake->randomDigitNotNull,
            'id_devicelocation' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $devicesFields);
    }
}
