<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Banner;
use Event;
use App\Events\UpdatedBannersEvent;
use App\Http\Requests\BannerRequest;
use DateTime;

class BannersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $banners = Banner::paginate(8);

        return view('admin.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(BannerRequest $request)
    {   
        $dados = $request->only(['image', 'image_mobile', 'subtitle']);

        $dados['active'] = 1;

        $banner = Banner::create(
            $dados
        );

        if ($banner->save()) {
            return redirect()
            ->route('admin.banner.index')
            ->with('status', 'Banner salvo com sucesso!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $banner = Banner::find($id);

        return view('admin.banner.show', compact('banner'));
    }

    public function edit($id)
    {
        $banner = Banner::find($id);

        return view('admin.banner.edit', compact('banner'));
    }

    public function update(BannerRequest $request, $id)
    {
        $banner = Banner::find($id);

        if($request->image != $banner->image && $banner->image) {
            $folder_original = public_path('upload/banners/original/');
            $folder_media = public_path('upload/banners/media/');
            $folder_thumb = public_path('upload/banners/thumb/');

            if (file_exists($folder_original.$banner->image)) {
                unlink($folder_original.$banner->image);
                unlink($folder_media.$banner->image);
                unlink($folder_thumb.$banner->image);
            }
        }

        if($request->image_mobile != $banner->image_mobile && $banner->image_mobile) {
            $folder_original_mobile = public_path('upload/banners-mobile/original/');
            $folder_media_mobile = public_path('upload/banners-mobile/media/');
            $folder_thumb_mobile = public_path('upload/banners-mobile/thumb/');

            if (file_exists($folder_original_mobile.$banner->image_mobile)) {
                unlink($folder_original_mobile.$banner->image_mobile);
                unlink($folder_media_mobile.$banner->image_mobile);
                unlink($folder_thumb_mobile.$banner->image_mobile);
            }
        } 
        
        $banner->fill($request->all());
        
        if ($banner->save()) {

            Event::fire(new UpdatedBannersEvent($banner));
            
            return redirect()
                ->action('Admin\BannersController@index')
                ->with('status', 'Banner salvo com sucesso!');
        }
    }

    public function destroy($id)
    {
        $banner = Banner::find($id);

        $folder_original = public_path('upload/banners/original/');
        $folder_media = public_path('upload/banners/media/');
        $folder_thumb = public_path('upload/banners/thumb/');

        unlink($folder_original.$banner->image);
        unlink($folder_media.$banner->image);
        unlink($folder_thumb.$banner->image);

        if ($banner->delete()) {
            return redirect()
                ->action('Admin\BannersController@index')
                ->with('status', 'Banner removido com sucesso!');
        }
    }

}
