<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web Zone</title>
    <link rel="stylesheet" href="../files/bootstrap.min.css">
    <style>
        .banner-image {
            background-image: url('./pawel-czerwinski-z7prq6BtPE4-unsplash.jpg');
            background-size: cover;
        }

        .navbar .container-fluid .collapse ul li a {
            padding: 10px 20px;
        }
    </style>
</head>

<body>
    <div class="container-fluid p-0">
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3">
            <div class="container-fluid">
                <a href="#" class="navbar-brand">Web Zone</a>
                <button type="button" class="navbar-toggler" data-bs-target="#navbarNav" data-bs-toggle="collapse" aria-controls="navbarNav"
                    aria-expanded="false" aria-label="Toggle Navbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a href="#" class="nav-link active text-white" aria-current="page">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white">Blogs</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center">
            <div class="content text-center display-3 text-white">Web Zone</div>
        </div>
        <div class="row m-5">
            <div class="col m-2 border">
                <h1>Lorem ipsum dolor sit amet.</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium dignissimos natus omnis consequatur!
                    Minima suscipit adipisci corporis sed molestias vitae eveniet iste error id, at dolore atque unde dicta
                    ab similique quam voluptatum explicabo architecto dolorum iure nulla! Ea, nihil!</p>
            </div>
            <div class="col m-2 border">
                <h1>Lorem ipsum dolor sit amet.</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium dignissimos natus omnis consequatur!
                    Minima suscipit adipisci corporis sed molestias vitae eveniet iste error id, at dolore atque unde dicta
                    ab similique quam voluptatum explicabo architecto dolorum iure nulla! Ea, nihil!</p>
            </div>
            <div class="col m-2 border">
                <h1>Lorem ipsum dolor sit amet.</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium dignissimos natus omnis consequatur!
                    Minima suscipit adipisci corporis sed molestias vitae eveniet iste error id, at dolore atque unde dicta
                    ab similique quam voluptatum explicabo architecto dolorum iure nulla! Ea, nihil!</p>
            </div>
        </div>
    </div>
    <script>
        var nav = document.querySelector('nav');

        window.addEventListener('scroll', function () {
            if (window.pageYOffset > 100) {
                nav.classList.add('bg-info', 'shadow')
            }
            else {
                nav.classList.remove('bg-info', 'shadow')
            }
        });
    </script>
    <script src="../files/popper.min.js"></script>
    <script src="../files/bootstrap.min.js"></script>
</body>

</html>