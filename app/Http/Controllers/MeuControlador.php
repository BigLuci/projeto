<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeuControlador extends Controller
{
    public function produtos() {
        echo "<h1>Produtos</h1>";
        echo "<ol>";
        echo "<li>Notebook</li>";
        echo "<li>Impressora</li>";
        echo "<li>Mouse</li>";
        echo "</ol>";
    }

    public function getNome() {
        return "Junio Lima";
    }
    public function getIdade() {
        return "19 anos";
    }
    public function multiplicar($n1, $n2) {
        return $n1 * $n2;

    }
}
