<div class="container">

    <div class="row table-title">
        <div class="col-sm-12">
            <h3>Felelősök</h3>
        </div>
    </div>

    <table id="AssignedUsers" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="th-sm">Name</th>
            <th class="th-sm">Email</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users As $key => $value)
            <tr>
                <td>{{$value->name}}</td>
                <td>{{$value->email}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>



