<?php


namespace TpWeb\Modeles;


use TpWeb\Utils\GenerateData;

class BDMapper implements IBDMapper {
    private array $data;
    private const  DEFAULT_FILENAME = __DIR__ . "../.." . "/donnees.txt";
    private string $filename;

    /**
     * @throws \Exception
     */
    public function __construct(string $filename = self::DEFAULT_FILENAME) {
        $this->filename = $filename;
        try {
            $this->data = GenerateData::readFileAgendaData($this->filename);
        } catch (\Exception $e) {
            try {
                GenerateData::writeFileAgendaData($this->filename, 50);
            } catch (\Exception $e1) {
                throw new \Exception(sprintf("Erreur d'accès au fichier %s", $this->filename));
            }
            $this->data = GenerateData::readFileAgendaData($this->filename);
        }
    }

    function all(): array {
        return $this->data;
    }

    function findById(int $id) {
        foreach ($this->data as $datum) {
            if ($datum->getId() === $id)
                return $datum;
        }
return false;
}

/**
 * @throws \Exception
 */
function insert(Personne $personne): Personne {
    if ($personne->getId() == 0) {
        $personne->setId($this->getNextId());
    }
    $p = $this->findById($personne->getId());
    if (!$p) {
        $this->data[$personne->getId()] = $personne;
        GenerateData::writeFileWithAgendaData($this->filename, $this->data);
        return $personne;
    }
    return false;
}

    /**
     * @throws \Exception
     */
    function update(Personne $personne): Personne {
    $p = $this->findById($personne->getId());
    if ($p) {
        $this->data[$personne->getId()] = $personne;
        GenerateData::writeFileWithAgendaData($this->filename, $this->data);
        return $personne;
    }
    return false;
}

    /**
     * @throws \Exception
     */
    function delete(int $id): bool {
        $p = $this->findById($id);
        if ($p) {
            unset($this->data[$id]);
            GenerateData::writeFileWithAgendaData($this->filename, $this->data);
            return true;
        }
        return false;
    }

    static function sortById(Personne $a, Personne $b): int {
        return $a->getId() - $b->getId();
    }

    private function getNextId(): int {
    usort($this->data, [BDMapper::class, 'sortById']);
    $personne = end($this->data);
    return $personne->getId() + 1;
}
}