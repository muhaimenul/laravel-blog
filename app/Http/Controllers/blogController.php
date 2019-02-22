<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
//use Illuminate\Contracts\Session\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Mail;
use Session;
use App\Category;
class blogController extends Controller
{
    //
    public function getIndex()
    {
        $post = Post::orderBy('created_at', 'desc')->limit(3)->get();
         //$post = Post::orderBy('created_at', 'desc')->paginate(4);
        $categories = Category::all();
        return view('index')->with('posts',$post)->with('categories',$categories);
    }

    public function getAbout()
    {
        return view('about');
    }

    public function getWork()
    {
        return view('work');
    }

    public function getContact()
    {
        return view('contact');
    }

    public function postContact(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|regex:/^[\pL\s]+$/u',
            'email' => 'required|email',
            'subject' => 'min:3',
            'message' => 'min:10'
        ]);
        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'body' => $request->message
        );
        Mail::send('emails.contact', $data, function ($message) use ($data){
            $message->from($data['email']);
            $message->to('muhaimen@ove.io');
            $message->subject($data['subject']);
        });
        Session::flash('success', 'Your Email is Sent!');
        return redirect('contact');
    }

    public function getAllPost()
    {
        $post = Post::orderBy('created_at', 'desc')->paginate(3);
        $categories = Category::all();
        return view('allposts')->with('posts',$post)->with('categories',$categories);
    }

    public function getCatPost($id)
    {
        $category = Category::find($id);
        return view('catposts')->with('category',$category);
    }

    public function getSingle($slug)
    {
        $post = Post::where('slug', '=', $slug)->first();
        $categories = Category::all();
        return view('single')->with('post',$post)->with('categories',$categories);
    }

    public function getSearch(Request $request)
    {
        if($request->has('q')){
            $post = Post::search($request->q)->paginate(3);
        }else{
            $post = Post::orderBy('created_at', 'desc')->paginate(3);
        }
        $categories = Category::all();
        return view('allposts')->with('posts',$post)->with('categories',$categories);
    }

}
