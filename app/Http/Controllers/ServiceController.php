<?php

namespace App\Http\Controllers;

use App\Http\Services\DataServices;
use App\Models\CategoryModel;
use App\Models\ServiceModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Servicio de datos para interactuar con el modelo ServiceModel.
     *
     * @var DataServices
     */
    protected $dataServices;

    /**
     * Crea una nueva instancia del controlador.
     *
     * Inicializa el servicio de datos con el modelo ServiceModel.
     *
     * @return void
     */
    public function __construct()
    {
        $this->dataServices = new DataServices(new ServiceModel());
    }

    /**
     * Muestra una lista de servicios.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $services = Auth::user()->services()->with('category')->get();
        return view('servicess.index', compact('services'));
    }

    public function create(){
        $categories = Auth::user()->categories;
        return view('servicess.create', compact('categories'));
    }

    /**
     * Almacena un nuevo servicio en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $serviceImg = $request->file('image');
        $serviceImage = "img_".Str::uuid().".".$serviceImg->guessExtension();
        $serviceImagePath = $serviceImg->storeAs('uploads/serviceImage', $serviceImage, 'public');

        $service = ServiceModel::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $serviceImagePath,
            'category_id' => $request->category_id,
            'user_id' => Auth::id()
        ]);
        return redirect()->route('services.index');
    }

    /**
     * Muestra los detalles de un servicio específico.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $service = Auth::user()->services()->with('category')->findOrFail($id);
        return view('servicess.show', compact('service'));
    }

    public function edit($id){
        $service = Auth::user()->services()->findOrFail($id);
        $categories = Auth::user()->categories;
        return view('servicess.edit', compact('service','categories'));
    }
    /**
     * Actualiza los datos de un servicio en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Encontrar el producto por su ID
        $service = Auth::user()->services()->findOrFail($id);

        // Manejar la actualización de la imagen
        if ($request->hasFile('image')) {
            // Eliminar la imagen anterior si existe
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }

            // Almacenar la nueva imagen
            $serviceImg = $request->file('image');
            $serviceImage = "img_" . Str::uuid() . "." . $serviceImg->guessExtension();
            $serviceImagePath = $serviceImg->storeAs('uploads/serviceImage', $serviceImage, 'public');

        }

        $serviceEdited = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $serviceImagePath,
            'category_id' => $request->category_id,
            'user_id' => Auth::id()
        ];
        
        $service->update($serviceEdited);
        if (!$service) {
            abort(404, 'Service not found');
        }
        return redirect()->route('services.index');
    }

    /**
     * Elimina un servicio de la base de datos.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $service = Auth::user()->services()->findOrFail($id);
        $service->delete();
        // Eliminar la imagen asociada si existe
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }
        if (!$service) {
            abort(404, 'Service not found');
        }
        return redirect()->route('services.index');
    }
}
