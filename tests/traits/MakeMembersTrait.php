<?php

use Faker\Factory as Faker;
use App\Models\Members;
use App\Repositories\MembersRepository;

trait MakeMembersTrait
{
    /**
     * Create fake instance of Members and save it in database
     *
     * @param array $membersFields
     * @return Members
     */
    public function makeMembers($membersFields = [])
    {
        /** @var MembersRepository $membersRepo */
        $membersRepo = App::make(MembersRepository::class);
        $theme = $this->fakeMembersData($membersFields);
        return $membersRepo->create($theme);
    }

    /**
     * Get fake instance of Members
     *
     * @param array $membersFields
     * @return Members
     */
    public function fakeMembers($membersFields = [])
    {
        return new Members($this->fakeMembersData($membersFields));
    }

    /**
     * Get fake data of Members
     *
     * @param array $postFields
     * @return array
     */
    public function fakeMembersData($membersFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'email' => $fake->word,
            'password' => $fake->word,
            'phone' => $fake->randomDigitNotNull,
            'role' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $membersFields);
    }
}
