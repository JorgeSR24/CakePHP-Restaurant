<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class='container'>
        <header>
            <h1><?php echo $this->fetch('title'); ?></h1>
        </header>

        <div class="content">
            <?php echo $this->fetch('content'); ?>
        </div>

        <?php echo $this->element('sidebar'); ?>
    </div>
</body>
</html>