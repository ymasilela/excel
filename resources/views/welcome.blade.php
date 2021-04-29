<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <link href="css/app.css" rel="stylesheet" type="text/css">

        <style>
            body{
                padding-top: 40px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>
                Laravel 5.6 and maatwebsite/excel 3.0 Export demo
            </h1>

             <div class="form-group">
                 <a href="#" class="btn btn-success">Export to .xlsx</a>
                 <a href="#" class="btn btn-primary">Export to .xls</a>
             </div>

             <table class="table table-striped table-bordered ">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Body</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($emp as $emp1)
                    <tr>
                    <td>{{ $emp1->id }}</td>
                    <td>{{ $emp1->name }}</td>
                    <td>{{ $emp1->skills }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $emp->links() }}

        </div>
    </body>
</html>