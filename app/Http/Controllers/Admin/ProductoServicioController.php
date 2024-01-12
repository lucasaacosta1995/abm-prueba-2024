<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CondicionIva;
use App\Models\ProductoServicio;
use App\Models\Rubro;
use App\Models\UnidadMedida;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class ProductoServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productServices = ProductoServicio::with(['rubro', 'unidadMedida', 'condicionIva'])->paginate(5);

        return view('admin.producto_servicio.index', ['productServices' => $productServices]);
    }

    /**
     *
     */
    public function create()
    {
        $rubros = Rubro::all();
        $tipos = [
            'P' => 'Producto',
            'S' => 'Servicio',
        ];
        $unidadesMedidas = UnidadMedida::all();
        $condicionesIva = CondicionIva::all();

        return view('admin.producto_servicio.create',
            [
                'rubros' => $rubros,
                'tipos' => $tipos,
                'unidadesMedidas' => $unidadesMedidas,
                'condicionesIva' => $condicionesIva
            ]);

    }

    /**
     *
     */
    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'id_rubro' => 'required',
            'tipo' => 'required|size:1|in:P,S',
            'id_unidad_medida' => 'numeric',
            'codigo' => 'required|max:20|unique:producto_servicio',
            'producto_servicio' => 'required|max:255',
            'id_condicion_iva' => 'numeric',
            'precio_bruto_unitario' => 'numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->route('productos-servicios.create')->withErrors($validator)->withInput();
        }

        try {
            ProductoServicio::create($request->all());
            return redirect()->route('productos-servicios.index')->with('success', 'Producto / servicio creado exitosamente.');

        } catch (\Exception $e) {
            //aqui deberiamos enviar un mensaje del error manejado
            return redirect()->route('productos-servicios.create')->with('error', "Ocurrio un error al guardar el registro");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\ProductoServicio $productoServicio
     * @return \Illuminate\Http\Response
     */
    public function show(ProductoServicio $productoServicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\ProductoServicio $productoServicio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productoServicio = ProductoServicio::findOrFail($id);
        $rubros = Rubro::all();
        $tipos = [
            'P' => 'Producto',
            'S' => 'Servicio',
        ];
        $unidadesMedidas = UnidadMedida::all();
        $condicionesIva = CondicionIva::all();

        return view('admin.producto_servicio.edit', [
            'rubros' => $rubros,
            'tipos' => $tipos,
            'unidadesMedidas' => $unidadesMedidas,
            'condicionesIva' => $condicionesIva,
            'productoServicio' => $productoServicio
        ]);
    }

    /**
     *
     */
    public function update(Request $request, $id)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'id_rubro' => 'required',
            'tipo' => 'required|size:1|in:P,S',
            'id_unidad_medida' => 'numeric',
            'codigo' => ['required', Rule::unique('producto_servicio')->ignore($id), 'max:20'],
            'producto_servicio' => 'required|max:255',
            'id_condicion_iva' => 'numeric',
            'precio_bruto_unitario' => 'numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->route('productos-servicios.edit', $id)->withErrors($validator)->withInput();
        }

        try {
            $productoServicio = ProductoServicio::findOrFail($id);
            $productoServicio->update($request->all());
            return redirect()->route('productos-servicios.index')->with('success', 'Producto / servicio modificado exitosamente.');

        } catch (\Exception $e) {
            return redirect()->route('productos-servicios.index')->with('error', $e->getMessage());
        }
    }

    /**
     *
     */
    public function destroy(int $id)
    {
        $productoServicio = ProductoServicio::findOrFail($id);

        $productoServicio->delete();

        return redirect()->route('productos-servicios.index')->with('success', 'Producto o servicio eliminado correctamente.');
    }
}
