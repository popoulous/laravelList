@extends('layouts.master')

@section('content')

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div>
        <div class="container">
            <div class="row table-title">
                <div class="col-sm-8">
                    <h2>Feladatok</h2>
                </div>
                <div class="col-sm-4">
                    <a href="#addNewModal" class="btn btn-lg btn-primary add-new" data-bs-toggle="modal"><i class="fa fa-plus"></i> Add New</a>
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

    <!-- Modal HTML -->
    <div id="addNewModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="store" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status" required>
                                <option value="">-- Válasszon --</option>
                                <option value="Fejlesztésre vár">Fejlesztésre vár</option>
                                <option value="Folyamatban">Folyamatban</option>
                                <option value="Kész">Kész</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Example textarea</label>
                            <textarea name="description" class="form-control" id="description" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection


