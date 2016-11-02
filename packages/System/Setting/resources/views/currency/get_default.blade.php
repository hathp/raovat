<div class="portlet box blue">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-gift"></i> {{ $page_title }} </div>
	</div>
	<div class="portlet-body form">
		<form role="form" class="form-horizontal">
			<div id="notice" style="margin: 4px;">
				Bạn có chắc chắn muốn gán tiền tệ mặc định là:
				<br><strong>{{ $currency->name }}</strong>
				<p><font class="font-red">Chú ý</font>: 
					Khi bạn gán loại tiền tệ này làm mặc định thì <br>tỉ giá của loại này sẽ tự động được gán bằng <b>1.0</b>									
				</p>
			</div>
			<div class="form-actions">
				<div class="row">
					<div class="col-md-12">
						<a href="{{ $currency->setDefaultlink() }}" class="btn green"> Chấp nhận
							<i class="fa fa-edit"></i>
						</a>
						<a href="{{ route($prefix_route_name . 'index') }}" class="btn grey-cascade">
							<i class="fa fa-times"></i> Hủy bỏ 
						</a>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>