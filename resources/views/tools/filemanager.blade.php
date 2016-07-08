<!-- FileManager Modal -->
<div class="modal fade" id="fileManagerModal" tabindex="-1" role="dialog" aria-labelledby="fileManagerModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header gallery-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<div class="text-center">
					<h1>FileManager</h1>
					<h2 class="modal-title"></h2>
				</div>
			</div>
			<div class="modal-body filemanager-body">   	
				<div class="container">
					<div class="row text-center">	
						<form action="{{ route("api.fmtouch")}}" class="dropzone">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<input id="pathInput" type="hidden" name="path" value="media">
						</form>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-10 col-xs-12">
						<div class="row fileViewer">			        					
						</div>
					</div>
				</div>

			</div>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn btn-primary pull-left" onclick="Application.FileManager.addImages();">
				Select	
			</a>
			<a href="#" class="btn btn-primary pull-left" onclick="Application.FileManager.up();" >
				Back	
			</a>
			<a href="#" class="btn btn-primary pull-right" onclick="Application.FileManager.getTree();">
				Refresh
			</a>
			<a href="#" class="btn btn-primary pull-right create-directory" onclick="Application.FileManager.mkdir()">
				Create directory	
			</a>
			<input type="text" class="textfield" id="nameFolder" name="nameFolder" placeholder="New Folder">
		</div>
	</div>
</div>
</div>