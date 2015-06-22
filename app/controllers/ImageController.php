<?php

class ImageController extends BaseController {

    protected $layout = 'layouts.master';

    public function showImage()
    {
        //Make a class with the select arrays you want then access them statically from the view

        $title = "Rate Images";
        $unprocessed_bucket = "unprocessed-images";
        $aws_base_url = "https://unprocessed-images.s3.amazonaws.com/";
        $s3 = AWS::get('s3');

        $result = $s3->listObjects(array(
            'Bucket' => $unprocessed_bucket,
            'MaxKeys' => 10
        ));
        //if this is empty - go to done - needs to be refactored to account for items in s3lock
        if (!isset($result['Contents'][0])) {
            return Redirect::route('done', array('message' => 'There are NO MORE unprocessed images. Congratulations!'));
        }

        //if an image has been locked more than 10 minutes, delete and let someone else rate
        $ten_min = (time() - 60*10);
        $old_locks = S3lock::where("created_at", '<', date('Y-m-d H:i:s', $ten_min))->delete();

        //This section ensures that we aren't using conflicting images with another user - up to 5 concurrent users at a time
        $aws_key_array = array();
        foreach ($result['Contents'] as $shit => $data) {
            $aws_key_array[$shit] = $data['Key'];
        }

        $in_use_images = S3lock::all(['aws_image_id']);
        $in_use_array = array();
        foreach ($in_use_images as $shit => $object) {
            $in_use_array[] = $object['aws_image_id'];
        }

        //unique images where key is the aws $result index
        $unique_images = array_diff($aws_key_array, $in_use_array);

        if (sizeof($unique_images) == 0) {
            $url = action('gimage');
            return Redirect::route('done', array('message' => 'There are other images to process, however others might be rating them currently. Please try again in a few minutes.', 'url' => $url));
        }

        //Selected image is simply the first image aws returned that was not in image lock.
        $selected_image = $result['Contents'][key($unique_images)];

        // die(json_encode($selected_image));
        //putting selected image into S3lock
        $img = S3lock::create(['aws_image_id' => $selected_image['Key']]);
        $img->save();

        //preparing for view display
        $aws_image_location = $selected_image['Key'];

        preg_match('/\d+/', $aws_image_location, $matches);
        $image_id = $matches[0];
        $aws_image_id = $aws_image_location;

        $image_url = $aws_base_url . $aws_image_location;

        $url = action('ImageController@processImage');
        return View::make('show', array('url' => $url, 'image_url' => $image_url, 'image_id' => $image_id, "aws_image_id" => $aws_image_id, 'title' => $title));
    }

    public function processImage()
    {
        $processed_bucket = "processed-images";
        $unprocessed_bucket = "unprocessed-images";

        $s3 = AWS::get('s3');
        $input = Input::all();

        $image = Image::create($input);
        $success = $image->save();
        if (!$success) {
            return Redirect::route('gimage');
        }

        if (App::environment('local'))
        {
            return Redirect::route('dev_page', array('image' => $image->toArray()));
        }

        $result = $s3->copyObject(array(
            "Bucket" => $processed_bucket,
            "Key" => $input['aws_image_id'],
            "CopySource" => $unprocessed_bucket . "/" . $input['aws_image_id']
        ));

        $s3->deleteObject(array(
            'Bucket' => $unprocessed_bucket,
            'Key' => $input['aws_image_id']
        ));

        $deleted = $S3lock::where('aws_image_id','=', $input['aws_image_id'])->delete();

        return Redirect::to('/image');
    }

    public function done()
    {
        $input = Input::all();
        if ($input['url']) {
            $url = $input['url'];
        } else {
            $url = null;
        }
        return View::make('done', array('message' => $input['message'], 'title' => "You're done!", 'url' => $url));
    }

    public function devPage()
    {
        $input = Input::all();
        $image = $input['image'];
        $url = action('gimage');

        return View::make('devPage', array('url' => $url, 'image' => $image));
    }

}
