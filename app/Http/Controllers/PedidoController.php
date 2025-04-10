<?php
namespace App\Http\Controllers;

use App\Models\Mesa;
use App\Models\Platillo;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    // Seleccionar una mesa para un pedido
    public function seleccionarMesa(Request $request)
    {
        $mesas = Mesa::where('disponibilidad','1')->get();
        return view('mesas', compact('mesas'));

    }

    public function seleccionarPlatillos(Request $request, $id_mesa)
    {
        $platillos = Platillo::where('disponibilidad', true)->get();
        return view('platillos', compact('platillos'));
    }

    // Crear el pedido con los platillos seleccionados
    public function crearPedido(Request $request, $id_mesa)
    {
        $mesa = Mesa::findOrFail($id_mesa);

        // Crear el pedido inicial
        $pedido = Pedido::create([
            'id_mesa' => $mesa->id,
            'precio_total' => 0,
        ]);

        // Agregar platillos al pedido
        foreach ($request->platillos as $platilloData) {
            $platillo = Platillo::find($platilloData['id_platillo']);
            $precio = $platillo->precio;
            $cantidad = $platilloData['cantidad'];

            // Agregar platillo con cantidad y precio
            $pedido->platillos()->attach($platillo, [
                'cantidad' => $cantidad,
                'precio' => $precio,
            ]);
        }

        // Recalcular el precio total del pedido
        $pedido->recalculateTotal();

        // Redirigir al detalle del pedido
        return redirect()->route('pedido.detalles', $pedido->id);
    }

    // Mostrar los detalles del pedido
    public function detallesPedido($pedido_id)
    {
        $pedido = Pedido::with('platillos')->findOrFail($pedido_id);
        return view('detalles_pedido', compact('pedido')); // Vista para ver el pedido
    }

    // Actualizar cantidad de platillo en un pedido
    public function actualizarCantidad(Request $request, $pedido_id, $platillo_id)
    {
        $pedido = Pedido::findOrFail($pedido_id);
        $pedido->platillos()->updateExistingPivot($platillo_id, ['cantidad' => $request->cantidad]);

        // Recalcular el precio total
        $pedido->recalculateTotal();

        return redirect()->route('pedido.detalles', $pedido_id);
    }

    // Eliminar un platillo del pedido
    public function eliminarPlatillo($pedido_id, $platillo_id)
    {
        $pedido = Pedido::findOrFail($pedido_id);
        $pedido->platillos()->detach($platillo_id);

        // Recalcular el precio total
        $pedido->recalculateTotal();

        return redirect()->route('pedido.detalles', $pedido_id);
    }
}
