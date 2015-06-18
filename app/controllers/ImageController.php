<?php

class ImageController extends BaseController {

    public function showImage()
    {
        $unprocessed_bucket = "unprocessed-images";
        $aws_base_url = "https://unprocessed-images.s3.amazonaws.com/";
        $s3 = AWS::get('s3');

        $result = $s3->listObjects(array(
            'Bucket' => $unprocessed_bucket,
            'MaxKeys' => 1
        ));

        if (!isset($result['Contents'][0])) {
            return Redirect::to('done');
        }

        $aws_image_location = $result['Contents'][0]['Key'];

        preg_match('/\d+/', $aws_image_location, $matches);
        $image_id = $matches[0];
        $aws_image_id = $aws_image_location;

        $image_url = $aws_base_url . $aws_image_location;

        $url = action('ImageController@processImage');
        return View::make('show', array('url' => $url, 'image_url' => $image_url, 'image_id' => $image_id, "aws_image_id" => $aws_image_id));
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
            return Redirect::to('gimage');
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

        return Redirect::to('/image');
    }

    public function done()
    {
        return "chicken but";
    }

}
