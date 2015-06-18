<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Image Processing</title>
</head>
<body>
    <img src="<?= $image_url ?>">
    <div>
        <form method="post" action="<?= $url ?>">
            <input type="hidden" name="image_url" value="<?= $image_url ?>" />
            <input type="hidden" name="image_id" value="<?= $image_id ?>" />
            <input type="hidden" name="aws_image_id" value="<?= $aws_image_id ?>" />
            <input type="text" name="make" placeholder="Make"></br>
            <input type="text" name="model" placeholder="Model"></br>
            <input type="text" name="state" placeholder="State"></br>
            <input type="text" name="color" placeholder="Color"></br>
            <input type="text" name="writing" placeholder="Writing"></br>
            <input type="checkbox" name="commercial" value="true"> Commercial Vehicle<br>
            <input type="checkbox" name="hitch" value="true"> Tow Hitch Visible<br>
            <button type="submit" class="btn btn-primary">Save Image Ratings</button>
        </form>
    </div>
</body>
</html>

