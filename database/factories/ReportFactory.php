<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'uuid' => $this->faker->lexify('re-????-????'),
            'nama' => $this->faker->name(),
            'umur' => $this->faker->numberBetween(12,30),
            'no_hp' => $this->faker->phoneNumber(),
            'alamat' => $this->faker->sentence(mt_rand(3,5)),
            'nama_ortu' => $this->faker->name(),
            'kronologis' => $this->faker->paragraph(mt_rand(10,24)),
            'jenis_laporan' => $this->faker->randomElement(['anak', 'perempuan'])
        ];
    }
}
