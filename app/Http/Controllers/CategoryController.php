<?php

namespace App\Http\Controllers;

use App\Http\Services\DataServices;
use App\Models\User;
use App\Models\CategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Servicio de datos para interactuar con el modelo Category.
     *
     * @var DataServices
     */
    protected $dataServices;

    /**
     * Crea una nueva instancia del controlador.
     *
     * Inicializa el servicio de datos con el modelo Category.
     *
     * @return void
     */
    public function __construct()
    {
        $this->dataServices = new DataServices(new CategoryModel());
    }

    /**
     * Muestra una lista de categorías.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $categories = Auth::user()->categories;
        return view('categories.index', compact('categories'));
    }

    public function create(){
        return view('categories.create');
    }
    /**
     * Almacena una nueva categoría en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $category = CategoryModel::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('categories.index');
    }

    /**
     * Muestra los detalles de una categoría específica.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $category = Auth::user()->categories()->findOrFail($id);
        return view('categories.show', compact('category'));
    }

    /**
     * Muestra el formulario para editar una categoría específica.
     *
     * @param  \App\Models\CategoryModel  $category
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $category = Auth::user()->categories()->findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    /**
     * Actualiza los datos de una categoría en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $category = Auth::user()->categories()->findOrFail($id);
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => Auth::id()
        ]);
        if (!$category) {
            abort(404, 'Category not found');
        }
        return redirect()->route('categories.index');
    }

    /**
     * Elimina una categoría de la base de datos.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $category = Auth::user()->categories()->findOrFail($id);
        $category->delete();
        if (!$category) {
            abort(404, 'Category not found');
        }
        return redirect()->route('categories.index');
    }
}
