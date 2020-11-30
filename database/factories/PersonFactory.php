<?php

namespace Database\Factories;

use App\Enums\Gender;
use App\Enums\Title;
use App\Models\Person;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Person::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = Title::getRandomValue();
        $gender = $title == 'Mr' ? 'Male' : 'Female';

        // Generate random date from 01-01-1970 to now
        $dateOfBirth = Carbon::parse(mt_rand(0, now()->timestamp));
        $isDead = rand(0, 10) > 9; // A death probabily of 1/9
        $dateOfDeath = $isDead ? Carbon::parse(mt_rand($dateOfBirth->timestamp, now()->timestamp)) : null;

        return [
            'title' => $title,
            'first_name' => $this->faker->firstName($gender),
            'middle_name' => $this->faker->firstName('male'),
            'last_name' => $this->faker->lastName($gender),
            'gender' => Gender::fromKey($gender)->value,
            'date_of_birth' => $dateOfBirth,
            'date_of_death' => $dateOfDeath,
        ];
    }
}
