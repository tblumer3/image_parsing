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
                <option value="sedan4">Sedan - 4 Door</option>
                <option value="sedan3">Sedan - 2 Door</option>
                <option value="suv">SUV</option>
                <option value="pickup">Pick-up Truck</option>
                <option value="station wagon">Station Wagon</option>
                <option value="minivan">Minivan</option>
                <option value="can">Van</option>
                <option value="flatbed">Flatbed Truck</option>
                <option value="boxtruck">Box Truck</option>
            </select></br>
            <select name="make">
                <option value="" selected>Make</option>
                <option value="Ford">Ford</option>
                <option value="GMC">GMC</option>
                <option value="Honda">Honda</option>
                <option value="Hyundai">Hyundai</option>
                <option value="Infiniti">Infiniti</option>
                <option value="Isuzu">Isuzu</option>
                <option value="Jaguar">Jaguar</option>
                <option value="Jeep">Jeep</option>
                <option value="Kia">Kia</option>
                <option value="Land Rover">Land Rover</option>
                <option value="Lexus">Lexus</option>
                <option value="Lincoln">Lincoln</option>
                <option value="Mazda">Mazda</option>
                <option value="Mercedes">Mercedes</option>
                <option value="Mercury">Mercury</option>
                <option value="Mini">Mini</option>
                <option value="Mitsubishi">Mitsubishi</option>
                <option value="Nissan">Nissan</option>
                <option value="Oldsmobile/Buick">Oldsmobile/Buick</option>
                <option value="Pontiac">Pontiac</option>
                <option value="Porsche">Porsche</option>
                <option value="Saab">Saab</option>
                <option value="Saturn">Saturn</option>
                <option value="Scion">Scion</option>
                <option value="Subaru">Subaru</option>
                <option value="Suzuki">Suzuki</option>
                <option value="Toyota">Toyota</option>
                <option value="Volkswagen">Volkswagen</option>
                <option value="Volvo">Volvo</option>
            </select></br>
            <label for="confidence">How Confident are you regarding the car make?</label></br>
            <input type="radio" name="confidence" value="1">Sorta
            <input type="radio" name="confidence" value="2">Pretty Sure
            <input type="radio" name="confidence" value="3">Certain<br><br>
            <input type="text" name="model" placeholder="Model"></br>
            <input type="text" name="color" placeholder="Color"></br>
            <select name="state">
                <option value="" selected>State</option>
                <option value="AL">Alabama</option>
                <option value="AK">Alaska</option>
                <option value="AZ">Arizona</option>
                <option value="AR">Arkansas</option>
                <option value="CA">California</option>
                <option value="CO">Colorado</option>
                <option value="CT">Connecticut</option>
                <option value="DE">Delaware</option>
                <option value="DC">District Of Columbia</option>
                <option value="FL">Florida</option>
                <option value="GA">Georgia</option>
                <option value="HI">Hawaii</option>
                <option value="ID">Idaho</option>
                <option value="IL">Illinois</option>
                <option value="IN">Indiana</option>
                <option value="IA">Iowa</option>
                <option value="KS">Kansas</option>
                <option value="KY">Kentucky</option>
                <option value="LA">Louisiana</option>
                <option value="ME">Maine</option>
                <option value="MD">Maryland</option>
                <option value="MA">Massachusetts</option>
                <option value="MI">Michigan</option>
                <option value="MN">Minnesota</option>
                <option value="MS">Mississippi</option>
                <option value="MO">Missouri</option>
                <option value="MT">Montana</option>
                <option value="NE">Nebraska</option>
                <option value="NV">Nevada</option>
                <option value="NH">New Hampshire</option>
                <option value="NJ">New Jersey</option>
                <option value="NM">New Mexico</option>
                <option value="NY">New York</option>
                <option value="NC">North Carolina</option>
                <option value="ND">North Dakota</option>
                <option value="OH">Ohio</option>
                <option value="OK">Oklahoma</option>
                <option value="OR">Oregon</option>
                <option value="PA">Pennsylvania</option>
                <option value="RI">Rhode Island</option>
                <option value="SC">South Carolina</option>
                <option value="SD">South Dakota</option>
                <option value="TN">Tennessee</option>
                <option value="TX">Texas</option>
                <option value="UT">Utah</option>
                <option value="VT">Vermont</option>
                <option value="VA">Virginia</option>
                <option value="WA">Washington</option>
                <option value="WV">West Virginia</option>
                <option value="WI">Wisconsin</option>
                <option value="WY">Wyoming</option>
            </select></br>
            <label for="commercial">Commercial Vehicle</label></br>
            <input type="radio" name="commercial" value="0">Nope
            <input type="radio" name="commercial" value="1">Yes </br>

            <!-- make writing conditionally dependent on it being a commercial vehicle -->
            <label for="hitch">Tow Hitch Visible</label></br>
            <input type="radio" name="hitch" value="0">Nope
            <input type="radio" name="hitch" value="1">Yes </br></br>
            <input type="text" name="writing" placeholder="Writing"></br></br>

            <button type="submit" class="btn btn-primary">Save Image Ratings</button>
        </form>
    </div>

@stop



