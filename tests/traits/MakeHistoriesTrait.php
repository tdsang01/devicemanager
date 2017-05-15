<?php

use Faker\Factory as Faker;
use App\Models\Histories;
use App\Repositories\HistoriesRepository;

trait MakeHistoriesTrait
{
    /**
     * Create fake instance of Histories and save it in database
     *
     * @param array $historiesFields
     * @return Histories
     */
    public function makeHistories($historiesFields = [])
    {
        /** @var HistoriesRepository $historiesRepo */
        $historiesRepo = App::make(HistoriesRepository::class);
        $theme = $this->fakeHistoriesData($historiesFields);
        return $historiesRepo->create($theme);
    }

    /**
     * Get fake instance of Histories
     *
     * @param array $historiesFields
     * @return Histories
     */
    public function fakeHistories($historiesFields = [])
    {
        return new Histories($this->fakeHistoriesData($historiesFields));
    }

    /**
     * Get fake data of Histories
     *
     * @param array $postFields
     * @return array
     */
    public function fakeHistoriesData($historiesFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'id_device' => $fake->randomDigitNotNull,
            'id_borrower' => $fake->randomDigitNotNull,
            'date' => $fake->word,
            'id_periodstart' => $fake->randomDigitNotNull,
            'id_periodend' => $fake->randomDigitNotNull,
            'id_lender' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $historiesFields);
    }
}
