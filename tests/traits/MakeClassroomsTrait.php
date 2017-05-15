<?php

use Faker\Factory as Faker;
use App\Models\Classrooms;
use App\Repositories\ClassroomsRepository;

trait MakeClassroomsTrait
{
    /**
     * Create fake instance of Classrooms and save it in database
     *
     * @param array $classroomsFields
     * @return Classrooms
     */
    public function makeClassrooms($classroomsFields = [])
    {
        /** @var ClassroomsRepository $classroomsRepo */
        $classroomsRepo = App::make(ClassroomsRepository::class);
        $theme = $this->fakeClassroomsData($classroomsFields);
        return $classroomsRepo->create($theme);
    }

    /**
     * Get fake instance of Classrooms
     *
     * @param array $classroomsFields
     * @return Classrooms
     */
    public function fakeClassrooms($classroomsFields = [])
    {
        return new Classrooms($this->fakeClassroomsData($classroomsFields));
    }

    /**
     * Get fake data of Classrooms
     *
     * @param array $postFields
     * @return array
     */
    public function fakeClassroomsData($classroomsFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $classroomsFields);
    }
}
