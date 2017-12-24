<?php

namespace App\Http\Controllers;
use App\Post;
//use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use Storage;
use Session;
use Image;
use Purifier;
use App\Category;
use App\Tag;
class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        //create and store all db value in a variable
        //$post = Post::all();
        $post = Post::orderBy('id', 'desc')->paginate(3);
        return view('posts.index')->with('posts', $post);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->with('categories', $categories)->with('tags',$tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the data
        $this->validate($request, array(
            'post_title' => 'required|max:255',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id' => 'required|integer',
            'post_description' => 'required',
            'post_image' => 'sometimes|image'
        ));

        //generate auto slug


        //store in the db
        $post = new Post;
        $post->post_title = $request->post_title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->post_description = Purifier::clean($request->post_description);
        //$post->post_image = $request->post_image;

        //save image
        if($request->hasFile('post_image')) {
            $image = $request->file('post_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('post_images/' . $filename);
            Image::make($image)->resize(800,400)->save($location);

            $post->image = $filename;
        }


        $post->save();

        $post->tags()->sync($request->tags, false);
        Session::flash('success','The post is successfully saved!!!');
        //redirect to another
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        //$post_id = $id;
        $post = Post::find($id);

        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find the post in the db and save in a ver
        $post = Post::find($id);

        $categories = Category::all();
        $cats = [];
        foreach ($categories as $category){
            $cats[$category->id] = $category->name;
        }

        $tags = Tag::all();
        $tags2 = [];
        foreach ($tags as $tag){
            $tags2[$tag->id] = $tag->name;
        }

        //return the view and pass in a ver
        return view('posts.edit')->with('post',$post)->with('categories',$cats)->with('tags',$tags2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $post = Post::find($id);

        //checking current slug..it can be done in single block
        if($request->input('slug') == $post->slug){
            $this->validate($request, array(
                'post_title' => 'required|max:255',
                'category_id' => 'required|integer',
                'post_description' => 'required'
            ));
        }else{
            $this->validate($request, array(
                'post_title' => 'required|max:255',
                'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'category_id' => 'required|integer',
                'post_description' => 'required',
                'post_image' => 'image'
            ));
        }

        //store in the db
        $post = Post::find($id);
        $post->post_title = $request->input('post_title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->post_description = Purifier::clean($request->input('post_description'));

        if($request->hasFile('post_image'))
        {
            $image = $request->file('post_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('post_images/' . $filename);
            Image::make($image)->resize(800,400)->save($location);

            $oldImageName = $post->image;
            //update new image
            $post->image = $filename;

            Storage::delete($oldImageName);
        }

        $post->save();

        if(isset($request->tags)){
            $post->tags()->sync($request->tags);
        }else{
            $post->tags()->sync(array());
        }

        Session::flash('success','The post is successfully updated!!!');
        //redirect to another
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);
        $post->tags()->detach();

        Storage::delete($post->image);

        $post->delete();
        Session::flash('success', 'The post is deleted.');
        return redirect()->route('posts.index');

    }
}
