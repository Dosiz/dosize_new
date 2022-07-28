<div class="content container-fluid p-0"  wire:poll>
    <div class="bg_color">
        @if(Auth::user()->hasRole('Brand'))
        <main>
            <div class="main-wrapper message_main_wrapper">
                <div class="messenger_announcment_main flex-row-reverse">
                    <div class="messenger_main">
                        <div class="inbox_header">
                            <div class="container-fluid">
                                <div class="d-flex align-center">
                                    <div class="ml-2">
                                        <span class="drop_down_icon"><i class="fa fa-ellipsis-v"
                                                aria-hidden="true"></i></span>
                                        <div class="drop_down_menu box_shahdow">
                                            <ul>
                                                <li>
                                                    <a href="" class="font-size-16">העברת הצ’אט לארכיון</a>
                                                </li>
                                                <li>
                                                    <a href="" class="font-size-16">השתקת התראות</a>
                                                </li>
                                                <li>
                                                    <a href="" class="font-size-16">מחיקת צ’אט</a>
                                                </li>
                                                <li>
                                                    <a href="" class="font-size-16">הצמדת צ’אט</a>
                                                </li>
                                                <li>
                                                    <a href="" class="font-size-16">חסימה</a>
                                                </li>
                                                <li>
                                                    <a href="" class="font-size-16">עמוד העסק</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        @if(Auth::user()->hasRole('Brand'))
                                        <div class="inbox_header_content">
                                            <a href=""><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                            <p class="font-size-16">
                                                {{$current->name ?? ''}}<i class="fa fa-check-circle" aria-hidden="true"></i>
                                            </p>
                                        </div>
                                        @else
                                        <div class="inbox_header_content">
                                            <a href=""><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                            <img src="{{asset('brand_image/'.$current->brand_image ?? '')}}" alt=""
                                                class="img-fluid" width="70px" height="70px">
                                            <p class="font-size-16">
                                                {{$current->user->name ?? ''}}<i class="fa fa-check-circle" aria-hidden="true"></i>
                                            </p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="message_list">
                            <ul>
                                @if ($messages->count())
                                 @foreach ($messages as $chat)
                                    @if ($chat->sender_id == Auth::user()->id && $chat->receiver_id == $receiver)
                                    <li>
                                        <div class="sending_message common_message">
                                            <p class="text_message font-size-14">{{$chat->message}}</p>
                                            <p class="time font-size-12">{{$chat->created_at}}</p>
                                        </div>
                                    </li>
                                     @elseif($chat->sender_id == $receiver && $chat->receiver_id == Auth::user()->id)
                                    <li>
                                        <div class="reciving_message common_message">
                                            <p class="text_message font-size-14">{{$chat->message}}</p>
                                            <p class="time font-size-12">{{$chat->created_at}}</p>
                                        </div>
                                    </li>
                                    @endif
                                @endforeach
                                @else
                                <div style="min-height: auto">
                                    <p class="no-chat-yet">No chats yet!</p>
                                </div>
                                @endif
                            </ul>
                        </div>
                        <div class="inbox_footer">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-12 pr-0">
                                        <div class="message_form">
                                            <form wire:submit.prevent="sendChat">
                                                <input type="hidden" value="{{ $receiver }}" wire:model.defer="receiver_id">
                                                <div class="input_div_button align-items-stretch flex-row-reverse">
                                                    <button>
                                                        <img src="../../assets/img/mobile_component/left_arrow.png"
                                                            alt="" class="img-fluid">
                                                    </button>
                                                    <input onfocus="myFunction()" autofocus type="text" wire:model.defer="message" id="type_message"
                                                        placeholder="הקלדת הודעה ..." class="font-size-14">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="announcment_main">
                        <div class="main_wallet_div announcment_updates">
                            <img src="../../assets/img/mobile_component/notifiction_main_img.png" alt="" class="img-fluid">
                            <h3>הודעות ועידכונים</h3>
                            <p class="font-size-14">לורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית לורם שבצק גק
                                ליץ,
                                ושבעגט ליבם סולגק.</p>
                        </div>
                        <div class="announcement_list">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <ul>
                                          
                                               @foreach($friend as $item)
                                                @php
                                                 $chatmessage=\App\Models\Message::where('thread',Auth::user()->id.'-'.$item->fiend)->orWhere('thread',$item->friend.'-'.Auth::user()->id)->latest()->get();
                                                 $chatunread=\App\Models\Message::where(['receiver_id'=>$item->friend,'is_read'=> '0'])->count();
                                                
                                                @endphp
                                                <li  wire:click="startChat({{$item->user}})">
                                                    <div class="announcement_detail">
                                                        <img src="../../assets/img/mobile_component/flashes_2.png" alt=""
                                                            class="img-fluid">
                                                        <div class="annoucment_content">
                                                            <h5 class="font-size-16">{{$item->users->name}}<i
                                                                    class="fa fa-check-circle" aria-hidden="true"></i></h5>
                                                            <p class="font-size-14">{{$chatmessage[0]->message ?? ''}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="timing_coins_div">
                                                        <p class="font-size-12">@if(isset($chatmessage[0]->created_at)){{date('H:i', strtotime($chatmessage[0]->created_at))}}@endif</p>
                                                        <span class="font-size-12">{{$chatunread ?? ''}}</span>
                                                    </div>
                                                </li>
                                                @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        @elseif(Auth::user()->hasRole('User'))
        <main>
            <div class="main-wrapper message_main_wrapper">
                <div class="messenger_announcment_main">
                    <div class="messenger_main">
                        <div class="inbox_header">
                            <div class="container-fluid">
                                <div class="row align-center">
                                    <div class="col-4">
                                        <span class="drop_down_icon"><i class="fa fa-ellipsis-v"
                                                aria-hidden="true"></i></span>
                                        <div class="drop_down_menu box_shahdow">
                                            <ul>
                                                <li>
                                                    <a href="" class="font-size-16">העברת הצ’אט לארכיון</a>
                                                </li>
                                                <li>
                                                    <a href="" class="font-size-16">השתקת התראות</a>
                                                </li>
                                                <li>
                                                    <a href="" class="font-size-16">מחיקת צ’אט</a>
                                                </li>
                                                <li>
                                                    <a href="" class="font-size-16">הצמדת צ’אט</a>
                                                </li>
                                                <li>
                                                    <a href="" class="font-size-16">חסימה</a>
                                                </li>
                                                <li>
                                                    <a href="" class="font-size-16">עמוד העסק</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-8 text-right">
                                        <div class="inbox_header_content">
                                            <a href=""><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                            <img src="{{asset('brand_image/'.$current->brand_image ?? '')}}" alt=""
                                                class="img-fluid" width="70px" height="70px">
                                            <p class="font-size-16">
                                                {{$current->user->name ?? ''}}<i class="fa fa-check-circle" aria-hidden="true"></i>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="message_list">
                            <ul>
                                @if ($messages->count())
                                 @foreach ($messages as $chat)
                                    @if ($chat->sender_id == Auth::user()->id && $chat->receiver_id == $receiver)
                                    <li>
                                        <div class="sending_message common_message">
                                            <p class="text_message font-size-14">{{$chat->message}}</p>
                                            <p class="time font-size-12">{{$chat->created_at}}</p>
                                        </div>
                                    </li>
                                     @elseif($chat->sender_id == $receiver && $chat->receiver_id == Auth::user()->id)
                                    <li>
                                        <div class="reciving_message common_message">
                                            <p class="text_message font-size-14">{{$chat->message}}</p>
                                            <p class="time font-size-12">{{$chat->created_at}}</p>
                                        </div>
                                    </li>
                                    @endif
                                @endforeach
                                @else
                                <div style="min-height: auto">
                                    <p class="no-chat-yet">No chats yet!</p>
                                </div>
                                @endif
                            </ul>
                        </div>
                        <div class="inbox_footer">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="message_form">
                                            <form wire:submit.prevent="sendChat">
                                                <input type="hidden" value="{{ $receiver }}" wire:model.defer="receiver_id">
                                                <div class="input_div_button align-items-stretch flex-row-reverse">
                                                    <button>
                                                        <img src="../../assets/img/mobile_component/left_arrow.png"
                                                            alt="" class="img-fluid">
                                                    </button>
                                                    <input onfocus="myFunction()" autofocus type="text" wire:model.defer="message" id="type_message"
                                                        placeholder="הקלדת הודעה ..." class="font-size-14">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="announcment_main">
                        <div class="main_wallet_div announcment_updates">
                            <img src="{{ asset('assets/img/mobile_component/notifiction_main_img.png') }}" alt="" class="img-fluid">
                            <h3>הודעות ועידכונים</h3>
                            <p class="font-size-14">לורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית לורם שבצק גק
                                ליץ,
                                ושבעגט ליבם סולגק.</p>
                        </div>
                        <div class="announcement_list">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <ul>
                                             @foreach($friend as $item)
                                                @php
                                                 $chatmessage=\App\Models\Message::where('thread',Auth::user()->id.'-'.$item->fiend)->orWhere('thread',$item->friend.'-'.Auth::user()->id)->latest()->get();
                                                 $chatunread=\App\Models\Message::where(['sender_id'=>$item->friend,'is_read'=> '0'])->count();
                                                
                                                @endphp
                                                <li  wire:click="startChat({{$item->friend}})">
                                                    <div class="announcement_detail">
                                                        <img src="../../assets/img/mobile_component/flashes_2.png" alt=""
                                                            class="img-fluid">
                                                        <div class="annoucment_content">
                                                            <h5 class="font-size-16">{{$item->users->name}}<i
                                                                    class="fa fa-check-circle" aria-hidden="true"></i></h5>
                                                            <p class="font-size-14">{{$chatmessage[0]->message ?? ''}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="timing_coins_div">
                                                        <p class="font-size-12">@if(isset($chatmessage[0]->created_at)){{date('H:i', strtotime($chatmessage[0]->created_at))}}@endif</p>
                                                        <span class="font-size-12">{{$chatunread ?? ''}}</span>
                                                    </div>
                                                </li>
                                                @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        @endif
    </div>

    <!-- Messaging Content end here -->      
</div>  
