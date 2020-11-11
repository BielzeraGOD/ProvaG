<!DOCTYPE html>

<html>
    <head>
		<link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.css')); ?>" />
		<link rel="stylesheet" href="<?php echo e(asset('css/all.css')); ?>" />
		<link rel="stylesheet" href="<?php echo e(asset('css/custom.css')); ?>" />
		<script src="<?php echo e(asset('js/custom.js')); ?>"> </script>
		<script src="<?php echo e(asset('js/jquery.js')); ?>"> </script>
		<script src="<?php echo e(asset('js/bootstrap.js')); ?>"> </script>
		<title>PAGINA - <?php echo $__env->yieldContent("nome_tela"); ?></title>
	</head>

    <body class ="fundo">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <ul class="navbar-nav menu">
                <li class="nav-item"><a class="nav-link"href="/"><i class="fas fa-home"></i> HOME</a></li>
				<li class="nav-item"><a class="nav-link"href="/disciplina"><i class="fas fa-book-open"></i> CADASTRO </a></li>
            </ul>
        </nav>

        <?php if(Session::has("salvar")): ?>
			<div class="alert alert-success">
				<?php echo e(Session::get("salvar")); ?>

			</div>
		<?php endif; ?>
		<?php if(Session::has("excluir")): ?>
			<div class="alert alert-danger">
				<?php echo e(Session::get("excluir")); ?>

			</div>
		<?php endif; ?>


		<?php if($errors->any()): ?>
			<div class="alert alert-danger">
				<ul>
					<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $erro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li><?php echo e($erro); ?></li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
			</div>

		<?php endif; ?>
		
		<?php if(!request()->is("/")): ?>
			<div class="container fundo-opacidade">
				<div class="cadastro">
					<?php echo $__env->yieldContent("cadastro"); ?>
				</div>
				<div class="listagem">
					<?php echo $__env->yieldContent("listagem"); ?>
				</div>
			</div>
		<?php else: ?>
			<div>
			</div>
		<?php endif; ?>		
	</body>
</html>

<?php /**PATH C:\xampp\htdocs\prova1\resources\views/template/app.blade.php ENDPATH**/ ?>