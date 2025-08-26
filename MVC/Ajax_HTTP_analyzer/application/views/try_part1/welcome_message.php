<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Optional JavaScript -->
        <!-- Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <title>My First BOOTSTRAP</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light ">
            <div class="container-fluid">
                <a href="#" class="navbar-brand"><img src="img/logo.jpg" alt="" width="30" height="24" class="d-inline-block align-text-top"> PETITE REINE CAFE</a>
                <ul class=" navbar-nav">
                    <li class="nav-item"><a class="nav-link active" href="#">Home </a></li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="dropdownlink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Menu <span class="caret"></span></a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownlink">
                            <li><a class="dropdown-item nav-link" href="#">Coffee</a></li>
                            <li><a class="dropdown-item nav-link" href="#">Burger</a></li>
                            <li><a class="dropdown-item nav-link" href="#">Pizza</a></li>
                            <li><a class="dropdown-item nav-link" href="#">Shakes and Frappe</a></li>
                            <li><a class="dropdown-item nav-link" href="#">Meals</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link" href="#">About Us</a></li>
                    <li><a class="nav-link" href="#">Blog</a></li>
                    <li><a class="nav-link" href="#">Cart</a></li>
                </ul>
                <form class="navbar-form navbar-left" action="/action.php">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </nav>
        <div class="container">
            <div class="row p-4 mb-4 text-white rounded bg-dark">
                <div class="col-12">
                    <h1 class="display-4 fst-italic">CODE > DEBUG > DEBUG > COFFEE @ <span class="p-2 fw-bold text-decoration-underline text-secondary">PETITE REINE CAFE</span> > DEBUG > StackOverflow > CODE > DEBUG > SLEEP? > CODE > REPEAT</h1>
                    <p class="lead my-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex omnis assumenda veniam voluptas harum, expedita, neque voluptatem amet perspiciatis necessitatibus eaque est quasi. Accusantium voluptate delectus culpa quibusdam blanditiis est amet ipsum similique fugit. Molestiae incidunt similique, eaque doloribus a veniam dicta sapiente facilis magni consectetur est rem, impedit accusamus.</p>
                </div>
                <div class="col-2">
                    <button class="btn btn-outline-light" type="button"> Read More&#187; </button>
                </div>
            </div>
            <section class="row mb-5">
                <div class="col-md-4">
                    <div class="row border rounded mb-4 ">
                        <div class="col p-4 ">
                            <h1 class="mb-0">COFFEE</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, aut! </p> <button class="btn btn-primary btn-sm" type="button">Order Now</button>
                        </div>
                        <div class="col-auto"><img src="img/coffee.jpg" alt="" width="200" height="250" class=""></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row border rounded mb-4 ">
                        <div class="col p-4 ">
                            <h1 class="mb-0">Pizza</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, aut! </p> <button class="btn btn-primary btn-sm" type="button">Order Now</button>
                        </div>
                        <div class="col-auto"><img src="img/pizza.jpg" alt="" width="200" height="250" class=""></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row border rounded mb-4 ">
                        <div class="col p-4 ">
                            <h1 class="mb-0">Burger</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, aut! </p> <button class="btn btn-primary btn-sm" type="button">Order Now</button>
                        </div>
                        <div class="col-auto"><img src="img/burger.jpg" alt="" width="200" height="250" class=""></div>
                    </div>
                </div>
            </section>
            <section class="mb-5">
                <h3>Testimonials</h3>
                <div class="row">
                    <div class="col-md-3 p-2 bg-dark text-white rounded border border-1  text-center">
                        <h3 class="bg-white text-dark rounded">Monkey D. Luffy</h3>
                        <h4 class="card-title text-center"><img src="img/luffy.jpg" alt="" width="200" height="200" class="rounded-circle">
                        </h4>
                        <p>Ansarap po. Lorem ipsum dolor sit amet.</p>
                        <p class="text-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, temporibus.</p>
                        <button type="submit" class="btn btn-link text-secondary ">more&#187;</button>
                    </div>
                    <div class="col-md-3 p-2 bg-dark text-white rounded border border-1  text-center">
                        <h3 class="bg-white text-dark rounded">Anya Forger</h3>
                        <h4 class="card-title text-center"><img src="img/anya.jpg" alt="" width="200" height="200" class="rounded-circle">
                        </h4>
                        <p>Ansarap po. Lorem ipsum dolor sit amet.</p>
                        <p class="text-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, temporibus.</p>
                        <button type="submit" class="btn btn-link text-secondary ">more&#187;</button>
                    </div>
                    <div class="col-md-3 p-2 bg-dark text-white rounded border border-1  text-center">
                        <h3 class="bg-white text-dark rounded">Saitama</h3>
                        <h4 class="card-title text-center"><img src="img/saitama.png" alt="" width="200" height="200" class="rounded-circle">
                        </h4>
                        <p>Ansarap po. Lorem ipsum dolor sit amet.</p>
                        <p class="text-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, temporibus.</p>
                        <button type="submit" class="btn btn-link text-secondary ">more&#187;</button>
                    </div>
                    <div class="col-md-3 p-2 bg-dark text-white rounded border border-1  text-center">
                        <h3 class="bg-white text-dark rounded">Kurosaki Ichigo</h3>
                        <h4 class="card-title text-center"><img src="img/ichigo.jpg" alt="" width="200" height="200" class="rounded-circle">
                        </h4>
                        <p>Ansarap po. Lorem ipsum dolor sit amet.</p>
                        <p class="text-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, temporibus.</p>
                        <button type="submit" class="btn btn-link text-secondary ">more&#187;</button>
                    </div>
                </div>
            </section>
            <section class="mb-5">
                <h4>Whant to recieve product updates? click Subscribe.</h4>
                <div class="form-group">
                    <label>Name: <input type="text" name="name" class="form-control" placeholder="Enter Name"></label>
                    <p></p>
                    <label> Email Address<input type="email" name="email" class="form-control" placeholder="sample@email.com"></label>
                    <p></p>
                    <button class="btn btn-primary" type="submit">Subscribe</button>
                    <!-- <small class="form-text text-muted">Invalid email address!</small> -->
                </div>
            </section>
        </div>
    </body>
</html>