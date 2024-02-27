<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello</h1>
    <br>
    <p>
    <form action="">
        <textarea name="message" id="message" cols="30" rows="10" placeholder="Enter Message..."></textarea>
        <br>
        <button type="submit">Click to copy</button>
        <span style="color:red;" id="msg"></span>
    </form>
    </p>

    <?php 
    
    $url = 'http://localhost/mysql/CRUD/products_display.php/prashant';
    $explode = explode('/', $url);
    echo '<pre>';
    print_r($explode);
    echo '</pre>';

    $name = $explode[6];

    

    ?>

    <script>

        // document.querySelector('button').addEventListener('click', () => {
        //     var val = window.location.href;
        //     let copy = navigator.clipboard.writeText(val);
        //     if (copy) {
        //         console.log('copied');
        //     }else{
        //         console.log('not copied');
        //     }            
        //     document.querySelector('#msg').innerHTML = "Copied";

        // })
    
    </script>
</body>
</html>