<?php

namespace App\Http\Controllers\MaterialBibliografico;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\CategoriaMaterial\CategoriaMaterial;
use App\Models\EstadoMaterial\EstadoMaterial;
use App\Models\Material\TipoMaterial;
use App\Models\MaterialBibliografico\MaterialBibliografico;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;



class MaterialBibliograficoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materiales = MaterialBibliografico::paginate(10); // Obtener todos los tipos de materiales
        return view('material_bibliografico.index_material_bibliocragico', compact('materiales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipos = TipoMaterial::pluck('descripcion', 'id')->toArray();
        $estado = EstadoMaterial::pluck('descripcion', 'id')->toArray();
        $categoria = CategoriaMaterial::pluck('descripcion', 'id')->toArray();
        return view('material_bibliografico.create_material_bibliografico', compact('tipos','estado','categoria'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validación
         $validated = $request->validate([
            'codigo' => 'required|string|max:50|unique:material_bibliograficos,codigo',
            'titulo' => 'required|string|max:255',
            'editorial' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'fecha' => 'required|date|before_or_equal:today',
            'estado' => 'required|exists:estado_materials,id',
            'tipos' => 'required|exists:tipo_materials,id',
            'categoria' => 'required|exists:categoria_materials,id',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Si pasa la validación, creamos el nuevo material
        $material = new MaterialBibliografico();
        $material->codigo = $request->codigo;
        $material->titulo = $request->titulo;
        $material->editorial = $request->editorial;
        $material->autor = $request->autor;
        $material->fecha_publicacion = $request->fecha;

        // Guardar la imagen si fue subida
        if ($request->hasFile('imagen')) {
            // Obtener la imagen original
            $image = $request->file('imagen');

            // Obtener el nombre del archivo con su extensión
            $extension = $image->getClientOriginalExtension();

            // Crear un nombre único basado en el título y la extensión de la imagen
            $imageName = Str::slug($request->titulo) . '.' . $extension;

            // Subir la imagen renombrada
            $path = $image->storeAs('images', $imageName, 'public');

            // Guardar la ruta de la imagen en la base de datos
            $material->imagen = $path;
        }

        // Asignar las relaciones
        $material->estado_id = $request->estado;
        $material->tipo_id = $request->tipos;
        $material->categoria_id = $request->categoria;

        // Guardar el material en la base de datos
        $material->save();
        // Redirigir con mensaje de éxito
        return redirect()->route('material.bibliografico.index')
            ->with('success', 'Material bibliográfico creado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         // Buscar el material bibliográfico por su ID
    $material = MaterialBibliografico::findOrFail($id);

    // Pasar el material a la vista
    return view('material_bibliografico.show_material_bibliocragico', compact('material'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tipos = TipoMaterial::pluck('descripcion', 'id')->toArray();
        $estado = EstadoMaterial::pluck('descripcion', 'id')->toArray();
        $categoria = CategoriaMaterial::pluck('descripcion', 'id')->toArray();
        $material = MaterialBibliografico::findOrFail($id);
        return view('material_bibliografico.edit_material_bibliocragico', compact('material','tipos','categoria','estado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       // Validación de los campos
    $validated = $request->validate([
        'codigo' => 'required|string|max:50|unique:material_bibliograficos,codigo,' . $id,
        'titulo' => 'required|string|max:255',
        'editorial' => 'required|string|max:255',
        'autor' => 'required|string|max:255',
        'fecha' => 'required|date|before_or_equal:today',
        'estado' => 'required|exists:estado_materials,id',
        'tipos' => 'required|exists:tipo_materials,id',
        'categoria' => 'required|exists:categoria_materials,id',
        'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Buscar el material bibliográfico a actualizar
    $material = MaterialBibliografico::findOrFail($id);

    // Actualizar los campos principales
    $material->update([
        'codigo' => $request->codigo,
        'titulo' => $request->titulo,
        'editorial' => $request->editorial,
        'autor' => $request->autor,
        'fecha_publicacion' => $request->fecha,
        'estado_id' => $request->estado,
        'tipo_id' => $request->tipos,
        'categoria_id' => $request->categoria,
    ]);

    // Verificar si el título ha cambiado
    if ($material->titulo !== $request->titulo) {
        // Si el título ha cambiado, renombramos la imagen
        if ($material->imagen) {
            // Eliminar la imagen antigua si existe
            Storage::disk('public')->delete($material->imagen);
        }

        // Renombrar la imagen según el nuevo título
        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->storeAs(
                'images/materiales',
                Str::slug($request->titulo) . '.' . $request->imagen->extension(),
                'public'
            );
            $material->update(['imagen' => $imagenPath]);
        }
    } elseif ($request->hasFile('imagen')) {
        // Si el título no cambió, pero se sube una nueva imagen, reemplazamos la antigua
        if ($material->imagen) {
            // Eliminar la imagen antigua
            Storage::disk('public')->delete($material->imagen);
        }

        // Subir la nueva imagen con el nombre basado en el título actual
        $imagenPath = $request->file('imagen')->storeAs(
            'images/materiales',
            Str::slug($material->titulo) . '.' . $request->imagen->extension(),
            'public'
        );
        $material->update(['imagen' => $imagenPath]);
    }

    // Redirigir a la lista de materiales con un mensaje de éxito
    return redirect()->route('indexMaterialBibliografico')->with('success', 'Material actualizado correctamente');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $material = MaterialBibliografico::findOrFail($id);
        $material->delete();
        return redirect()->route('indexMaterialBibliografico')->with('success', 'Material Bibliografico Elimininado correctamente.');
    }
}
