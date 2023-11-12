@extends('layouts.master')

@section('content')
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

    <div class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection


</body>
</html>
