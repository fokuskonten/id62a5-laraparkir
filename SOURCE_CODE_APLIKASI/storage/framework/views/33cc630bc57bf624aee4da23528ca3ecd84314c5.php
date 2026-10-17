<?php $__env->startSection('content'); ?>
<form action="<?php echo e(route('login')); ?>" method="post">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card card-default" style="margin-top:20%;">
                    <div class="card-header">
                        <h3 class="text-center">Login <span class="fa fa-user"></span></h3>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" required="" autocomplete="off">
                                <?php if($errors->has('email')): ?>
                                    <span class="invalid-feedback">
                                        <?php echo e($errors->first('email')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" value="<?php echo e(old('password')); ?>" placeholder="" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" required="">
                                 <?php if($errors->has('password')): ?>
                                    <span class="invalid-feedback">
                                        <?php echo e($errors->first('password')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>  
                    </div>
                    <div class="card-footer">
                        <?php echo e(csrf_field()); ?>                      
                        <button type="submit" class="btn btn-outline-dark btn-block">Login</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="text-center" style="margin-top: 15px; font-size: 12px; color: #64748b; font-family: sans-serif;">Powered by <a href="https://fokuskonten.my.id" target="_blank" style="color: #2563eb; font-weight: 600; text-decoration: none;">FokusKonten</a></div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>