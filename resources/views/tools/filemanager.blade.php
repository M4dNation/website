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
		        	<div class="row">
		        		<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
		        			<div class="row fileViewer">			        					
		        			</div>
		        		</div>
		        	</div>
		        	<div class="row">	
						<div class="text-center">	
							<form action="{{ route("api.fmtouch")}}" class="dropzone">
								<input type="hidden" name="_token" value="{{csrf_token()}}">
							</form
						</div>
		        	</div>
		        </div>
		    </div>
		    <div class="modal-footer">
		    	<a href="#" class="btn btn-primary pull-left">
		    		Select	
		    	</a>
		    	<a href="#" class="btn btn-primary pull-left" onclick="Application.FileManager.up();" >
		    		Back	
		    	</a>
		    	<a href="#" class="btn btn-primary pull-right">
		    		Browse	
		    	</a>
		    	<a href="#" class="btn btn-primary pull-left" onclick="Application.FileManager.getTree();">
					Refresh
		    	</a>
		    	<a href="#" class="btn btn-primary pull-right create-directory" onclick="Application.FileManager.mkdir()">
		    		Create directory	
		    	</a>
		    	<input type="text" id="nameFolder" name="nameFolder">
		    </div>
		</div>
	</div>
</div>