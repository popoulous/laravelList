<div class="container">

    <div class="row table-title">
        <div class="col-sm-8">
            <h3>Felelősök</h3>
        </div>
        <div class="col-sm-4">
            <a href="#addSwitcher" class="btn btn-lg btn-primary add-new" data-bs-toggle="modal"><i class="fa fa-plus"></i> Add New</a>
        </div>
    </div>

    <table id="AssignedUsers" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="th-sm">Name</th>
            <th class="th-sm">Email</th>
            <th class="th-sm">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users As $key => $value)
            <tr>
                <td>{{$value->name}}</td>
                <td>{{$value->email}}</td>
                <td>
                    <a class="detail" title="" href="todo?id={{$value->id}}"><i class="fas fa-eye"></i></a>
                    <a data-bs-toggle="modal" data-bs-target="#editModal" class="edit" title="" href="id={{$value->id}}&_token={{ csrf_token() }}"><i class="fas fa-edit"></i></a>
                    <a data-bs-toggle="modal" data-bs-target="#deleteConfirmModal" class="delete" title="" href="delete?id={{$value->id}}"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>



