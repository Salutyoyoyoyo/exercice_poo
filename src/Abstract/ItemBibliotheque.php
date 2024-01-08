<?php

namespace App\Abstract;

abstract class ItemBibliotheque {
    protected int $id;

    public function __construct(int $id) {
        $this->id = $id;
    }

    abstract public function getDetails(): string;

    public function getId(): int {
        return $this->id;
    }
}
