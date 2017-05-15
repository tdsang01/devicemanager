<?php

use Faker\Factory as Faker;
use App\Models\DeviceCats;
use App\Repositories\DeviceCatsRepository;

trait MakeDeviceCatsTrait
{
    /**
     * Create fake instance of DeviceCats and save it in database
     *
     * @param array $deviceCatsFields
     * @return DeviceCats
     */
    public function makeDeviceCats($deviceCatsFields = [])
    {
        /** @var DeviceCatsRepository $deviceCatsRepo */
        $deviceCatsRepo = App::make(DeviceCatsRepository::class);
        $theme = $this->fakeDeviceCatsData($deviceCatsFields);
        return $deviceCatsRepo->create($theme);
    }

    /**
     * Get fake instance of DeviceCats
     *
     * @param array $deviceCatsFields
     * @return DeviceCats
     */
    public function fakeDeviceCats($deviceCatsFields = [])
    {
        return new DeviceCats($this->fakeDeviceCatsData($deviceCatsFields));
    }

    /**
     * Get fake data of DeviceCats
     *
     * @param array $postFields
     * @return array
     */
    public function fakeDeviceCatsData($deviceCatsFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $deviceCatsFields);
    }
}
