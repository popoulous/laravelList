@extends('layouts.master')

@section('nav')
<div class="row">
    <div class="col-sm-12">
        <h3>List</h3>
    </div>
</div>
@endsection

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
                    <th class="th-sm">Status</th>
                    <th class="th-sm">User count</th>
                    <th class="th-sm">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($todos As $key => $value)
                    <tr>
                        <td>{{$value->name}}</td>
                        <td>{{$value->status}}</td>
                        <td>{{$value->count}}</td>
                        <td>
                            <a class="detail" title="" href="todo?id={{$value->id}}"><i class="fas fa-eye"></i></a>
                            <a data-bs-toggle="modal" data-bs-target="#editModal" class="edit" title="" href="id={{$value->id}}&_token={{ csrf_token() }}"><i class="fas fa-edit"></i></a>
                            <a data-bs-toggle="modal" data-bs-target="#deleteConfirmModal" class="delete" title="" href="delete?id={{$value->id}}"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <nav>
                <ul class="pagination justify-content-center">
                    @if((int)$pagedata['page'] > 1)
                        <li class="page-item">
                            <a class="page-link" href="{{url('/')}}?page={{(int)$pagedata['page']-1}}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                    @endif

                    @for($i = 0; $i < $pagedata['pagescount'];$i++)
                        @if((int)$pagedata['page'] == $i+1)
                            <li class="page-item active">
                                <a class="page-link" href="{{url('/')}}?page={{$i+1}}" tabindex="-1">{{$i+1}}</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{url('/')}}?page={{$i+1}}" tabindex="-1">{{$i+1}}</a>
                            </li>
                        @endif
                    @endfor

                    @if((int)$pagedata['page'] < (int)$pagedata['pagescount'])
                        <li class="page-item">
                            <a class="page-link" href="{{url('/')}}?page={{(int)$pagedata['page']+1}}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    @endif

                </ul>
            </nav>



        </div>

    </div>

    <!-- New Record Modal HTML -->
    <div id="addNewModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="store" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="assigned_users" value="">
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
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" id="description" rows="3" required></textarea>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4>Felelősök</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-striped table-bordered table-sm AssignedUsers" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th class="th-sm">Name</th>
                                        <th class="th-sm">Email</th>
                                        <th class="th-sm">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <button data-bs-toggle="modal" data-bs-target="#selectUserModal" type="button" class="btn btn-primary select_exist_user">Select exist user</button>
                                <button data-bs-toggle="modal" data-bs-target="#addUserModal" type="button" class="btn btn-primary add_new_user">Add new user</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary cancel" data-bs-dismiss="modal">Cancel</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- New Record Modal HTML -->
    <div id="addUserModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="useradd" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title">Add User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">email:</label>
                            <input type="email" name="email" class="form-control" id="email" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary cancel" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- New Record Modal HTML -->
    <div id="selectUserModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="userselect" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title">Select User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-striped table-bordered table-sm AssignedUsers" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th class="th-sm">#</th>
                                        <th class="th-sm">Name</th>
                                        <th class="th-sm">Email</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary cancel" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Record Modal HTML -->
    <div id="editModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="edit" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="id" value="">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="assigned_users" value="">
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
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" id="description" rows="3" required></textarea>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4>Felelősök</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-striped table-bordered table-sm AssignedUsers" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th class="th-sm">Name</th>
                                        <th class="th-sm">Email</th>
                                        <th class="th-sm">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <button data-bs-toggle="modal" data-bs-target="#selectUserModal" type="button" class="btn btn-primary select_exist_user">Select exist user</button>
                                <button data-bs-toggle="modal" data-bs-target="#addUserModal" type="button" class="btn btn-primary add_new_user">Add new user</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary cancel" data-bs-dismiss="modal">Cancel</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Modal HTML -->
    <div id="deleteConfirmModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <h6>Really?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a id="delete_href" href="" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>


@endsection


