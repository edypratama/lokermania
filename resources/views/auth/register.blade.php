<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Register</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font: 16px Arial;
        }

        /*the container must be positioned relative:*/
        .autocomplete {
            position: relative;
            display: inline-block;
        }

        input {
            border: 1px solid transparent;
            background-color: #f1f1f1;
            padding: 10px;
            font-size: 16px;
        }

        input[type=text] {
            background-color: #f1f1f1;
            width: 100%;
        }

        input[type=submit] {
            background-color: DodgerBlue;
            color: #fff;
            cursor: pointer;
        }

        .autocomplete-items {
            position: absolute;
            border: 1px solid #d4d4d4;
            border-bottom: none;
            border-top: none;
            z-index: 99;
            /*position the autocomplete items to be the same width as the container:*/
            top: 100%;
            left: 0;
            right: 0;
        }

        .autocomplete-items div {
            padding: 10px;
            cursor: pointer;
            background-color: #fff;
            border-bottom: 1px solid #d4d4d4;
        }

        /*when hovering an item:*/
        .autocomplete-items div:hover {
            background-color: #e9e9e9;
        }

        /*when navigating through the items using the arrow keys:*/
        .autocomplete-active {
            background-color: DodgerBlue !important;
            color: #ffffff;
        }
    </style>
</head>

