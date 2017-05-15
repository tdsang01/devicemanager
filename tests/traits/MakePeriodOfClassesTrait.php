<?php

use Faker\Factory as Faker;
use App\Models\PeriodOfClasses;
use App\Repositories\PeriodOfClassesRepository;

trait MakePeriodOfClassesTrait
{
    /**
     * Create fake instance of PeriodOfClasses and save it in database
     *
     * @param array $periodOfClassesFields
     * @return PeriodOfClasses
     */
    public function makePeriodOfClasses($periodOfClassesFields = [])
    {
        /** @var PeriodOfClassesRepository $periodOfClassesRepo */
        $periodOfClassesRepo = App::make(PeriodOfClassesRepository::class);
        $theme = $this->fakePeriodOfClassesData($periodOfClassesFields);
        return $periodOfClassesRepo->create($theme);
    }

    /**
     * Get fake instance of PeriodOfClasses
     *
     * @param array $periodOfClassesFields
     * @return PeriodOfClasses
     */
    public function fakePeriodOfClasses($periodOfClassesFields = [])
    {
        return new PeriodOfClasses($this->fakePeriodOfClassesData($periodOfClassesFields));
    }

    /**
     * Get fake data of PeriodOfClasses
     *
     * @param array $postFields
     * @return array
     */
    public function fakePeriodOfClassesData($periodOfClassesFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'timestart' => $fake->word,
            'timeend' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $periodOfClassesFields);
    }
}
