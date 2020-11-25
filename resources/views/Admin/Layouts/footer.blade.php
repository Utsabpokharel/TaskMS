@section('footer')
<!-- start footer -->
<div class="page-footer">
			<div class="page-footer-inner"> 2020 &copy; Task Management System By
				<a href="mailto:email_id" target="_top" class="makerCss">Utsab Pokharel</a>
			</div>
			<div class="scroll-to-top">
				<i class="icon-arrow-up"></i>
			</div>
		</div>
		<!-- end footer -->
	</div>
	<!-- start js include path -->
	<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('assets/plugins/popper/popper.js')}}"></script>
	<script src="{{asset('assets/plugins/jquery-blockui/jquery.blockui.min.js')}}"></script>
	<script src="{{asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
	<!-- bootstrap -->
	<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
	<script src="{{asset('assets/plugins/sparkline/jquery.sparkline.js')}}"></script>
	<script src="http://radixtouch.in/templates/admin/smart/source/assets/js/pages/sparkline/sparkline-data.js"></script>
    <script src="{{asset('assets/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap-datepicker/datepicker-init.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}" charset="UTF-8"></script>
    <script src="{{asset('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker-init.js')}}" charset="UTF-8"></script>
    <script src="{{asset('assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')}}" charset="UTF-8"></script>
    <script src="{{asset('assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker-init.js')}}"
        charset="UTF-8"></script>
	<!-- Common js-->
	<script src="{{asset('assets/js/app.js')}}"></script>
	{{--<script src="{{asset('js/app.js')}}"></script>--}}
	<script src="{{asset('assets/js/layout.js')}}"></script>
	<script src="{{asset('assets/js/theme-color.js')}}"></script>
	<!-- material -->
	<script src="{{asset('assets/plugins/material/material.min.js')}}"></script>
	<!-- chart js -->
	<script src="http://radixtouch.in/templates/admin/smart/source/assets/plugins/chart-js/Chart.bundle.js"></script>
	<script src="{{asset('assets/plugins/chart-js/utils.js')}}"></script>
	<script src="{{asset('assets/js/pages/chart/chartjs/home-data.js')}}"></script>
	<!-- summernote -->
	<script src="http://radixtouch.in/templates/admin/smart/source/assets/plugins/summernote/summernote.js"></script>
	<script src="{{asset('assets/js/pages/summernote/summernote-data.js')}}"></script>
		
	<!-- Data Table -->
	<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js')}}"></script>
	<script src="{{asset('assets/plugins/datatables/export/dataTables.buttons.min.js')}}"></script>
	<script src="{{asset('assets/plugins/datatables/export/buttons.flash.min.js')}}"></script>
	<script src="{{asset('assets/plugins/datatables/export/jszip.min.js')}}"></script>
	<script src="{{asset('assets/plugins/datatables/export/pdfmake.min.js')}}"></script>
	<script src="{{asset('assets/plugins/datatables/export/vfs_fonts.js')}}"></script>
	<script src="{{asset('assets/plugins/datatables/export/buttons.html5.min.js')}}"></script>
	<script src="{{asset('assets/plugins/datatables/export/buttons.print.min.js')}}"></script>
	<script src="{{asset('assets/js/pages/table/table_data.js')}}"></script>
	<!-- select -->
	<script src="assets/plugins/select2/js/select2.js"></script>
    <script src="assets/js/pages/select2/select2-init.js"></script>
	<!-- end js include path -->
	<!-- tags-input -->
	<script src="{{asset('assets/js/bootstrap-tagsinput.js')}}"></script>
    <!-- sweetalert -->
    @include('sweetalert::alert')
</body>

</html>
@endsection