<html>

<head>
	<link href="<?php echo base_url('assets/css/overallcss.css'); ?>" rel="stylesheet" type="text/css"  />
  <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" />
	<style>
		body {
			background: url(http://localhost/veterinaryv2/assets/img/dog.jpg) no-repeat center center fixed; 
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
		}
		
		.box {
			width : 440px;
			height : 550px;
			background-color : #EAEDED;
			opacity: 0.9;
			border : none;
			float: left;
			margin-left: 32%;
			margin-top : 60px;
			padding-top : 15px;
			padding-left : 40px;
			padding-right : 40px;
		}
		
		.input-underline {
			background : 0 0;
			box-shadow : none;
			border: 1px solid #3498DB;
			border-radius : 0;
			width : 100%;
			color : #000000;
		}

		.input-underline:focus {
			border-bottom : 2px solid #3498DB;
			box-shadow : none;
		}
		.lgbtn {
			border-radius : 0;
			background-color : #3498DB;
			width : 370px;
			color : white;
			opacity: 1;
		}
		
		.logo{
			height : 170px;
			width : 160px;
			float: left;
			margin-left: 110px;
		}
		
		.lgntitle{
			font-family: 'Poppins';
			color: #3498DB;
			font-size: 25px;
			float:left;
			margin-left: 28px;
			margin-bottom: 35px;
		}
	</style>
</head>

<body>
<div class="container-fluid">
	<div class="box">
		
		<form action="<?php echo base_url('login'); ?>" method="post">
			<div class="form-group">
			<img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="logo" class="img-reponsive logo " /> 
			<p class="lgntitle "> Deloso Veterinary Clinic </p>
			</div>
			
			<div class="form-group"> 
				<input align="center" id="uname" type="text" class="form-control input-underline" name="uname" placeholder="User Name" value="<?php echo set_value('uname'); ?>">
				<span style="color: White; "><strong> </strong></span>
			</div> <br />

			<div class="form-group">
				<input align="center" id="pass" type="Password" class="form-control input-underline" name="pass" placeholder="Password" value="<?php echo set_value('pass'); ?>">
				<span style="color: White; "><strong> </strong></span>
			</div> <br /><br />

			<div class="text-center valerror"><?php echo validation_errors(); ?></div>

			<div class="form-group">
				<button align="center" type="submit" class="btn btn-md lgbtn"> LOG IN </button> <br /><br /><br /><br >
			</div>
		</form>	

	</div>

</div>
</body>

</html>