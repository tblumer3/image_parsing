<?php

class ImageController extends BaseController {

    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |   Route::get('/', 'HomeController@showWelcome');
    |
    */

    public function showImage()
    {
        $aws_image_url = null;
        $aws_image_id = null;





        $url = action('ImageController@processImage');
        return View::make('show', array('url' => $url, 'img_url' => $aws_image_url, 'img_id' => $aws_image_id));
    }

    public function processImage()
    {
        $input = Input::all();

        die(json_encode($input));
        
        $image = Image::create($input);
        
        // die(json_encode($image));

        return Redirect::to('/image');
    }

}
