<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../files/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="display-3">My
            <span class="small mark">Website</span> Demo</div>
        <div class="row row-cols-sm-2 row-col-md-3 row-cols-lg-4 justify-content-center text-center py-3">
            <!-- <div class="callout callout-info border-left-color"><b>This is an info callout.</b> Example text to show it in action.</div> -->
            <div class="col bg-secondary text-white py-3">
                Just some
                <i>random</i> text.
            </div>
            <div class="col bg-primary text-white py-3">
                Just some
                <i>random</i> text.
            </div>
            <div class="col bg-warning text-white py-3">
                Just some
                <i>random</i> text.
            </div>
        </div>
        <div class="row text-center py-3">
            <div class="col bg-secondary text-white py-3">
                Just some
                <i>random</i> text.
            </div>
            <div class="col-6 bg-primary text-white py-3">
                Just some
                <i>random</i> text.
            </div>
            <div class="col bg-warning text-white py-3">
                Just some
                <i>random</i> text.
            </div>
        </div>
        <p class="blockquote-footer">From WWF's Website</p>
        <div class="row justify-content-md-center">
            <div class="col py-3 col-lg-2 border">
                1 of 3
            </div>
            <div class="col-md-auto py-3 border">
                Variable width content
            </div>
            <div class="col col-lg-2 py-3 border">
                3 of 3
            </div>
        </div>
        <div class="row">
            <div class="col py-3 border">
                1 of 3
            </div>
            <div class="col-md-auto py-3 border">
                Variable width content
            </div>
            <div class="col col-lg-2 py-3 border">
                3 of 3
            </div>
        </div>
        <div class="row justify-content-start">
            <div class="col-4 border bg-light my-3 py-3">Some Text</div>
            <div class="col-4 border bg-light my-3 py-3">Some Text</div>
        </div>
        <div class="row justify-content-center">
            <div class="col-4 border bg-light my-3 py-3">Some Text</div>
            <div class="col-4 border bg-light my-3 py-3">Some Text</div>
        </div>
        <div class="row justify-content-end">
            <div class="col-4 border bg-light my-3 py-3">Some Text</div>
            <div class="col-4 border bg-light my-3 py-3">Some Text</div>
        </div>
        <div class="row justify-content-around">
            <div class="col-4 border bg-light my-3 py-3">Some Text</div>
            <div class="col-4 border bg-light my-3 py-3">Some Text</div>
        </div>
        <div class="row justify-content-between">
            <div class="col-4 border bg-light my-3 py-3">Some Text</div>
            <div class="col-4 border bg-light my-3 py-3">Some Text</div>
        </div>
        <div class="row justify-content-evenly">
            <div class="col-4 border bg-light my-3 py-3">Some Text</div>
            <div class="col-4 border bg-light my-3 py-3">Some Text</div>
        </div>
        <hr class="border border-2 border-success opacity-50">
        <h1>This is a list.</h1>
        <ul class="list-inline">
            <li class="list-inline-item">It appears completely unstyled and inline.</li>
            <li class="list-inline-item">Structurally, it's still a list.</li>
            <li class="list-inline-item">However, this style only applies to immediate child elements.</li>
            <li>Nested lists:
                <ul class="list-inline">
                    <li class="list-inline-item">are unaffected by this style</li>
                    <li class="list-inline-item">will still show a bullet</li>
                    <li class="list-inline-item">and have appropriate left margin</li>
                </ul>
            </li>
            <li class="list-inline-item">This may still come in handy in some situations.</li>
        </ul>
        <div class="row row-cols-3">
            <div class="col">
                <img src="../images/placeholder.jpg" class="img-fluid rounded" alt="placeholder">
            </div>
            <div class="col">
                <img src="../images/placeholder.jpg" class="img-fluid rounded-circle" alt="placeholder">
            </div>
            <div class="col">
                <img src="../images/placeholder.jpg" class="img-fluid img-thumbnail" alt="placeholder">
            </div>
        </div>
        <!-- <div class="row d-block"> -->
        <div>
            <img src="../images/placeholder.jpg" class="img-fluid rounded float-start" alt="placeholder">
            <img src="../images/placeholder.jpg" class="img-fluid rounded float-end" alt="placeholder">
        </div>
        <!-- </div> -->
        <h1 class="text-primary" style="clear:both">This is a table.</h1>
        <div class="row justify-content-center">
            <div class="col-8 table-responsive">
                <table class="table table-bordered table-striped table-hover table-secondary border-light">
                    <thead>
                        <tr class="table-success">
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                            <th scope="col">Handle</th>
                            <th scope="col">Handle</th>
                            <th scope="col">Handle</th>
                            <th scope="col">Handle</th>
                            <th scope="col">Handle</th>
                            <th scope="col">Handle</th>
                            <th scope="col">Handle</th>
                            <th scope="col">Handle</th>
                            <th scope="col">Handle</th>
                            <th scope="col">Handle</th>
                            <th scope="col">Handle</th>
                            <th scope="col">Handle</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">6</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">7</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col10 my-3 bg-light">
                <form>
                    <div class="row">
                        <div class="col-3 py-1">
                            <label for="myName" class="form-label">Name</label>
                            <input type="text" id="myName" class="form-control">
                        </div>
                        <div class="col-3 py-1">
                            <label for="myEmail" class="form-label">Email</label>
                            <input type="email" id="myEmail" class="form-control" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="col-3 py-1">
                            <label for="myPassword" class="form-label">Password</label>
                            <input type="password" id="myPassword" class="form-control">
                        </div>
                        <div class="col-3 py-1">
                            <label for="myCountry" class="form-label">Country</label>
                            <input type="text" id="myCountry" class="form-control" placeholder="Pakistan" disabled>
                        </div>
                        <div class="col-3 py-1">
                            <label for="myCNIC" class="form-label">CNIC</label>
                            <input type="text" id="myCNIC" class="form-control">
                        </div>
                        <div class="col-3 py-1">
                            <label for="myPhone" class="form-label">Phone #</label>
                            <input type="text" id="myPhone" class="form-control">
                        </div>
                        <div class="col-3 py-1">
                            <label for="myCity" class="form-label">City</label>
                            <select class="form-select" id="myCity" aria-label="Default select example">
                                <option selected>Faisalabad</option>
                                <option value="Lahore">Lahore</option>
                                <option value="Karachi">Karachi</option>
                                <option value="Multan">Multan</option>
                            </select>
                        </div>
                        <div class="col-3 py-1">
                            <label for="myCourse" class="form-label-plaintext">Course</label>
                            <input type="text" id="myCourse" readonly class="form-control" value="Web Development">
                        </div>
                        <div class="col-4 py-1">
                            <label for="mypic" class="form-label">Attach your profile pic</label>
                            <input class="form-control" id="mypic" type=file></input>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-4 py-1">
                            <label for="desc" class="form-label">Description:</label>
                            <textarea class="form-control" rows="5" id="desc" name="text" placeholder="Describe about yourself..."></textarea>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-2 mx-1 py-1 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Regular Student?</label>
                        </div>
                        <div class="col-2 mx-1 py-1 form-check form-switch">
                            <input type="checkbox" role="switch" class="form-check-input" id="exampleCheck2">
                            <label class="form-check-label" for="exampleCheck2">Switch</label>
                        </div>
                        <div class="w-100"></div>
                        <div class="col py-1">
                            <button type="reset" class="btn btn-outline-primary m-2">Reset</button>
                            <button type="submit" class="btn btn-primary m-2">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../files/popper.min.js"></script>
    <script src="../files/bootstrap.min.js"></script>
</body>

</html>