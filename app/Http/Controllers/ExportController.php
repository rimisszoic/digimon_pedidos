<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Symfony\Component\Yaml\Yaml;

class ExportController extends Controller
{
    public function exportarUsuarios(Request $request)
    {
        $formato = $request->input('formato', 'json');
        $usuarios = User::with('role')->get();

        return $this->exportar($usuarios, $formato, 'usuarios');
    }

    public function exportarPedidos(Request $request)
    {
        $formato = $request->input('formato', 'json');
        $min = $request->input('min_total', 0);
        $max = $request->input('max_total', 999999);

        $pedidos = Pedido::with('lineas', 'cliente')
            ->whereBetween('total', [$min, $max])
            ->get();

        return $this->exportar($pedidos, $formato, 'pedidos');
    }

    private function exportar($datos, $formato, $nombre)
    {
        switch ($formato) {
            case 'json':
                return response()->json($datos);
            case 'xml':
                $xml = new \SimpleXMLElement('<?xml version="1.0"?><' . $nombre . '/>');
                foreach ($datos as $item) {
                    $child = $xml->addChild('item');
                    foreach ($item->toArray() as $key => $value) {
                        $child->addChild($key, htmlspecialchars((string)$value));
                    }
                }
                return response($xml->asXML(), 200)->header('Content-Type', 'application/xml');
            case 'yaml':
                return response(Yaml::dump($datos->toArray(), 2, 4, Yaml::DUMP_MULTI_LINE_LITERAL_BLOCK), 200)
                    ->header('Content-Type', 'text/yaml');
            default:
                return response()->json($datos);
        }
    }
}
?>