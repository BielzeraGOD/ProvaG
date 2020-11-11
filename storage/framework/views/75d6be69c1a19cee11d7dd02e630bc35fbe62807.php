

<?php $__env->startSection("nome_tela","Disciplina"); ?>


<?php $__env->startSection("cadastro"); ?>
<script src="<?php echo e(asset('js/custom.js')); ?>"> </script>
<h1 class="titulo text-uppercase font-weight-bold text-white ">Cadastro de disciplina</h1>
                <br/>
                <br/>
                <div class="card text-white bg-dark mb-3 mx-auto sombra" style="max-width: 30rem;">
                    <div class="card-header text-uppercase font-weight-bold text-center text-s">
                        <h5>
                            <i class="fas fa-book-open"></i> Cadastro
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class ="box">
                            <form action="/disciplina" method="POST" class="form-group row">
                                <div class="col-12 form-group d-flex justify-content-center ">
                                    <div class="row">
                                        <label class="text-center text-uppercase font-weight-bold text-white col-12">Nome</label>
                                        <input type="text" name="nome" value="<?php echo e($disciplina->nome); ?>"  required />
                                    </div>
                                </div>
                                <div class="col-12 form-group d-flex justify-content-center">
                                    <div class="row">
                                        <label class="text-center text-uppercase font-weight-bold text-white col-12">Quantidade máxima de faltas</label>
                                        <input type="text" name="maximo_faltas" value="<?php echo e($disciplina->maximo_faltas); ?>" required />
                                    </div>
                                </div>

                                <input type="hidden" name="id" value="<?php echo e($disciplina->id); ?>"> 

                                <div class="col-12 form-group d-flex justify-content-center">
                                <?php echo csrf_field(); ?>
                                    <button type="submit" class="font-weight-bold"><i class="fas fa-save"></i> Salvar</button>
                                    <a href="/disciplina" class="font-weight-bold"> <i class="fas fa-plus-square"></i> Novo</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection("listagem"); ?>

<br/>
                <h1 class="titulo text-uppercase font-weight-bold text-white ">disciplinas</h1>
                <br/>
                <div class="row d-flex justify-content-around">
                    <?php $__currentLoopData = $disciplinas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $disciplina): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="card text-white bg-success mb-4 col-6 sombra-disciplina" style="max-width: 23rem;">
                        <div class="card-header text-center text-uppercase font-weight-bold topo"><h5> <i class="fas fa-paperclip"></i> <?php echo e($disciplina->nome); ?></h5></div>
                            <div class="card-body">
                                <div class="progress">
                                    <input type="hidden" id="totalFaltas<?php echo e($disciplina->id); ?>" value="<?php echo e($disciplina->total_faltas); ?>"/>
                                    <input type="hidden" id="maxFaltas<?php echo e($disciplina->id); ?>" value="<?php echo e($disciplina->maximo_faltas); ?>"/>
                                    <div class="progress-bar progress-bar-striped bg-danger progress-bar-animated progressoFaltaBar" data-id="<?php echo e($disciplina->id); ?>" id="progressoFalta<?php echo e($disciplina->id); ?>" role="progressbar" style="width: 0%" aria-valuenow="<?php echo e($disciplina->total_faltas); ?>" aria-valuemin="0" aria-valuemax="<?php echo e($disciplina->maximo_faltas); ?>"></div>
                                </div>
                                <br/>
                            <h5 class="card-title text-center">Faltas: <?php echo e($disciplina->total_faltas); ?></h5>
                            <h5 class="card-title text-center">Máximo de faltas: <?php echo e($disciplina->maximo_faltas); ?></h5>
                            <div class="row d-flex justify-content-around">                        
                                <div>                                
                                    <?php if($disciplina->total_faltas < $disciplina->maximo_faltas): ?>
                                        <form action="/disciplina/<?php echo e($disciplina->id); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="_method" value="put"/>
                                            <button type="submit" class="btn btn-warning font-weight-bold"onclick="return confirm('Deseja realmente faltar?');" ><i class="fas fa-paper-plane"></i> Faltar</button>
                                        </form>
                                    <?php else: ?>
                                        <h6 class="alerta">Vá para Aula!</h6>
                                    <?php endif; ?>
                                </div>
                                <div>
                                    <a href="/disciplina/<?php echo e($disciplina->id); ?>/edit" class="btn btn-dark font-weight-bold"><i class="fas fa-pencil-alt"></i> Editar</a>
                                </div>
                                <div>
                                    <form action="/disciplina/<?php echo e($disciplina->id); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="_method" value="delete"/>
                                        <button type="submit" class="btn btn-danger font-weight-bold"  onclick="return confirm('Deseja realmente exlcuir?');"><i class="fas fa-trash-alt"></i> Excluir</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("template.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Github\prova1\resources\views/disciplina/index.blade.php ENDPATH**/ ?>