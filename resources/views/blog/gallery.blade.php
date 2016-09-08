<!-- Gallery Modal -->
<div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-labelledby="galleryModal">
	<div class="modal-dialog" role="document">
    	<div class="modal-content">
		    <div class="modal-header gallery-header">
		    	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<div class="text-center">
					<h1>{{ trans('blog.gallery') }}</h1>
					<h2 class="modal-title"></h2>
				</div>   
		    </div>
		    <div class="modal-body">   	
		        <img data-id="#" src="#" alt="">
		    </div>
		    <div class="modal-footer">
		        <button type="button" class="btn btn-default pull-left previous">{{ trans('blog.previous') }}</button>
		        <button type="button" class="btn btn-default pull-right next">{{ trans('blog.next') }}</button>
		    </div>
		</div>
	</div>
</div>