<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StructureFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $types = ['mairie', 'hopital', 'tribunal', 'ministere', 'organisme'];
        $villes = ['Yaoundé', 'Douala', 'Garoua', 'Bafoussam', 'Bertoua', 'Maroua', 'Ebolowa', 'Ngaoundéré', 'Buea', 'Bamenda'];

        $type = $this->faker->randomElement($types);
        $ville = $this->faker->randomElement($villes);

        // Fonctions typiques par type
        $fonctions = [
            'mairie' => 'Maire',
            'hopital' => 'Directeur',
            'tribunal' => 'Président du Tribunal',
            'ministere' => 'Ministre',
            'organisme' => 'Directeur Général'
        ];

        return [
            'nom' => $this->generateStructureName($type, $ville),
            'type' => $type,
            'code' => strtoupper($this->faker->lexify(strtoupper(substr($ville, 0, 3)) . '-' . $this->faker->bothify('##'))),
            'responsable_nom' => $this->faker->name(),
            'responsable_fonction' => $fonctions[$type],
            'adresse' => $this->faker->streetAddress(),
            'ville' => $ville,
            'code_postal' => '237',
            'telephone' => '+237 ' . $this->faker->numberBetween(650000000, 699999999),
            'email' => $this->faker->unique()->safeEmail(),
            'actif' => $this->faker->boolean(90), // 90% actifs
        ];
    }

    private function generateStructureName(string $type, string $ville): string
    {
        return match ($type) {
            'mairie' => "Mairie de $ville",
            'hopital' => "Hôpital Régional de $ville",
            'tribunal' => "Tribunal de Première Instance de $ville",
            'ministere' => "Ministère de " . $this->faker->word(),
            'organisme' => "Office National de " . $this->faker->word(),
            default => "Structure de $ville",
        };
    }
}
