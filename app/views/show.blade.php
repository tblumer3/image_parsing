@extends('layouts.master')

@section('content')

    <img src="<?= $image_url ?>">
    <div>
        <form method="post" action="<?= $url ?>">
            <input type="hidden" name="image_url" value="<?= $image_url ?>" />
            <input type="hidden" name="image_id" value="<?= $image_id ?>" />
            <input type="hidden" name="aws_image_id" value="<?= $aws_image_id ?>" />

            <input type="checkbox" name="no_action"> No Visible Data</br>
            <!-- if no visible data is selected all other options need to disappear -->

            <!-- <input type="text" name="type" placeholder="Type"></br> -->
            <select name="type">
            <option value="" selected>Vehicle Type</option>
            <option value="sedan">Sedan</option>
            <option value="suv">SUV</option>
            </select></br>
            <input type="text" name="make" placeholder="Make"></br>
            <label for="confidence">How Confident are you regarding the car make?</label></br>
            <input type="radio" name="confidence" value="1">Sorta
            <input type="radio" name="confidence" value="2">Pretty Sure
            <input type="radio" name="confidence" value="3">Certain<br><br>
            <input type="text" name="model" placeholder="Model"></br>
            <input type="text" name="state" placeholder="State"></br>
            <input type="text" name="color" placeholder="Color"></br>
            <label for="commercial">Commercial Vehicle</label></br>
            <input type="radio" name="commercial" value="0">Nope
            <input type="radio" name="commercial" value="1">Yes </br></br>

            <!-- make writing conditionally dependent on it being a commercial vehicle -->
            <input type="text" name="writing" placeholder="Writing"></br>

            <label for="hitch">Tow Hitch Visible</label></br>
            <input type="radio" name="hitch" value="0">Nope
            <input type="radio" name="hitch" value="1">Yes </br></br>
            <button type="submit" class="btn btn-primary">Save Image Ratings</button>
        </form>
    </div>

@stop



