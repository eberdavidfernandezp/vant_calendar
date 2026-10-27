<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calendar;
use App\Models\DateModel;
use App\Models\SocialMedia;
use App\Models\Feed;
use App\Models\MediaResource;
use App\Models\CopyRecord;
use App\Models\Cta;
use App\Models\ContentType;
use App\Models\Mockup;

class CalendarController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $status = $request->input('status'); // Filtro por estado
        $sort = $request->input('sort', 'asc'); // 'asc' por defecto (próximos), 'desc' para recientes

        // Filtrar exclusivamente por el usuario autenticado
        $query = Calendar::where('user_id', auth()->id())->with([
            'date', 
            'contentType', 
            'socialMedia', 
            'feed', 
            'mediaResource', 
            'copyRecord', 
            'cta', 
            'mockup'
        ]);

        // Filtro de búsqueda por texto (Copy, CTA o Feed)
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->whereHas('copyRecord', function($subq) use ($search) {
                    $subq->where('copy', 'like', "%{$search}%");
                })->orWhereHas('cta', function($subq) use ($search) {
                    $subq->where('cta_txt', 'like', "%{$search}%");
                })->orWhereHas('feed', function($subq) use ($search) {
                    $subq->where('feed_txt', 'like', "%{$search}%");
                });
            });
        }

        // Filtro por estado directo en la tabla calendar
        if ($status) {
            $query->where('status', $status);
        }

        // Ordenamiento limpio utilizando join seguro con alias para evitar conflictos
        $query->join('date as d', 'calendar.id_date', '=', 'd.id_date')
              ->select('calendar.*')
              ->orderBy('d.year', $sort)
              ->orderBy('d.month', $sort)
              ->orderBy('d.day', $sort)
              ->orderBy('d.hour', $sort);

        $records = $query->get();

        return view('calendar.index', compact('records', 'search', 'status', 'sort'));
    }

    public function create()
    {
        return view('calendar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required',
            'red_social' => 'required',
            'tipo_contenido' => 'required',
            'recurso' => 'required',
            'feed' => 'required',
            'cta' => 'required',
            'copy' => 'required',
            'mockup' => 'nullable|file|mimes:mov,mp4,jpeg,jpg,png|max:51200',
        ]);

        $dateParts = explode('-', $request->fecha);
        $dateModel = new DateModel();
        $dateModel->year = $dateParts[0] ?? date('Y');
        $dateModel->month = $dateParts[1] ?? date('m');
        $dateModel->day = $dateParts[2] ?? date('d');
        $dateModel->hour = $request->hora ?? '00:00:00';
        $dateModel->save();

        $copyModel = new CopyRecord();
        $copyModel->copy = $request->copy ?? '';
        $copyModel->save();

        $ctaModel = new Cta();
        $ctaModel->cta_txt = $request->cta ?? '';
        $ctaModel->save();

        $feedModel = new Feed();
        $feedModel->feed_txt = $request->feed ?? '';
        $feedModel->save();

        $socialModel = new SocialMedia();
        $socialModel->instagram = ($request->red_social == 'Instagram') ? 'Instagram' : '';
        $socialModel->tiktok = ($request->red_social == 'TikTok') ? 'TikTok' : '';
        $socialModel->x = ($request->red_social == 'X') ? 'X' : '';
        $socialModel->linkedin = ($request->red_social == 'LinkedIn') ? 'LinkedIn' : '';
        $socialModel->facebook = ($request->red_social == 'Facebook') ? 'Facebook' : '';
        $socialModel->save();

        $mediaModel = new MediaResource();
        $mediaModel->reel = ($request->recurso == 'Reel') ? 1 : 0;
        $mediaModel->carrusel = ($request->recurso == 'Carrusel') ? 1 : 0;
        $mediaModel->static_post = ($request->recurso == 'Post Estático') ? 1 : 0;
        $mediaModel->storie = ($request->recurso == 'Storie') ? 1 : 0;
        $mediaModel->save();

        $contentType = new ContentType();
        $contentType->community = ($request->tipo_contenido == 'Community') ? 1 : 0;
        $contentType->marketing = ($request->tipo_contenido == 'Marketing') ? 1 : 0;
        $contentType->institutional = ($request->tipo_contenido == 'Institutional') ? 1 : 0;
        $contentType->save();

        $mockupModel = new Mockup();
        if ($request->hasFile('mockup')) {
            $file = $request->file('mockup');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/mockups'), $filename);
            $mockupModel->mockup = 'uploads/mockups/' . $filename;
        } else {
            $mockupModel->mockup = '';
        }
        $mockupModel->save();

        $calendar = new Calendar();
        $calendar->user_id = auth()->id(); // <--- Asignar al usuario autenticado actual
        $calendar->id_date = $dateModel->id_date;
        $calendar->id_copy = $copyModel->id_copy;
        $calendar->id_cta = $ctaModel->id_cta;
        $calendar->id_feed = $feedModel->id_feed;
        $calendar->id_social_m = $socialModel->id_sm;
        $calendar->id_mr = $mediaModel->id_mr;
        $calendar->id_content_type = $contentType->id_type;
        $calendar->id_mockup = $mockupModel->id_mockup;
        $calendar->status = $request->status ?? 'en_proceso';
        $calendar->save();

        return redirect()->route('calendar.index')->with('success', '¡Publicación registrada con éxito!');
    }

    public function edit($id)
    {
        // Asegurar que pertenezca al usuario actual
        $calendar = Calendar::where('user_id', auth()->id())->with([
            'date', 
            'contentType', 
            'socialMedia', 
            'feed', 
            'mediaResource', 
            'copyRecord', 
            'cta', 
            'mockup'
        ])->findOrFail($id);

        return view('calendar.edit', compact('calendar'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required',
            'red_social' => 'required',
            'tipo_contenido' => 'required',
            'recurso' => 'required',
            'feed' => 'required',
            'cta' => 'required',
            'copy' => 'required',
            'mockup' => 'nullable|file|mimes:mov,mp4,jpeg,jpg,png|max:51200',
        ]);

        // Asegurar que pertenezca al usuario actual
        $calendar = Calendar::where('user_id', auth()->id())->findOrFail($id);

        if ($calendar->date) {
            $dateParts = explode('-', $request->fecha);
            $calendar->date->year = $dateParts[0] ?? date('Y');
            $calendar->date->month = $dateParts[1] ?? date('m');
            $calendar->date->day = $dateParts[2] ?? date('d');
            $calendar->date->hour = $request->hora;
            $calendar->date->save();
        }

        if ($calendar->copyRecord) {
            $calendar->copyRecord->copy = $request->copy;
            $calendar->copyRecord->save();
        }

        if ($calendar->cta) {
            $calendar->cta->cta_txt = $request->cta;
            $calendar->cta->save();
        }

        if ($calendar->feed) {
            $calendar->feed->feed_txt = $request->feed;
            $calendar->feed->save();
        }

        if ($calendar->socialMedia) {
            $calendar->socialMedia->instagram = ($request->red_social == 'Instagram') ? 'Instagram' : '';
            $calendar->socialMedia->tiktok = ($request->red_social == 'TikTok') ? 'TikTok' : '';
            $calendar->socialMedia->x = ($request->red_social == 'X') ? 'X' : '';
            $calendar->socialMedia->linkedin = ($request->red_social == 'LinkedIn') ? 'LinkedIn' : '';
            $calendar->socialMedia->facebook = ($request->red_social == 'Facebook') ? 'Facebook' : '';
            $calendar->socialMedia->save();
        }

        if ($calendar->mediaResource) {
            $calendar->mediaResource->reel = ($request->recurso == 'Reel') ? 1 : 0;
            $calendar->mediaResource->carrusel = ($request->recurso == 'Carrusel') ? 1 : 0;
            $calendar->mediaResource->static_post = ($request->recurso == 'Post Estático') ? 1 : 0;
            $calendar->mediaResource->storie = ($request->recurso == 'Storie') ? 1 : 0;
            $calendar->mediaResource->save();
        }

        if ($calendar->contentType) {
            $calendar->contentType->community = ($request->tipo_contenido == 'Community') ? 1 : 0;
            $calendar->contentType->marketing = ($request->tipo_contenido == 'Marketing') ? 1 : 0;
            $calendar->contentType->institutional = ($request->tipo_contenido == 'Institutional') ? 1 : 0;
            $calendar->contentType->save();
        }

        if ($request->hasFile('mockup') && $calendar->mockup) {
            if (!empty($calendar->mockup->mockup) && file_exists(public_path($calendar->mockup->mockup))) {
                @unlink(public_path($calendar->mockup->mockup));
            }

            $file = $request->file('mockup');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/mockups'), $filename);
            $calendar->mockup->mockup = 'uploads/mockups/' . $filename;
            $calendar->mockup->save();
        }

        if ($request->has('status')) {
            $calendar->status = $request->status;
            $calendar->save();
        }

        return redirect()->route('calendar.index')->with('success', '¡Publicación actualizada con éxito!');
    }

    public function destroy($id)
    {
        // Asegurar que pertenezca al usuario actual
        $calendar = Calendar::where('user_id', auth()->id())->with([
            'date', 
            'contentType', 
            'socialMedia', 
            'feed', 
            'mediaResource', 
            'copyRecord', 
            'cta', 
            'mockup'
        ])->findOrFail($id);

        if ($calendar->mockup && !empty($calendar->mockup->mockup)) {
            $filePath = public_path($calendar->mockup->mockup);
            if (file_exists($filePath)) {
                @unlink($filePath);
            }
        }

        $dateModel = $calendar->date;
        $contentTypeModel = $calendar->contentType;
        $socialMediaModel = $calendar->socialMedia;
        $feedModel = $calendar->feed;
        $mediaResourceModel = $calendar->mediaResource;
        $copyRecordModel = $calendar->copyRecord;
        $ctaModel = $calendar->cta;
        $mockupModel = $calendar->mockup;

        $calendar->delete();

        if ($dateModel) $dateModel->delete();
        if ($contentTypeModel) $contentTypeModel->delete();
        if ($socialMediaModel) $socialMediaModel->delete();
        if ($feedModel) $feedModel->delete();
        if ($mediaResourceModel) $mediaResourceModel->delete();
        if ($copyRecordModel) $copyRecordModel->delete();
        if ($ctaModel) $ctaModel->delete();
        if ($mockupModel) $mockupModel->delete();

        return redirect()->route('calendar.index')->with('success', '¡Publicación y registros asociados eliminados correctamente!');
    }

    public function show($id)
    {
        // Asegurar que pertenezca al usuario actual
        $calendar = Calendar::where('user_id', auth()->id())->with([
            'date', 
            'contentType', 
            'socialMedia', 
            'feed', 
            'mediaResource', 
            'copyRecord', 
            'cta', 
            'mockup'
        ])->findOrFail($id);

        return view('calendar.show', compact('calendar'));
    }

    public function toggleStatus($id)
    {
        // Asegurar que pertenezca al usuario actual
        $calendar = Calendar::where('user_id', auth()->id())->findOrFail($id);

        $calendar->status = ($calendar->status === 'publicado') ? 'en_proceso' : 'publicado';
        $calendar->save();

        return redirect()->back()->with('success', '¡Estado actualizado correctamente!');
    }

    public function board(Request $request)
    {
        $year = intval($request->input('year', date('Y')));
        $month = intval($request->input('month', date('m')));

        // Obtener solo las publicaciones del usuario autenticado en el mes y año seleccionados
        $records = Calendar::where('user_id', auth()->id())->with(['date', 'socialMedia', 'copyRecord', 'mockup'])
            ->whereHas('date', function($q) use ($year, $month) {
                $q->where('year', $year)->where('month', $month);
            })->get();

        // Agrupar registros por el número de día
        $eventsByDay = $records->groupBy(function($item) {
            return intval($item->date->day);
        });

        // Manejo de fechas Carbon en el backend
        $currentDate = \Carbon\Carbon::createFromDate($year, $month, 1)->locale('es');
        $prevMonth = $currentDate->copy()->subMonth();
        $nextMonth = $currentDate->copy()->addMonth();

        $monthName = ucfirst($currentDate->isoFormat('MMMM YYYY'));
        $daysInMonth = $currentDate->daysInMonth;
        $firstDayOfWeek = $currentDate->dayOfWeekIso; // 1 (Lunes) a 7 (Domingo)

        return view('calendar.board', compact(
            'records', 
            'eventsByDay', 
            'year', 
            'month', 
            'daysInMonth', 
            'firstDayOfWeek',
            'monthName',
            'prevMonth',
            'nextMonth'
        ));
    }

    public function dashboard(Request $request)
    {
        $year = intval($request->input('year', date('Y')));
        $month = intval($request->input('month', date('m')));

        // Obtener solo los registros del usuario autenticado en el mes seleccionado
        $records = Calendar::where('user_id', auth()->id())->with(['date', 'contentType', 'socialMedia', 'copyRecord', 'mockup'])
            ->whereHas('date', function($q) use ($year, $month) {
                $q->where('year', $year)->where('month', $month);
            })->get();

        // 1. Insights del Mes
        $totalPlanned = $records->count();
        $publishedCount = $records->where('status', 'publicado')->count();
        $inProcessCount = $records->where('status', 'en_proceso')->count();
        $successRate = $totalPlanned > 0 ? round(($publishedCount / $totalPlanned) * 100) : 0;

        // 2. Alertas / Tareas pendientes o atrasadas (en proceso)
        $now = \Carbon\Carbon::now();
        $pendingAlerts = $records->filter(function($item) use ($now) {
            if ($item->status !== 'en_proceso' || !$item->date) return false;
            try {
                $postDate = \Carbon\Carbon::create(
                    $item->date->year, 
                    $item->date->month, 
                    $item->date->day, 
                    intval(substr($item->date->hour, 0, 2)), 0, 0
                );
                return true; 
            } catch (\Exception $e) {
                return false;
            }
        })->sortBy(function($item) {
            return $item->date->year . '-' . $item->date->month . '-' . $item->date->day;
        });

        // Fechas para navegación del dashboard
        $currentDate = \Carbon\Carbon::createFromDate($year, $month, 1)->locale('es');
        $prevMonth = $currentDate->copy()->subMonth();
        $nextMonth = $currentDate->copy()->addMonth();
        $monthName = ucfirst($currentDate->isoFormat('MMMM YYYY'));

        return view('calendar.dashboard', compact(
            'records',
            'totalPlanned',
            'publishedCount',
            'inProcessCount',
            'successRate',
            'pendingAlerts',
            'year',
            'month',
            'monthName',
            'prevMonth',
            'nextMonth'
        ));
    }
}