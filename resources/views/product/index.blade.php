<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="csrf-token" content="{{csrf_token()}}" />

    <title>Product</title>

    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap-theme.min.css')}}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        window.BASE_URL = '{{url('/')}}';
    </script>
</head>

    <body>

        <nav class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Products</a>
                </div>
            </div>
        </nav>

        <div id="products" class="container">
            <div class="panel panel-default">
                <div class="panel-header">
                    Add new product
                </div>
                <div class="panel-body">
                    <form data-bind="submit: submit">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Product name</label>
                            </div>
                            <div class="col-md-6">
                                <input data-bind="value: name" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Quantity in stock</label>
                            </div>
                            <div class="col-md-4">
                                <input data-bind="value: quantity" type="number" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Price per item</label>
                            </div>
                            <div class="col-md-4">
                                <input data-bind="value: price" type="string" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="submit" value="Submit" class="btn btn-default">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <table class="table table-bordered table-hover">
                <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Date submited</th>
                    <th>Total value number</th>
                    <th>Ops</th>
                </thead>
                <tbody data-bind="foreach: {data: products, as: 'p'}">
                    <tr>
                        <td data-bind="text: $index"></td>
                        <td data-bind="text: p.name"></td>
                        <td data-bind="text: p.quantity"></td>
                        <td data-bind="text: p.price"></td>
                        <td data-bind="text: p.created_at"></td>
                        <td data-bind="text: p.quantity * p.price"></td>
                        <td data-bind="event: {click: function(){return $root.editProduct(p.product_id) }}">Edit</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr class="active">
                        <td colspan="5"></td>
                        <td data-bind="text: 'Total value:' + totalValue()"></td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
        <script src="{{asset('js/knockout-3.5.0.js')}}"></script>
        <script src="{{asset('js/product.js')}}"></script>
    </body>
    </html>