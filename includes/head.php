<head>
	<title>Khwopa Project Archive</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/js/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="ckeditor5-build-classic/ckeditor.js"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
<script type="text/javascript">
$('#Login-Form').parsley();
$('#Signin-Form').parsley();
$('#Forgot-Password-Form').parsley();
</script>
	<style>
	.fakeimg {
  		height: 200px;
  		background: #aaa;
  	}
  	.jumbotron{
  		height: 3%;
  		padding-top: 20px;
  		padding-bottom: 5px;
  	}
  	.navbar{
  		/*height: 60px;*/
  		text-transform: uppercase;
  		font-weight: 700;
  		font-size: .9rem;
  		letter-spacing: .1rem;
  		/*background: rgba(0, 0, 0, .1)!important;*/
  	}
  	.dropdown:hover>.dropdown-menu{
  		display: block;
  		background: #e3e3e3;
  	}
  	.container1{
  		margin: 4% ;
  	}
  	#icon
  	{
  		max-width: 200px;
  		margin: 5% auto;
  	}
  	.zoom{
  		transition:transform .2s;
  	}
  	.zoom:hover{
  		transform: scale(1.1); /* IE 9 */
  		transform: scale(1.1); /* Safari 3-8 */
  		transform: scale(1.1); 
  	}
  	hr.hr1{
  		border: 1px light green;
  	}

  	footer{
  		width: 100%;
  		background-color: rgba(120,120,120);
  		padding: 1%;
  		color: #fff;
  	}
  	.fab{
  		padding: 5px;
  		font-size: 25px;
  		color: #fff;
  	}
  	.fab:hover{
  		color: rgb(60, 60, 200);
  		text-decoration: none;
  	}
  	@media(max-width: 900px){
  		.fab{
  			font-size: 20px;
  			padding: 10px;
  		}
  	}
			.fas{
  		color: #fff;
  	}
  	.fas:hover{
  		color: yellow;
  		text-decoration: none;
  	}
  	
        #reg-cross:hover{
            cursor: pointer;
        }
       /*---Signup---*/
    .modal-header, .modal-body, .modal-footer{
  padding: 25px;
}
.modal-footer{
  text-align: center;
}
#signup-modal-content, #forgot-password-modal-content{
  display: none;
}
 
/** validation */
  
input.parsley-error{    
  border-color:#843534;
  box-shadow: none;
}
input.parsley-error:focus{    
  border-color:#843534;
  box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #ce8483
}
.parsley-errors-list.filled {
  opacity: 1;
  color: #a94442;
  display: none;
} 
</style>
</head>
