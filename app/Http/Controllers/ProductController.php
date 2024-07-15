<?php

namespace App\Http\Controllers;
use App\Http\Services\DataServices;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Servicio de datos para interactuar con el modelo Produc.
     *
     * @var DataServices
     */
    protected $dataServices;

    /**
     * Crea una nueva instancia del controlador.
     *
     * Inicializa el servicio de datos con el modelo Produc.
     *
     * @return void
     */
    public function __construct()
    {
        $this->dataServices = new DataServices(new ProductModel());
    }

    /**
     * Muestra una lista de producs.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $products = Auth::user()->products()->with('category')->get();
        return view('products.index', compact('products'));
    }

    public function create(){
        $categories = Auth::user()->categories;
        return view('products.create', compact('categories'));
    }
    /**
     * Almacena un nuevo produc en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $productImg = $request->file('image');
        $productImage = "img_".Str::uuid().".".$productImg->guessExtension();
        $productImagePath = $productImg->storeAs('uploads/productImage', $productImage, 'public');

        $product = ProductModel::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $productImagePath,
            'category_id' => $request->category_id,
            'user_id' => Auth::id()
        ]);
        return redirect()->route('products.index');
    }

    /**
     * Muestra los detalles de un produc específico.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $product = Auth::user()->products()->with('category')->findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit($id){
        $product = Auth::user()->products()->findOrFail($id);
        $categories = Auth::user()->categories;
        return view('products.edit', compact('product','categories'));
    }
    /**
     * Actualiza los datos de un produc en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {

        // Encontrar el producto por su ID
        $product = Auth::user()->products()->findOrFail($id);

        // Manejar la actualización de la imagen
        if ($request->hasFile('image')) {
            // Eliminar la imagen anterior si existe
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            // Almacenar la nueva imagen
            $productImg = $request->file('image');
            $productImage = "img_" . Str::uuid() . "." . $productImg->guessExtension();
            $productImagePath = $productImg->storeAs('uploads/productImage', $productImage, 'public');
        }

        $productEdited = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $productImagePath,
            'category_id' => $request->category_id,
            'user_id' => Auth::id()
        ];
        $product->update($productEdited);
        if (!$product) {
            abort(404, 'products not found');
        }
        return redirect()->route('products.index');
    }

    /**
     * Elimina un produc de la base de datos.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $product = Auth::user()->products()->findOrFail($id);
        $product->delete();
        // Eliminar la imagen asociada si existe
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        if (!$product) {
            abort(404, 'Product not found');
        }
        return redirect()->route('products.index');
    }
}
