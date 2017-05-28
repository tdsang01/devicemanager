<?php

use Faker\Factory as Faker;
use App\Models\Repairs;
use App\Repositories\RepairsRepository;

trait MakeRepairsTrait
{
    /**
     * Create fake instance of Repairs and save it in database
     *
     * @param array $repairsFields
     * @return Repairs
     */
    public function makeRepairs($repairsFields = [])
    {
        /** @var RepairsRepository $repairsRepo */
        $repairsRepo = App::make(RepairsRepository::class);
        $theme = $this->fakeRepairsData($repairsFields);
        return $repairsRepo->create($theme);
    }

    /**
     * Get fake instance of Repairs
     *
     * @param array $repairsFields
     * @return Repairs
     */
    public function fakeRepairs($repairsFields = [])
    {
        return new Repairs($this->fakeRepairsData($repairsFields));
    }

    /**
     * Get fake data of Repairs
     *
     * @param array $postFields
     * @return array
     */
    public function fakeRepairsData($repairsFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'id_device' => $fake->randomDigitNotNull,
            'id_reporter' => $fake->randomDigitNotNull,
            'date_report' => $fake->word,
            'id_repairer' => $fake->randomDigitNotNull,
            'date_repair' => $fake->word,
            'description' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $repairsFields);
    }
}
