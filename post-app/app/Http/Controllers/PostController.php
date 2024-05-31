<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use function Illuminate\Process\tty;

class PostController extends Controller
{
    public function store(StorePostRequest $request)
    {
        $attribute = $request->all();
        $productPicture = $request->file('post_img');
        if ($productPicture)
        {
            $publicPath = public_path('PostPicture');
            $productPictureName = time().'.'.$productPicture->getClientOriginalExtension();
            $productPicture->move($publicPath, $productPictureName);
            $attribute['post_img'] = $productPictureName;
        }
        $product = Post::create($attribute);
        if ($product) {
            $notification = array(
                'message' => 'product store successfully.',
                'alert-type' => 'success',
            );
            return redirect()->route('user.dashboard')->with($notification);
        } else {
            $notification = array(
                'message' => 'something wrong.',
                'alert-type' => 'error',
            );
            return redirect()->route('user.dashboard')->with($notification);
        }

    }

    public function view()
    {
        $posts = Post::where('user_id', auth()->user()->id)->paginate(5);
        return view('user_post', compact('posts'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('user.edit', compact('post'));
    }

    public function update(UpdatePostRequest $request)
    {
        $attribute = $request->all();
        $productPicture = $request->file('post_img');
        if ($productPicture)
        {
            $publicPath = public_path('PostPicture');
            $productPictureName = time().'.'.$productPicture->getClientOriginalExtension();
            $productPicture->move($publicPath, $productPictureName);
            $attribute['post_img'] = $productPictureName;
        }
        $product = Post::create($attribute);
        if ($product) {
            $notification = array(
                'message' => 'product store successfully.',
                'alert-type' => 'success',
            );
            return redirect()->route('user.dashboard')->with($notification);
        } else {
            $notification = array(
                'message' => 'something wrong.',
                'alert-type' => 'error',
            );
            return redirect()->route('user.dashboard')->with($notification);
        }

        return redirect()->route('post.view')->with('success', 'Post updated successfully');
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('post.view')->with('success', 'Post Deleted successfully');
    }
    public function detail($id)
    {
        $post = Post::findOrFail($id);
        $post->views += 1;
        $post->save();
        return view('post',compact('post'));
    }
}
