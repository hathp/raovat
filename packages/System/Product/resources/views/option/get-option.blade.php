<div>
	<div id="option_content" >
		<div class="row ">
			<div class="col-md-12">
				<div class="portlet-body">
					@foreach($product_option as $option)
						<h4>{{ $option->name }}</h4>
						<div class="form-horizontal">
							@foreach($option->option as $value)
								<?php $_param = 'option_'.$value->id; ?>
								<div class="form-group">
									<label  class="col-md-2 control-label">{{ $value->name }}</label>
									<div class="col-md-4">
										<input type="text" class="form-control"  name="{{ $_param }}" value="{{ (isset($value->value)) ? $value->value : '' }}"> </div>
								</div>
							@endforeach
						</div>
						<hr>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>