<body class=" landing-header">
    <div class="container-fluid">
        <div class="vh-100">
            <div class="row h-100 d-flex justify-content-center align-items-center">
                <div class="col d-flex justify-content-center align-items-center">
                    <img class="w-75" src="../assets/vector/vektor-login-register.png" alt="">
                </div>
                <div class="col h-100 bg-white d-flex flex-column overflow-y-auto overflow-x-hidden">
                    <h2 class="text-center" style="margin-top: 100px;">Create Account</h2>
                    <div class="border rounded-4 m-5 p-4">
                        <form class="mb-3 p-3" method="POST" autocomplete="off" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="companyname" class="form-label">
                                    <h5 class="px-2 mt-3">Company Name</h5 class="px-2 mt-3">
                                </label>
                                <input type="text" class="form-control" id="companyname" aria-describedby="nameHelp"
                                    placeholder="PT Permai Indah" @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="companyaddress" class="form-label">
                                    <h5 class="px-2 mt-3">Company Address</h5 class="px-2 mt-3">
                                </label>
                                <input type="text" class="form-control" id="companyaddress"
                                    aria-describedby="addressHelp" placeholder="Jalan Citra Mania" name="address"
                                    value="{{ old('address') }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">
                                    <h5 class="px-2 mt-3">Email address</h5 class="px-2 mt-3">
                                </label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="example@gmail.com" name="email"
                                    value="{{ old('email') }}" required autocomplete="email">
                            </div>
                            <div class="mb-3">
                                <label for="phone"class="form-label">
                                    <h5 class="px-2 mt-3">Phone</h5 class="px-2 mt-3">
                                </label>
                                <input id="phone" type="text" class="form-control" name="phone"
                                    value="{{ old('phone') }}" placeholder="123-456-789">
                            </div>
                            <div class="mb-3">
                                <div class="autocomplete" style="width:450px;">
                                    <label for="phone"class="form-label">
                                        <h5 class="px-2 mt-3">Provinsi</h5 class="px-2 mt-3">
                                    </label>
                                    <input id="myInput" class="form-control" type="text" name="provinsi"
                                        placeholder="Provinsi">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">
                                    <h5 class="px-2 mt-3">Description</h5 class="px-2 mt-3">
                                </label>
                                <textarea id="description" type="text" class="form-control" name="description"
                                    placeholder="Your Company Description"> {{ old('description') }} </textarea>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">
                                    <h5 class="px-2 mt-3">Password</h5 class="px-2 mt-3">
                                </label>
                                <input type="password" class="form-control" name="password"
                                    id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">
                                    <h5 class="px-2 mt-3">Verify Password</h5 class="px-2 mt-3">
                                </label>
                                <input type="password" class="form-control" name="password_confirmation"
                                    id="exampleInputPassword1" placeholder="Verify Password">
                            </div>
                            <button type="submit" class="btn btn-primary rounded-pill mt-4"
                                style="padding: 10px 40px;">{{ __('Register') }}</button>
                        </form>
                        <small>Have an account?
                            @if (Route::has('login'))
                                <a href="{{ route('login') }}">{{ __('Login') }}</a>
                            @endif
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        function autocomplete(inp, arr) {
            /*the autocomplete function takes two arguments,
            the text field element and an array of possible autocompleted values:*/
            var currentFocus;
            /*execute a function when someone writes in the text field:*/
            inp.addEventListener("input", function(e) {
                var a,
                    b,
                    i,
                    val = this.value;
                /close any already open lists of autocompleted values/
                closeAllLists();
                if (!val) {
                    return false;
                }
                currentFocus = -1;
                /*create a DIV element that will contain the items (values):*/
                a = document.createElement("DIV");
                a.setAttribute("id", this.id + "autocomplete-list");
                a.setAttribute("class", "autocomplete-items");
                /*append the DIV element as a child of the autocomplete container:*/
                this.parentNode.appendChild(a);
                /*for each item in the array...*/
                for (i = 0; i < arr.length; i++) {
                    /*check if the item starts with the same letters as the text field value:*/
                    if (
                        arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()
                    ) {
                        /*create a DIV element for each matching element:*/
                        b = document.createElement("DIV");
                        /*make the matching letters bold:*/
                        b.innerHTML =
                            "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                        b.innerHTML += arr[i].substr(val.length);
                        /*insert a input field that will hold the current array item's value:*/
                        b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                        /*execute a function when someone clicks on the item value (DIV element):*/
                        b.addEventListener("click", function(e) {
                            /*insert the value for the autocomplete text field:*/
                            inp.value = this.getElementsByTagName("input")[0].value;
                            /*close the list of autocompleted values,
                            (or any other open lists of autocompleted values:*/
                            closeAllLists();
                        });
                        a.appendChild(b);
                    }
                }
            });
            /*execute a function presses a key on the keyboard:*/
            inp.addEventListener("keydown", function(e) {
                var x = document.getElementById(this.id + "autocomplete-list");
                if (x) x = x.getElementsByTagName("div");
                if (e.keyCode == 40) {
                    /*If the arrow DOWN key is pressed,
                      increase the currentFocus variable:*/
                    currentFocus++;
                    /*and and make the current item more visible:*/
                    addActive(x);
                } else if (e.keyCode == 38) {
                    //up
                    /*If the arrow UP key is pressed,
                      decrease the currentFocus variable:*/
                    currentFocus--;
                    /*and and make the current item more visible:*/
                    addActive(x);
                } else if (e.keyCode == 13) {
                    /*If the ENTER key is pressed, prevent the form from being submitted,*/
                    e.preventDefault();
                    if (currentFocus > -1) {
                        /*and simulate a click on the "active" item:*/
                        if (x) x[currentFocus].click();
                    }
                }
            });

            function addActive(x) {
                /*a function to classify an item as "active":*/
                if (!x) return false;
                /*start by removing the "active" class on all items:*/
                removeActive(x);
                if (currentFocus >= x.length) currentFocus = 0;
                if (currentFocus < 0) currentFocus = x.length - 1;
                /*add class "autocomplete-active":*/
                x[currentFocus].classList.add("autocomplete-active");
            }

            function removeActive(x) {
                /*a function to remove the "active" class from all autocomplete items:*/
                for (var i = 0; i < x.length; i++) {
                    x[i].classList.remove("autocomplete-active");
                }
            }

            function closeAllLists(elmnt) {
                /*close all autocomplete lists in the document,
                  except the one passed as an argument:*/
                var x = document.getElementsByClassName("autocomplete-items");
                for (var i = 0; i < x.length; i++) {
                    if (elmnt != x[i] && elmnt != inp) {
                        x[i].parentNode.removeChild(x[i]);
                    }
                }
            }
            /*execute a function when someone clicks in the document:*/
            document.addEventListener("click", function(e) {
                closeAllLists(e.target);
            });
        }

        /*An array containing all the country names in the world:*/
        var provinsi = [
            "Aceh",
            "Sumatra Utara",
            "Sumatra Selaten",
            "Sumatra Barat",
            "Benkulu",
            "Riau",
            "Kepulauan Riau",
            "Jambi",
            "Lampung",
            "Bangka Belitung",
            "Kalimantan Timur",
            "Kalimantan Tengah",
            "Kalimantan Barat",
            "Kalimantan Selatan",
            "Kalimantan Utara",
            "DKI Jakarta",
            "Banten",
            "Jawa Barat",
            "Jawa Tengah",
            "Jawa Timur",
            "Yogjakarta",
            "Bali",
            "Nusa Tenggara Barat",
            "Nusa Tenggara Timur",
            "Sulawesi Utara",
            "Sulawesi Barat",
            "Sulawesi Tengah",
            "Sulawesi Tenggara",
            "Sulawesi Selatan",
            "Gorontalo",
            "Maluku",
            "Maluku Utara",
            "Papua",
            "Papua Barat",
            "Papua Tengah",
            "Papua Selatan",
            "Papua Pegunungan"
        ];

        /*initiate the autocomplete function on the "myInput" element, and pass along the provinsi array as possible autocomplete values:*/
        autocomplete(document.getElementById("myInput"), provinsi);
    </script>

</body>

</html>
