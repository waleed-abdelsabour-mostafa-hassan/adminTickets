<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('superAdmin', ['except' => ['index','view','create','store']]);
    // }
    // show all
    public function index()
    {
        $ownTickets=Ticket::where('owner_id',Auth::user()->id)->get();
        $assignTickets=Ticket::where('assigned_id',Auth::user()->id)->get();
        return view('admin.tickets.index',compact('ownTickets','assignTickets'));
    }
    // view
    public function view(Ticket $ticket)
    {
        return view('admin.tickets.view',compact('ticket'));
    }
    // create
    public function create()
    {
        return view('admin.tickets.create');
    }
    // store
    public function store(Request $request)
    {

        //Validate
        $request->validate([
            'title' => 'required|min:6',
            'description' => 'required|min:15',
            'assigned_id' => 'required',
            'from_date' => 'required',
            'to_date' => 'required|after_or_equal:from_date',
        ]);
        $ticket=new Ticket();
        $ticket->title=$request->title;
        $ticket->description=$request->description;
        $ticket->owner_id=Auth::user()->id;
        $ticket->assigned_id=$request->assigned_id;
        $ticket->from_date=$request->from_date;
        $ticket->to_date=$request->to_date;
        $ticket->save();
        if (Auth::user()->id != $ticket->assigned_id)
        {
            $content='قام بإضافة تذكرة لك';
            Notification::storenotification($ticket->assigned_id,Auth::user()->id,$content,$ticket->id);
        }
        return redirect(route('tickets'))->withFlashMessage('تم إضافة التذكرة بنجاح');
    }
    // edit
    public function edit(Ticket $ticket)
    {
        return view('admin.tickets.edit',compact('ticket'));
    }
    // update
    public function update(Request $request,Ticket $ticket)
    {
         //Validate
        $request->validate([
            'title' => 'required|min:6',
            'description' => 'required|min:15',
            'assigned_id' => 'required',
            'from_date' => 'required',
            'to_date' => 'required|after_or_equal:from_date',
        ]);
        $ticket->title=$request->title;
        $ticket->description=$request->description;
        $ticket->assigned_id=$request->assigned_id;
        $ticket->from_date=$request->from_date;
        $ticket->to_date=$request->to_date;
        $ticket->save();
        return redirect(route('tickets'))->withFlashMessage('تم تعديل التذكرة بنجاح');
    }
    // delete
    public function delete(Ticket $ticket)
    {
        $ticket->delete();
        return back()->withFlashMessage('تم حذف التذكرة بنجاح');
    }
    // open
    public function open(Ticket $ticket)
    {
        $ticket->status=1;
        $ticket->save();
        if (Auth::user()->id != $ticket->owner_id)
        {
            $content='قام بفتح التذكرة';
            Notification::storenotification($ticket->owner_id,Auth::user()->id,$content,$ticket->id);
        }
        return back()->withFlashMessage('تم فتح التذكرة بنجاح');
    }
    // close
    public function close(Ticket $ticket)
    {
        $ticket->status=2;
        $ticket->save();
        if (Auth::user()->id != $ticket->owner_id)
        {
            $content='قام بإغلاق التذكرة';
            Notification::storenotification($ticket->owner_id,Auth::user()->id,$content,$ticket->id);
        }
        return back()->withFlashMessage('تم إغلاق التذكرة بنجاح');
    }
    // open
    public function reopen(Ticket $ticket)
    {
        $ticket->status=3;
        $ticket->save();
        if (Auth::user()->id != $ticket->owner_id)
        {
            $content='قام بإعادة فتح التذكرة';
            Notification::storenotification($ticket->owner_id,Auth::user()->id,$content,$ticket->id);
        }
        return back()->withFlashMessage('تم إعادة فتح التذكرة بنجاح');
    }
}
