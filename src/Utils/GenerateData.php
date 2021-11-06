<?php


namespace TpWeb\Utils;


use Faker\Factory;
use TpWeb\Modeles\Personne;

class GenerateData {
    static function generateAgendaDataWithId(int $num): Personne {
        $faker = Factory::create('fr_FR');
        $data = [];
        return new Personne($num, $faker->name(),  $faker->mobileNumber(),  $faker->boolean());
    }

    static function generateAgendaData(int $nb = 10): array {
        $faker = Factory::create('fr_FR');
        $data = [];
        for ($i = 1; $i <= $nb; $i++) {
            $data[$i] = new Personne($i,  $faker->name(),  $faker->mobileNumber(),  $faker->boolean());
    }
        return $data;
    }

    static function writeFileAgendaData(string $filename, int $nb = 10): void {
        $filehandler = fopen($filename, 'w');
        if (!$filehandler) {
            throw new \Exception(sprintf("Erreur d'accès au fichier %s", $filename));
        }
        $data = GenerateData::generateAgendaData($nb);
        fwrite($filehandler, json_encode($data, true));
        fclose($filehandler);
    }

    static function writeFileWithAgendaData(string $filename, array $data): void {
        $filehandler = fopen($filename, 'w');
        if (!$filehandler) {
            throw new \Exception(sprintf("Erreur d'accès au fichier %s", $filename));
        }
        fwrite($filehandler, json_encode($data, true));
        fclose($filehandler);
    }

    static function readFileAgendaData(string $filename): array {
        $data = [];
        // Read the JSON file
        try {
            $json = file_get_contents($filename);
        } catch (\Exception $e) {}

        if (!$json) {
            throw new \Exception(sprintf("Erreur de lecture du fichier %s", $filename));
        }
        // Decode the JSON file
        $json_data = json_decode($json, true);
        foreach ($json_data as $datum) {
            $data[$datum['id']] = new Personne($datum['id'], $datum['nom'], $datum['telephone'], $datum['actif']);
        }
        return $data;
    }
}