
<?php $__env->startSection('content'); ?>
<div class="main-grid">
    <div class="agile-grids">	
        <!-- grids -->
        <div class="grids">
            <h2>Update User</h2><br>

            <!--validasi form-->
            <?php if(count($errors)>0): ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <ul>
                        <li><strong>Updated Data Failed !</strong></li>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><strong><?php echo e($error); ?></strong></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>   
            <?php endif; ?>
            <!--end validasi form-->

            <form action="<?php echo e(url('/user/'.$users[0]->id)); ?>" method="post">
                <?php echo method_field('patch'); ?>
                <?php echo csrf_field(); ?>
                <div class="panel panel-widget top-grids">
                    <div class="chute chute-center">
                        <div class="row mb40">
                            <div class="col-md-12">
                                <div class="demo-grid">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" name="email" id="email" class="form-control" value="<?php echo e($users[0]->email); ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="" selected>-- Select Status --</option>
                                                <option value="Admin" 
                                                    <?php if($users[0]->status_active == 'Admin'): ?>
                                                        selected
                                                    <?php endif; ?>
                                                >Admin</option>
                                                <option value="Guest"
                                                    <?php if($users[0]->status_active == 'Guest'): ?>
                                                        selected
                                                    <?php endif; ?>
                                                    >Guest</option>
                                                <option value="Inactive"
                                                <?php if($users[0]->status_active == 'Inactive'): ?>
                                                    selected
                                                <?php endif; ?>
                                                >Inactive</option>
                                            </select>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>         
            <br>
            <div class="bs-component mb20" align="center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
        </div>
        <!-- //grids -->
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nap_coverage_area\resources\views/configuration/edit.blade.php ENDPATH**/ ?>