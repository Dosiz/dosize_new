<?php

namespace App\Http\Controllers\brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BrandProfile; 
use App\Models\BrandsHasSubCategory;   
use App\Models\BrandsHasAddress;   
use App\Models\BlogComment;   
use App\Models\ProductComment;   
use App\Models\User;
use App\Models\Subscriber;   
use App\Models\Friend;   
use App\Models\Message;   
use Auth;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function brand_register(Request $request)
    {
        // dd($request->all());
        $user_id = Auth::id();
        $user = User::where('id',Auth::id())->first();
        $this->validate($request,[ 
            'brand_name'=>'required', 
            'category_id'=>'required', 
            'addmore.*' => 'required',
            'description'=>'required', 
            'brand_image'=>'required', 
            'brand_logo'=>'required', 
            'sub_category_id'=>'required', 
            'whatsapp_no'=>'required',
            

        ],
        [
            'addmore.0.required' => 'Enter first Address',
            'addmore.1.required' => 'Enter second address',
            'addmore.2.required' => 'Enter third address',
            'addmore.3.required' => 'Enter forth address',
            'addmore.4.required' => 'Enter fifth address',
            'addmore.5.required' => 'Enter sixth address',
            'addmore.6.required' => 'Enter seventh address',
        ]);
        // dd($request->all());
        // try {
        $brand = BrandProfile::where('user_id', '=', $user_id)->first();
        if($brand != null){
            $id = $brand->id;
            $brand_profile = BrandProfile::find($id);
        }
        else {
            $brand_profile= new BrandProfile;
        }
        $lower_name = Str::lower($request->brand_name);
        $short_name = str_replace(' ', '-', $lower_name);
        //  dd($short_name);
        $brand_profile->short_name = $short_name;
        $brand_profile->brand_name = $request->brand_name;
        $brand_profile->category_id = $request->category_id;
        // $collection->implode('name', ', ');
        // $brand_profile->address = $request->address;
        $brand_profile->description = $request->description;

        $brand_profile->whatsapp_no = $request->whatsapp_no;
        if($request->website_url)
        {
            $brand_profile->website_url = $request->website_url;
        }
        $brand_profile->user_id = $user_id;
        if($request->hasfile('brand_image'))
        {
            $image = $request->file('brand_image');
            $extensions =$image->extension();

            $image_name =time().'.'. $extensions;
            $image->move('brand_image/',$image_name);
            $brand_profile->brand_image=$image_name;
        }
        if($request->hasfile('brand_logo'))
        {
            $b_image = $request->file('brand_logo');
            $brand_extensions =$b_image->extension();

            $image_name =time().'.'. $brand_extensions;
            $b_image->move('brand_logo/',$image_name);
            $brand_profile->brand_logo=$image_name;
        }
        $brand_profile->save();
        // dd($brand_profile);
        BrandsHasAddress::where('brand_profile_id',$brand_profile->id)->delete();
        
        foreach($request->addmore as $address)
        {
            $brand_address= new BrandsHasAddress;
            $brand_address->brand_profile_id=$brand_profile->id;
            $brand_address->address = $address;
            $brand_address->city_id = $user->city_id;
            $brand_address->save();
        }

        BrandsHasSubCategory::where('brand_profile_id',$brand_profile->id)->delete();
        
        foreach($request->sub_category_id as $sub_category)
        {
            // dd($brand_profile->id,"working");
            $brand_subcategory= new BrandsHasSubCategory;
            $brand_subcategory->sub_category_id=$sub_category;
            $brand_subcategory->brand_profile_id = $brand_profile->id;
            $brand_subcategory->save();
        }
        $brand_profile = BrandProfile::where('id',$brand_profile->id)->where('status', 1)->first();
        return view('brand.brand_profile_message',compact('brand_profile'));
        // return redirect('dashboard/dashboard');
        // } catch (\Exception $exception) {
        //     return Redirect::back();
        // }
    }

    public function brand_subscriber()
    {
        $brand_profile = BrandProfile::where('user_id',Auth::id())->first();
        $subscribers =Subscriber::with('brandprofile')->where('brand_profile_id',$brand_profile->id)->get();
        // dd($subscribers);
        return view('brand.subscribers',compact('subscribers'));
    }

    public function blog_comments()
    {
        $brand_profile = BrandProfile::where('user_id',Auth::id())->first();
        $brand_profile_id = $brand_profile->id;
        $blog_comments = BlogComment::with('blog','user')->whereHas('blog', function ($q) use ($brand_profile_id) {
            $q->where('brand_profile_id',$brand_profile_id);
        })->where('parent_id',null)->get();
        // dd($blog_comments);
        return view('brand.comment.blog_comments',compact('blog_comments'));
    }

    public function product_comments()
    {
        // dd("sdfdsf");
        $brand_profile = BrandProfile::where('user_id',Auth::id())->first();
        $brand_profile_id = $brand_profile->id;
        $product_comments = ProductComment::with('product','user')->whereHas('product', function ($q) use ($brand_profile_id) {
            $q->where('brand_profile_id',$brand_profile_id);
        })->where('parent_id',null)->get();
        // dd($product_comments,$brand_profile->id);
        return view('brand.comment.product_comments',compact('product_comments'));
    }

    public function update_product_comment(Request $request , $product_comment_id)    
    {
        $brand_profile= BrandProfile::where('user_id',Auth::id())->first();
        $product_comment = ProductComment::FindorFail($product_comment_id);
        $check_product_comment = ProductComment::where('parent_id',$product_comment->id)->first();
        if($check_product_comment)
        {
            toastr()->error('Kindly delete reply of this comment');
            return Redirect::back();
        }
        else
        {
            $product_comment->status = $request->status;
            $product_comment->update();
            return Redirect::back();
        }
        
    }

    public function update_blog_comment(Request $request , $blog_comment_id)    
    {
        $brand_profile= BrandProfile::where('user_id',Auth::id())->first();
        $blog_comment = BlogComment::FindorFail($blog_comment_id);
        $check_blog_comment = BlogComment::where('parent_id',$blog_comment->id)->first();
        // dd($check_blog_comment);
        if($check_blog_comment)
        {
            toastr()->error('Kindly delete reply of this comment');
            return Redirect::back();
        }
        else
        {
            $blog_comment->status = $request->status;
            $blog_comment->update();
            return Redirect::back();
        }
    }

    public function brand_design()
    {
        $brand_profile = BrandProfile::where('user_id',Auth::id())->first();
        return view('brand.brand_design',compact('brand_profile'));
    }

    public function store_brand_design(Request $request)
    {
        // dd($request->all());
        $user_id = Auth::id();
        $user = User::where('id',Auth::id())->first();
        $this->validate($request,[ 
            'header_font'=>'required',
            'header_color'=>'required',
            'footer_font'=>'required',
            'footer_color'=>'required',
            'button_font'=>'required',
            'button_color'=>'required',
            'title_font'=>'required',
            'title_color'=>'required',
            'text_font'=>'required',
            'text_color'=>'required',
            

        ]);
        $brand = BrandProfile::where('user_id', '=', $user_id)->first();
        $id = $brand->id;
        $brand_profile = BrandProfile::find($id);

        $fonts = [];
        $colors = [];
        
        $fonts['header_font'] =$request->header_font;
        $fonts['footer_font'] =$request->footer_font;
        $fonts['button_font'] =$request->button_font;
        $fonts['title_font']  =$request->title_font;
        $fonts['text_font']  =$request->text_font;

        $colors['header_color'] =$request->header_color;
        $colors['footer_color'] =$request->footer_color;
        $colors['button_color'] =$request->button_color;
        $colors['title_color']  =$request->title_color;
        $colors['text_color']  =$request->text_color;

        $brand_profile->color = json_encode($colors);
        $brand_profile->font = json_encode($fonts);
       
        $brand_profile->save();
        
        return Redirect::back();
    }

    public function brand_subscriber_messages(Request $request)
    {
        $brand_id = Auth::id();
        $brand = BrandProfile::where('user_id', $brand_id)->first();
        $subscribers = Subscriber::where('brand_profile_id', '=', $brand->id)->get();
        // dd($subscribers);
        foreach($subscribers as $subscriber)
        {
            $user_id = User::where('email', $subscriber->email)->first();
            // dd($brand->id);

            $chk_friend = Friend::where('user', $user_id->id)->where('friend',$brand_id)->first();
            if(!$chk_friend)
            {
                $friend= new Friend;
                $friend->friend = $brand_id;
                $friend->user = $user_id->id;
                $friend->save();
            }

            $message= new Message;
            $message->thread = ($brand_id).'-'.($user_id->id);
            $message->sender_id = $brand_id;
            $message->receiver_id = $user_id->id;
            $message->message = $request->message;
            $message->save();
            toastr()->success('Message sent successfully');
            return Redirect::back();
        }
        
    }

}
