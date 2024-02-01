
	<div class="btn-group">
		<button type="button" class="btn btn-success btn-flat dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i> Actions</button>
		<span class="caret"></span>
		<span class="sr-only"></span>
		</button>
		<div class="dropdown-menu" role="menu">

			<a href="{{ url('admin/room/'.$id.'/edit')}}" class="dropdown-item" ><i class="fas fa-edit"></i> Edit</a>
			<a href="{{ url('admin/room/'.$id)}}" class="dropdown-item" ><i class="fa fa-eye"></i> Show</a>
			<div class="dropdown-divider"></div>
			<a data-toggle="modal" data-target="#delete_record{{$id}}" href="#" class="dropdown-item">
				<i class="fas fa-trash"></i>Delete</a>
		</div>
	</div>
    <div class="modal fade" id="delete_record{{$id}}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Room</h4>
                    <button class="close" data-dismiss="modal">x</button>
                </div>
                <div class="modal-body">
                    <i class="fa fa-exclamation-triangle"></i> Do you want to delete this room 
                </div>
                <div class="modal-footer">
                    {!! html()->form('DELETE', route('room.destroy', $id))->open() !!}
                    {!! html()->submit('Remove Room')->class('btn btn-danger btn-flat')!!}
                    <a class="btn btn-default btn-flat" data-dismiss="modal">Cancel</a>
                    {!! html()->form()->close() !!}
                </div>
            </div>
        </div>
    </div>

