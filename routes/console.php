<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment('Seu amor é a inspiração.');
})->purpose('Mostra uma mensagem inspiradora.');
