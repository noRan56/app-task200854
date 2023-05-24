<?php

namespace App\Http\Controllers;
use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>'index','show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $media =Media::paginate(3);
        return view('media.index')->with('media',$media);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('media.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $request->validate([
//            'file' => 'required|image|max:1999',
//        ]);

        $file = $request->file('file');
        $photoName = $file->getClientOriginalName();
        $updatedPhotoName = time() . '_' . $photoName;

        $file->move('photos', $updatedPhotoName);

        $media = new Media;
        $media->name = $updatedPhotoName;
        $media->user_id = auth()->user()->id;
        $media->save();

        // Redirect or perform any other actions after saving the media

        return redirect('/app-try/public/media')->with('success', 'Media uploaded successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $media = Media::findOrFail($id);
        return view('media.show')->with('media',$media);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $media =Media::findOrFail($id);
        unlink('./photos/'.$media->name);
        $media->delete();
        return redirect('/app-try/public/media')->with('delete' , 'Media Deleted');
    }
}
