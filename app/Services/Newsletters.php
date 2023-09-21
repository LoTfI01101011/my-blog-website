<?php

namespace App\Services;

interface Newsletters {
    public function Subscribe(string $email, string $list = null);
}