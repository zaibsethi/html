<?php

namespace App\Jobs;

use App\Models\Member;
use App\Models\Message;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class SendMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

//    protected $memberId;
    protected $member;
    protected $messageContent;
    protected $belong_to_gym;

    /**
     * Create a new job instance.
     *
     * @param int Member $member
     */
    public function __construct(Member $member, $messageContent, $belong_to_gym)
    {
//        $this->memberId = $memberId;
        $this->member = $member;
        $this->messageContent = $messageContent;
        $this->belong_to_gym = $belong_to_gym;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        // Retrieve the member using the provided ID
        $member = $this->member;
        $messageContent = $this->messageContent;
        $belong_to_gym = $this->belong_to_gym;
        $gymData = User::where('belong_to_gym', $belong_to_gym)->where('gym_package', '=', 'paid')->first();

        if ($gymData->gym_package === 'paid') {
            $url = "http://whatsapp247.com/api/send.php";

            $parameters = array("api_key" => $gymData->message_api_key,
                "mobile" => "92" . $member->member_phone,
                "message" => $messageContent,
                "priority" => "0",
                "type" => 0
            );

            $ch = curl_init();
            $timeout = 30;
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
            curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
            $response = curl_exec($ch);
            curl_close($ch);

            echo $response;
            // Save the success response in the database
            if ($response) {
                Message::create([
                    'send_to' => $member->member_phone, // Assuming you have a 'member_id' field in your Response model
                    'schedule_period' => 'Daily',
                    'text_message' => $messageContent,
                    'belong_to_gym' => $belong_to_gym,
                    'success_response' => $response,
                ]);
            }
        } else {
            "Please buy message package";
        }
    }
}

