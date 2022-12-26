<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class EventController extends Controller
{
    /**
     * Error Code for UNAUTORIZED Actions
     *
     * @var int
     */
    const ERROR_CODE = 401;

    public function __construct()
    {
        $this->authorizeResource(Event::class, 'event');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $events = Event::where('public', '=', true)->orWhere('user_id', Auth::id())->with('organist')->get();

        return view('event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
//        abort_if(Gate::denies('create', Event::class), self::ERROR_CODE);
        return view('event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
//        abort_if(Gate::denies('create', Event::class), self::ERROR_CODE);
        $request->validate([
            'title' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'date' => ['required', 'date'],
            'time' => ['required']
        ]);

        $event = Event::create(array_merge($request->only(['title', 'description']), [
            'user_id' => Auth::id(),
        ], $this->make_date_time($request)));

        return redirect()->route('event.show', $event)->with('success', __(':resource created!', [
            'resource' => __('Event')
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Event $event
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Event $event): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
//        $this->authorize('view', $event);
        return view('event.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event $event
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Event $event): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
//        abort_if(Gate::denies('update', $event), self::ERROR_CODE);
        return view('event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Event $event): \Illuminate\Http\RedirectResponse
    {
//        abort_if(Gate::denies('update', $event), self::ERROR_CODE);
        $request->validate([
            'title' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'public' => ['boolean'],
            'date' => ['required', 'date', 'after:now']
        ]);

        $event->update(
            array_merge($request->only(['title', 'description', 'public']),
                $this->make_date_time($request))
        );

        return redirect()->route('event.show', $event)->with('success', __(':resource updated.', [
            'resource' => __('Event')
        ]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Event $event): \Illuminate\Http\RedirectResponse
    {
//        abort_if(Gate::denies('delete', $event), self::ERROR_CODE);
        $event->delete();

        return redirect()->route('event.index')->with('success', __(':resource deleted', [
            'resource' => __('Event')
        ]));
    }

    private function make_date_time(Request $request)
    {
        return [
            'date' => [
                'date' => $request->date('date'),
                'year' => $request->date('date')->year,
                'day' => $request->date('date')->day,
                'month' => $request->date('date')->getTranslatedMonthName(),
                'time' => $request->date('time', '!H:i') . __('main.hour')
            ]
        ];
    }
}
