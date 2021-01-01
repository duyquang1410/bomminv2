<div class="box-footer-redirect">
	<div class="list-item"> 
		

		@if(Auth::user()->role==2)

			<div class="item">
				<a href="{!! route('users.memberMenu') !!}">
					<div class="font-icon"><i class="fa fa-bars" aria-hidden="true"></i></div>
					<div class="title-text">Menu</div>
				</a>
			</div>

		@endif

		@if(Auth::user()->role==1)

				<div class="item">
					<a href="{!! route('dashbroad.index') !!}">
						<div class="font-icon"><i class="fa fa-bars" aria-hidden="true"></i></div>
						<div class="title-text">Tổng quan</div>
					</a>
				</div>

			<div class="item">
				<a href="{!! route('users.listTimeKeeping', ['id'=>0]) !!}">
					<div class="font-icon"><i class="fa fa-calendar-o" aria-hidden="true"></i></div>
					<div class="title-text">Chấm công</div>
				</a>
			</div>

				<div class="item">
					<a href="{!! route('users.singingRoom') !!}">
						<div class="font-icon"><i class="fa fa-calendar-o" aria-hidden="true"></i></div>
						<div class="title-text">Quán hát</div>
					</a>
				</div>

		@endif


	</div>
</div>

<script>
	/* === Khi Scroll  === */
	$(window).scroll(function(){
		if($(this).scrollTop()){
			$('#menuApp').addClass('has-fix-menu-default-type');
		}
		else {
			$('#menuApp').removeClass('has-fix-menu-default-type');
		}
	});
</script>

<style type="text/css">
	.list-item {
		display: inline-flex;
		background: #0090da;
		width: 100%;
		justify-content: space-around;
		padding: 5px;
		position: fixed;
		bottom: 0;
	}
	.list-item .item {
		text-align: center;
		color: #FFF;
	}
	.list-item .item a{
		color: #FFF;
	}
	.list-item .item .title-text{
		font-size: 12px;
		margin-top: 2px;
	}

</style>
</body>
</html>