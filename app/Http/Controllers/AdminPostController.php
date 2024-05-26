<?php

namespace App\Http\Controllers;

use App\Models\CategoryPost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AdminPostController extends Controller
{
    //

    public function showIndexPost()
    {
        $posts = Post::paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    //show giao diện add bài viết

    public function showAddPost()
    {
        $categorypost = CategoryPost::all();
        return view('admin.posts.add', compact('categorypost'));
    }


    //viết hàm thêm dữ liệu vào 

    public function addPost(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'id_category' => 'required|exists:categoryposts,id_categorypost', // Assuming the table is category_posts
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required|string',
        ], [
            'avatar.required' => 'Bạn cần phải tải lên một ảnh.',
        ]);
        
        $file = $request->file('avatar'); // Lấy file từ request

        if ($file) {
            $file_name = $file->getClientOriginalName();

            // Kiểm tra xem thư mục public/uploads đã tồn tại chưa
            $directory = 'uploads';
            if (!File::exists($directory)) {
                // Nếu thư mục không tồn tại, hãy tạo nó
                File::makeDirectory($directory);
            }

            // Di chuyển tệp tải lên vào thư mục public/uploads
            $path = $file->move($directory, $file_name);

            // Tạo đường dẫn của ảnh từ thư mục uploads
            $thumbnail = $directory . '/' . $file_name;
        } else {
            $thumbnail = null; // Nếu không có tệp tải lên, sử dụng giá trị null cho thumbnail
        }
        // dd($request->input('category_id'));

        Post::create([
            $id_User = Auth::user()->id,
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'content' => $request->input('content'),
            'id_categorypost' => $request->input('id_category'),
            'image' => $thumbnail,
            'id' => $id_User,
        ]);
        return redirect()->route('showindexpost')->with('status', 'Thêm dữ liệu thành công');
    }

    //hàm xoá

    public function deletePost($id)
    {
        $posts = Post::find($id);
        if (!empty($posts)) {
            $posts->delete();
            return redirect()->route('showindexpost')->with('status', "Bạn xoá thành công");
        }
        return redirect()->route('showindexpost')->with('status', "Bạn xoá chưa thành công");
    }


    public function showUpdatePost($id)
    {
        $posts = Post::find($id);
        $categorypost = CategoryPost::all();
        $selectedCategoryId = $posts->id_categorypost;
        return view('admin.posts.update', compact('posts', 'categorypost', 'selectedCategoryId'));
    }

    public function updateIndexDataPost(Request $request, $id)
    {
        $file = $request->file('avatar'); // Lấy file từ request

        if ($file) {
            $file_name = $file->getClientOriginalName();

            // Kiểm tra xem thư mục public/uploads đã tồn tại chưa
            $directory = 'uploads';
            if (!File::exists($directory)) {
                // Nếu thư mục không tồn tại, hãy tạo nó
                File::makeDirectory($directory);
            }

            // Di chuyển tệp tải lên vào thư mục public/uploads
            $path = $file->move($directory, $file_name);

            // Tạo đường dẫn của ảnh từ thư mục uploads
            $thumbnail = $directory . '/' . $file_name;
        } else {
            $thumbnail = null; // Nếu không có tệp tải lên, sử dụng giá trị null cho thumbnail
        }
        // dd($request->input('id_category'));
        $posts = Post::find($id);
        if (!$posts) {
            return redirect()->route('showindexpost')->withErrors(['status' => 'Thuộc tính không tồn tại']);
        }
        $posts->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'content' => $request->input('content'),
            'id_categorypost' => $request->input('id_category'),
            'image' => $thumbnail,
        ]);
        return redirect()->route('showindexpost')->with('status', 'Sửa thành công rồi nè');
    }
}
