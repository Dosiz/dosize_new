<?php

namespace App\Http\Livewire\Chat;
use App\Models\Message;
use App\Models\Friend; 
use App\Models\BrandProfile;
use Livewire\Component;
use Auth;
use App\Models\User;
use DB;

class Chat extends Component
{
    public $noChat = false;
    public $messages;
    public $friend;
    public $current;
    public $receiver;
    public $current_user;
    public $message;
    public $thread;
    public $receiver_id;
    public $notification;

    public function startChat($id)
    {
           $user = Auth::user()->id;
           $this->receiver = $id;
           if(Auth::user()->hasRole('Brand'))
            {
                $this->current_user =$user;
                $this->friend = Friend::with('endusers')->where('friend', $user)->get();
                $this->current=User::find($id);
                Message::where('thread', $this->current_user.'-'.$this->receiver)->orWhere('thread', $this->receiver.'-'.$this->current_user)->update(['is_read' => '1']);
                
            }
            else
            {
                $this->current_user =$user;
                $this->current=BrandProfile::with('user')->where('user_id',$id)->first();
                $this->friend = Friend::with('users')->where('user', $user)->get();
                Message::where('thread', $this->current_user.'-'.$this->receiver)->orWhere('thread', $this->receiver.'-'.$this->current_user)->update(['is_read' => '1']);
            }
           

    }

    public function sendChat ()
    {
        //$this->validate();
        $this->current_user = Auth::user()->id;
        $thread_value = $this->current_user . '-' .$this->receiver;
            Message::create([
                'thread' => $thread_value,
                'message' => $this->message,
                'receiver_id' => $this->receiver,
                'sender_id' => $this->current_user
            ]);
        $friend=Friend::where(['friend'=>$this->receiver,'user'=>Auth::user()->id])->count();

        if(Auth::user()->hasRole('User') && $friend<=0)
        {
            Friend::create(['friend' => $this->receiver, 'user' => Auth::user()->id]);
        }
        

        $this->clearForm();

    }


    public function render()
    {
            if(Auth::user()->hasRole('Brand'))
            {
                $user = Auth::user()->id;
                // check if current user is friend
                $this->friend = Friend::with('endusers')->where('friend', $user)->get();
            //    dd($this->friend);
                if(count($this->friend) > 0)
                {
                    if($this->receiver == 0)
                    {
                    $receiver = $this->receiver=$this->friend[0]->user;
                    }
                    else{
                        $receiver = $this->receiver;
                    }
                    
                    $this->current=User::find($receiver);
                    // get all chats
                    $this->messages = Message::where('thread', $user.'-'.$receiver)->orWhere('thread', $receiver.'-'.$user)->get();
                    // dd($this->messages);
                }
                else{
                    $this->current  = "";
                    $this->messages = [];
                }
                // dd($this->current);
                return view('livewire.chat.chat');
                
                

            }
            else
            {
                $user = Auth::user()->id;
                $receiver = $this->receiver;
                $this->current=BrandProfile::with('user')->where('user_id',$receiver)->first();
                // check if current user is friend
                $this->friend = Friend::with('users')->where('user', $user)->get();
                // get all chats
                $this->messages = Message::where('thread', $user.'-'.$receiver)->orWhere('thread', $receiver.'-'.$user)->get();
                return view('livewire.chat.chat');
            }
    }

    public function clearForm ()
    {
        $this->message = "";
    }

    
}
