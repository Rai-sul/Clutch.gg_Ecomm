<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


        <!-- Image gallery -->
        <div>
            
            @foreach($images as $image)
                <img src="{{ asset($image->image_path) }}" style="width: 150px; margin-right: 10px;">
            @endforeach
        </div>

    



    
</body>
</html>