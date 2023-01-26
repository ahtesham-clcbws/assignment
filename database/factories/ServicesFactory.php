<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Services>
 */
class ServicesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        $serviceNames = array("Corporate Development", "Ecommerce Development", "Portfolio Development", "Portfolio Development", "Portals Development");
        $randomServiceNames = array_rand($serviceNames, 3);
        return [
            'name' => $serviceNames[$randomServiceNames[0]],
            'description' => $this->faker->text,
            'price' => 500,
            'image' => '/service_image/demo_image.jpg',
            'location' => 'Delhi',
        ];
    }
}
