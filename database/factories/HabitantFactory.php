<?php

namespace Database\Factories;

use App\Models\Ville;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Habitant>
 */
class HabitantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $firstTwoLetters = fake()->randomLetter();
        $numiricPart = fake()->randomNumber(6);
        $existingVilleIds = Ville::pluck('id')->toArray();
        return [
            'cin'=>$firstTwoLetters.$numiricPart,
            'nom' =>fake()->firstName(),
            'prenom' =>fake()->lastName(),
            'ville_id' => fake()->randomElement($existingVilleIds),
            'image' => fake()->imageUrl()
            
            
        ];
    }
}
