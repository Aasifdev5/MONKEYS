<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Event;
use App\Models\User;
use App\Tools\Repositories\Crud;
use App\Traits\General;
use App\Traits\ImageSaveTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class EventsController extends Controller
{
    use ImageSaveTrait, General;

    protected $model;

    public function __construct(Event $event)
    {
        $this->model = new Crud($event);
    }

    public function index()
    {
        if (Session::has('LoggedIn')) {
            $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();
            $data['title'] = 'Gestionar Eventos';
            $data['events'] = Event::all();
            return view('admin.events.index', $data);
        }
    }

    public function create()
    {
        if (Session::has('LoggedIn')) {
            $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();
            $data['categories'] = Category::all();
            $data['title'] = 'Añadir Evento';
            return view('admin.events.create', $data);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'time' => 'required',
            'link' => 'required|url',

        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'time' => $request->time,
            'link' => $request->link,
            'slug' => Str::slug($request->title),
        ];



        try {
            $this->model->create($data);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            Log::error('Error al crear el Evento: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Error al crear el Evento.'], 500);
        }
    }

    public function edit($uuid)
    {
        if (Session::has('LoggedIn')) {
            $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();
            $data['title'] = 'Editar Evento';

            $data['event'] = $this->model->getRecordByUuid($uuid);
            return view('admin.events.edit', $data);
        }
    }

    public function update(Request $request, $uuid)
    {
        Log::info('Updating event with UUID: ' . $uuid);

        $event = Event::where('uuid', $uuid)->first();

        if (!$event) {
            return response()->json(['success' => false, 'message' => 'Evento no encontrado.'], 404);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'time' => 'required',
            'link' => 'required|url',

        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'time' => $request->time,
            'link' => $request->link,
            'slug' => Str::slug($request->title),
        ];


        $event->update($data);

        return response()->json(['success' => true]);
    }

    public function delete($uuid)
    {
        $event = Event::where('uuid', $uuid)->first();

        if (!$event) {
            return response()->json(['success' => false, 'message' => 'Evento no encontrado.'], 404);
        }

        $this->deleteFile($event->image);
        $event->delete();

        return response()->json(['success' => true]);
    }

    public function bulkDelete(Request $request)
    {
        try {
            $request->validate([
                'ids' => 'required|array',
                'ids.*' => 'exists:events,uuid'
            ]);

            $events = Event::whereIn('uuid', $request->ids)->get();
            foreach ($events as $event) {
                $this->deleteFile($event->image);
            }
            Event::whereIn('uuid', $request->ids)->delete();

            return response()->json([
                'success' => true,
                'message' => 'Eventos eliminados con éxito.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar los eventos seleccionados.'
            ], 500);
        }
    }
}
