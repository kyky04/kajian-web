<?php

use Faker\Factory as Faker;
use App\Models\Jadwal;
use App\Repositories\JadwalRepository;

trait MakeJadwalTrait
{
    /**
     * Create fake instance of Jadwal and save it in database
     *
     * @param array $jadwalFields
     * @return Jadwal
     */
    public function makeJadwal($jadwalFields = [])
    {
        /** @var JadwalRepository $jadwalRepo */
        $jadwalRepo = App::make(JadwalRepository::class);
        $theme = $this->fakeJadwalData($jadwalFields);
        return $jadwalRepo->create($theme);
    }

    /**
     * Get fake instance of Jadwal
     *
     * @param array $jadwalFields
     * @return Jadwal
     */
    public function fakeJadwal($jadwalFields = [])
    {
        return new Jadwal($this->fakeJadwalData($jadwalFields));
    }

    /**
     * Get fake data of Jadwal
     *
     * @param array $postFields
     * @return array
     */
    public function fakeJadwalData($jadwalFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'jadwal' => $fake->word,
            'tempat' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $jadwalFields);
    }
}
