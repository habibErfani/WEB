<?php


namespace TpWeb\Modeles;


use JsonSerializable;

class Personne implements JsonSerializable {
    private int $id;
    private string $nom;
    private string $telephone;
    private bool $actif;

    /**
     * @param int $id
     * @param string $nom
     * @param string $telephone
     * @param bool $actif
     */
    public function __construct(int $id = 0, string $nom = "", string $telephone = "", bool $actif = false) {
        $this->nom = $nom;
        $this->telephone = $telephone;
        $this->actif = $actif;
        $this->id = $id;
    }


    /**
     * @return string
     */
    public function getNom(): string {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getTelephone(): string {
        return $this->telephone;
    }

    /**
     * @param string $telephone
     */
    public function setTelephone(string $telephone): void {
        $this->telephone = $telephone;
    }

    /**
     * @return bool
     */
    public function isActif(): bool {
        return $this->actif;
    }

    /**
     * @param bool $actif
     */
    public function setActif(bool $actif): void {
        $this->actif = $actif;
    }

    /**
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void {
        $this->id = $id;
    }

    public function __toString(): string {
        return sprintf("id: %d - %s %s %s", $this->id, $this->nom, $this->telephone, ($this->actif ? "Ok" : "Ko"));
    }

    public function jsonSerialize(): array {
        return [
            'id' => $this->id,
            'nom' => $this->nom,
            'telephone' => $this->telephone,
            'actif' => $this->actif
        ];
    }
}