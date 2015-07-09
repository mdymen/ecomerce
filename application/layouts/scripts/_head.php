<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>World Fight</title>

    <?php $this->headLink()->appendStylesheet($this->baseUrl('assets/css/bootstrap.css'))?>
    <?php $this->headLink()->appendStylesheet($this->baseUrl('assets/css/font-awesome.min.css'))?>
    <?php $this->headLink()->appendStylesheet($this->baseUrl('assets/css/jquery.bxslider.css'))?>
    <?php $this->headLink()->appendStylesheet($this->baseUrl('assets/css/style.css'))?>
    
     <?php $this->headScript()->appendFile($this->baseUrl('assets/js/jquery.js')) ?>  
     <?php $this->headScript()->appendFile($this->baseUrl('assets/js/bootstrap.js')) ?>  
     <?php $this->headScript()->appendFile($this->baseUrl('assets/js/jquery.bxslider.min.js')) ?>  
     <?php $this->headScript()->appendFile($this->baseUrl('assets/js/jquery.blImageCenter.js')) ?>  
     <?php $this->headScript()->appendFile($this->baseUrl('assets/js/mimity.js')) ?>  
    
    <?php echo $this->headScript()?>  
    <?php echo $this->headLink()?>  
    
</head>

<body>
    <header>
	    <div class="container">
	        <div class="row">

	        	<!-- Logo -->
	            <div class="col-lg-4 col-md-3 hidden-sm hidden-xs">
	            	<div class="well logo">
	            		<a href="<?php echo $this->baseUrl(""); ?>">
	            			World Fight <span>Online Shop</span>
	            		</a>
	            		<div>Lorem ipsum dolor sit amet.</div>
	            	</div>
	            </div>
	            <!-- End Logo -->

				<!-- Search Form -->
	            <div class="col-lg-5 col-md-5 col-sm-7 col-xs-12">
	            	<div class="well">
	                    <form action="">
	                        <div class="input-group">
	                            <input type="text" class="form-control input-search" placeholder="Enter something to search">
	                            <span class="input-group-btn">
	                                <button class="btn btn-default no-border-left" type="submit"><i class="fa fa-search"></i></button>
	                            </span>
	                        </div>
	                    </form>
	                </div>
	            </div>
	            <!-- End Search Form -->

	            <!-- Shopping Cart List -->
	            <div class="col-lg-3 col-md-4 col-sm-5">
	                <div class="well">
	                    <div class="btn-group btn-group-cart">
	                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <span class="pull-left"><i class="fa fa-shopping-cart icon-cart"></i></span>
                                <span class="pull-left">Shopping Cart: 2 item(s)</span>
                                <span class="pull-right"><i class="fa fa-caret-down"></i></span>
                            </button>
                            <ul class="dropdown-menu cart-content" role="menu">
                                <li>
                                    <a href="detail.html">
                                        <b>Penn State College T-Shirt</b>
                                        <span>x1 $528.96</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="detail.html">
                                        <b>Live Nation ACDC Gray T-Shirt</b>
                                        <span>x1 $428.96</span>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="cart.html">Total: $957.92</a></li>
                            </ul>
	                    </div>
	                </div>
	            </div>
	            <!-- End Shopping Cart List -->
	        </div>
	    </div>
    </header>
    
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- text logo on mobile view -->
                <a class="navbar-brand visible-xs" href="index.html">Mimity Online Shop</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo $this->baseUrl("/index"); ?>">Home</a></li>
                    <li><a href="<?php echo $this->baseUrl("/prensa"); ?>">Prensa</a></li>
                    <li><a href="<?php echo $this->baseUrl("/carrinho"); ?>">Carrinho</a></li>
                    <li><a href="<?php echo $this->baseUrl("/carrinho/checkout"); ?>">Checkout</a></li>
                    <li class="nav-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            Mais... <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $this->baseUrl("/index/sobre"); ?>">Sobre nós</a></li>
                            <li><a href="<?php echo $this->baseUrl("/index/contato"); ?>">Contato</a></li>
<!--                            <li><a href="compare.html">Compare</a></li>-->
                            <li><a href="<?php echo $this->baseUrl("/index/login"); ?>">Login</a></li>
                            <li><a href="<?php echo $this->baseUrl("/index/cadastro"); ?>">Cadastro</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <?php echo $this->layout()->content; ?>;
    
</body>