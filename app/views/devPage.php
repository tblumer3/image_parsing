<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>You are Proccessing images on a Development Site!</title>

</head>
<body>
    <h1> Your Input was saved successfully! </h1>
    <h3> However, the image was not moved from aws. Please continue testing below! </h3>
    <div>
        <h3><a href="<?= $url ?>">Continue Parsing Images</a></h3>
    </div>

    <div>
        <?php foreach ($image as $key => $value): ?>
            <p><b><?=$key?></b>:  <?= $value?> </p>
        <?php endforeach; ?>
    </div>
</body>
</html>
