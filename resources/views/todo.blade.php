<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TODO</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
</head>
<style>
    .table-title .add-new {
        float: right;
        height: 30px;
        font-weight: bold;
        font-size: 12px;
        text-shadow: none;
        min-width: 100px;
        border-radius: 50px;
        line-height: 13px;
        margin-top: 8px;
    }
    .table-title .add-new i {
        margin-right: 4px;
    }
</style>
<body>
<div>
    <div class="container">
        <div class="row table-title">
            <div class="col-sm-8">
                <h2>Feladatok</h2>
            </div>
            <div class="col-sm-4">
                <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
            </div>
        </div>
        <table id="Todos" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th class="th-sm">Name</th>
                <th class="th-sm">Description</th>
                <th class="th-sm">Status</th>
                <th class="th-sm">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($todos As $key => $value)
            <tr>
                <td>{{$value->name}}</td>
                <td>{{$value->description}}</td>
                <td>{{$value->status}}</td>
                <td>
                    <a class="edit" title="" data-toggle="tooltip" data-original-title="Edit"><i class="fas fa-edit"></i></a>
                    <a class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <nav>
            <ul class="pagination justify-content-center">


                @for($i = 0; $i < $pagedata['pagescount'];$i++)
                    @if($i+1 < (int)$pagedata['page']+5 && $i+1 > (int)$pagedata['page']-5)
                        @if((int)$pagedata['page'] == $i+1)
                            <li class="page-item active">
                                <a class="page-link" href="{{url('/')}}?page={{$i+1}}" tabindex="-1">{{$i+1}}</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{url('/')}}?page={{$i+1}}" tabindex="-1">{{$i+1}}</a>
                            </li>
                        @endif



                    @endif
                @endfor

            </ul>
        </nav>



    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>
</html>
