<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Jobs\SendMessage;
use App\Models\Member;
use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function addMessage()
    {
        $status = false;
        $cDate = now()->format('Y-m-d');


        $messageDate = Message::where('belong_to_gym', Auth::user()->gym_id)->latest()->first();
        if ($messageDate) {
            $latestCreatedAt = $messageDate->created_at;
            $formattedDate = $latestCreatedAt->format('Y-m-d');
            if ($cDate == $formattedDate) {

                return view('backend.message.add-message', compact('status'));

            } else {
                $status = true;
                return view('backend.message.add-message', compact('status'));

            }
        } else {
            $status = true;
            return view('backend.message.add-message', compact('status'));
        }


//        $cDate = Carbon::parse(now())->addMonth(1)->format('Y-m-d');gym_id
//        $getData = Message::where('belong_to_gym', Auth::user()->gym_id)
//            ->whereRaw('DATE(created_at) < ?', [$cDate])  // Compare with date part only
//            ->orderBy('created_at', 'desc')
//            ->first();
//        // Always pass the variable to the view
//        return view('backend.message.add-message', compact('getData'));
    }

    public function createMessage(Request $request)
    {

        $belong_to_gym = Auth::user()->gym_id;
        $messageContent = $request->text_message;
        // Query the database to get members
        $getMembers = Member::where('belong_to_gym', Auth::user()->gym_id)
            ->where('member_shift', $request->send_to)
            ->take(150)
            ->get();
        // Check if any members were found
        if ($getMembers->isNotEmpty()) {
//            $delay = now()->addMinutes(1); // Initial delay
            $delay = now()->addSecond(5); // Initial delay

            // Dispatch the SendMessage job for each member with a 5-minute delay
            foreach ($getMembers as $member) {
                SendMessage::dispatch($member, $messageContent, $belong_to_gym)->delay($delay);
//                $delay = now()->addMinutes(rand(1, 10));
//                $delay = $delay->addMinute(1);
//                $delay = $delay->addMinutes(1); // Add 5 minutes for the next member
                $delay = $delay->addSecond(5); // Add 5 minutes for the next member
            }

            // Redirect with success message
            return redirect(route('addMessage'))->with('success', 'Messages scheduled successfully.');
        }
        else {
            // Redirect with danger message
            return redirect(route('addMessage'))->with('danger', 'No member found with status ' . $request->send_to);
        }
    }

    public function messageList()
    {
//        $memberData = Member::join('messages', 'members.member_phone', '=', 'messages.send_to')
//            ->where('members.belong_to_gym', Auth::user()->gym_id)
//            ->where('messages.belong_to_gym', Auth::user()->gym_id)
//            ->select('members.*')
//            ->distinct()
//            ->get();

        $memberData = Member::where('belong_to_gym', Auth::user()->gym_id)->get();
        $messageData = Message::where('belong_to_gym', Auth::user()->gym_id)->get();


        return view('backend.message.message-list', compact('memberData', 'messageData'));

    }
}
