<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <title>Success</title>
    <style>
        .container {
            max-width: 400px;
            width: 100%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #ffffff;
            border-radius: 5px 5px 0 0;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .container h1 {
            text-align: center;
            padding: 20px 0;
            border-bottom: 1px solid silver;
        }

        .container p {
            text-align: center;
            padding: 20px;
            font-size: 18px;
            color: #2691d9;
        }

        .container .btn-back {
            display: block;
            width: 100%;
            height: 50px;
            margin-bottom: 10px;
            border: 1px solid;
            background: rgba(250, 97, 91, 255);
            border-radius: 25px;
            font-size: 18px;
            color: #e9f4fb;
            font-weight: 700;
            cursor: pointer;
            outline: none;
            text-decoration: none;
            text-align: center;
            line-height: 50px;
        }

        .container .btn-back:hover {
            border-color: rgba(250, 96, 91, 0.800);
            transition: 0.5s;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Success</h1>
        <p>Thank you for submitting the form!</p>
        <a href="index.php" class="btn-back">Kembali</a>
    </div>
</body>

</html>
