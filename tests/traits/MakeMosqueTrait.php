<?php

use Faker\Factory as Faker;
use App\Models\Mosque;
use App\Repositories\MosqueRepository;

trait MakeMosqueTrait
{
    /**
     * Create fake instance of Mosque and save it in database
     *
     * @param array $mosqueFields
     * @return Mosque
     */
    public function makeMosque($mosqueFields = [])
    {
        /** @var MosqueRepository $mosqueRepo */
        $mosqueRepo = App::make(MosqueRepository::class);
        $theme = $this->fakeMosqueData($mosqueFields);
        return $mosqueRepo->create($theme);
    }

    /**
     * Get fake instance of Mosque
     *
     * @param array $mosqueFields
     * @return Mosque
     */
    public function fakeMosque($mosqueFields = [])
    {
        return new Mosque($this->fakeMosqueData($mosqueFields));
    }

    /**
     * Get fake data of Mosque
     *
     * @param array $postFields
     * @return array
     */
    public function fakeMosqueData($mosqueFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama' => $fake->word,
            'alamat' => $fake->text,
            'latitude' => $fake->word,
            'longitude' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $mosqueFields);
    }
}
