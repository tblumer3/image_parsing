<?php

class DataController extends BaseController {

    public function csvDownload()
    {
        // output headers so that the file is downloaded rather than displayed
        $dump_number = 10;

        // $headers = [
        //     'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
        //     'Content-type'        => 'application/force-download',
        //     'Content-Disposition' => 'attachment; filename=datadump.csv'
        // ];

        header("Content-Type: text/csv; charset=utf-8");
        header("Content-Disposition: attachment; filename=". $dump_number ."datadump.csv");

        $results = Image::all()->take($dump_number);

        $FH = fopen('php://output', 'w');

        fputcsv($FH,["No Action", "Make", "Model", "Confidence", "Type", "State", "Color", "Commercial", "Hitch", "Image URL", "Created At"]);

        foreach ($results as $iterator => $object) {
            $image_data = $object->toArray();
            fputcsv($FH, [$image_data['no_action'],$image_data['make'], $image_data['model'],$image_data['confidence'], $image_data['type'], $image_data['state'],$image_data['color'], $image_data['commercial'], $image_data['hitch'], $image_data['image_url'], $image_data['created_at']]);
        }
        fputcsv($FH,[""]);
        fclose($FH);
    }

    public function test()
    {
        $results = Image::all()->take(10);

        return View::make('test', array('results' => $results, 'title' => "Test images"));
    }

}
