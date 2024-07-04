<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TicketAdminController extends Controller
{
    public function index(){
        $ticket = Ticket::all();
        return view ('/admin/ticket/index', ['ticket' => $ticket]);
    }
    public function add(){
        return view('/admin/ticket/insert');
    }
    public function insert(Request $request){
        $request->validate([
            'booking_id' => ['required', 'integer'],
            'seat_number' => ['required', 'string'],
        ]);
        Ticket::create([
            'booking_id' => $request->booking_id,
            'seat_number' => $request->seat_number,
        ]);
    }
    public function edit($id){
        $ticketId = Ticket::findorfail($id);
        return view('/admin/ticket/edit', compact('ticketId'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'booking_id' => ['required', 'integer'],
            'seat_number' => ['required', 'string'],
        ]);
        $ticket = Ticket::findorfail($id);
        
        $data = [
            'booking_id' => $request->booking_id,
            'seat_number' => $request->seat_number,
        ];
        $ticket->update($data);
    }
    public function delete($id){
        $ticket = Ticket::findorfail($id);
        return view('/admin/ticket/delete', compact('ticket'));
    }
    public function drop($id){
        try{
            $ticket = Ticket::findorfail($id);
            $ticket->delete();
            return response()->json(['message' => 'Ticket deleted successfully.'], 200);
        }catch(\Exception $e){
            Log::error('Error deleting user: ' . $e->getMessage(), ['id' => $id]);
        }
    }

}
