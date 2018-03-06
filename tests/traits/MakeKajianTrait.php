<?php

use Faker\Factory as Faker;
use App\Models\Kajian;
use App\Repositories\KajianRepository;

trait MakeKajianTrait
{
    /**
     * Create fake instance of Kajian and save it in database
     *
     * @param array $kajianFields
     * @return Kajian
     */
    public function makeKajian($kajianFields = [])
    {
        /** @var KajianRepository $kajianRepo */
        $kajianRepo = App::make(KajianRepository::class);
        $theme = $this->fakeKajianData($kajianFields);
        return $kajianRepo->create($theme);
    }

    /**
     * Get fake instance of Kajian
     *
     * @param array $kajianFields
     * @return Kajian
     */
    public function fakeKajian($kajianFields = [])
    {
        return new Kajian($this->fakeKajianData($kajianFields));
    }

    /**
     * Get fake data of Kajian
     *
     * @param array $postFields
     * @return array
     */
    public function fakeKajianData($kajianFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'id_mosque' => $fake->randomDigitNotNull,
            'pemateri' => $fake->word,
            'tema' => $fake->word,
            'waktu' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $kajianFields);
    }
}
