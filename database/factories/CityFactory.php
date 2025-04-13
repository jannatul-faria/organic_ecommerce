<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\City>
 */
class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=> fake()->city(),
            'state_id'=> State::factory(),
            'country_id'=> null,
            'status'=> fake()->boolean(),
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function(City $city){
            if(!$city->country_id && $city->state){
                $city->country_id = $city->state->country_id;
            }
        })->afterCreating(function(City $city){
            if(!$city->country_id && $city->state){
                $city->country_id = $city->state->country_id;
                $city->save();
            }
        });
    }
}
