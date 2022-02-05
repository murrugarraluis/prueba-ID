<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\NoteStoreRequest;
use App\Http\Resources\NoteResource;
use App\Models\Group;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoteStoreRequest $request)
    {
        $note = Note::create($request->all());
        $note->group()->associate($request->group_id)->save();
        $note->user()->associate($request->user_id)->save();

        if ($request->image) {
            // Path para registrar imagen
            $path = $request->image->storeAs('public/notes', $note->id . '_' . $note->title . '.' . $request->image->extension());
            $note->image = $path;
            $note->save();
        }
        $this->sendEmails($request->group_id);
        return (new NoteResource($note))->additional(['message' => 'Nota Registrada']);
    }

    private function sendEmails($group_id)
    {
        $MailController = new MailController();

        $group = Group::find($group_id);
        $emails = $group->users->map(function ($user) {
            return $user->email;
        });
        $MailController->sendEmail($emails);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        //
    }
}
