<style>
    #dropdownTable {
        border: 4px solid gray; 
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    table > tbody > tr:hover > td {
        background-color: lightblue;
        color: black;
    }

    table > thead > tr > th {
        background-color:#151A48; 
        color:white;
    }
    #btnDropdown {
        background-color: #151A48;
        color: white;
        font-weight: 600;
        border: 2px solid white;
    }
    #btnDropdown:hover {
        background-color: white;
        color: #151A48;
        font-weight: 700;
        border: 2px solid #151A48;
        outline: none;
    }
    #btnDropdown:focus:hover {
        background-color: white;
        color: #151A48;
        font-weight: 700;
        border: 2px solid #151A48;
        outline: none;
    }
    .modal-header {
        border-bottom:1px solid #eee;
        background-color: #151A48;
        color: white;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        margin-left: -1px;
        margin-top: -5px;
        width: auto;
    }
    .form-group > .form-control:focus {
        border: 2px solid #151A48;
    }
    .modal-footer > button {
        background-color: #151A48;
        color: white;
        font-weight: 600;
        border: 2px solid white;
        outline: none;
    }
    .modal-footer > button:hover {
        background-color: white;
        color: #151A48;
        font-weight: 600;
        border: 2px solid #151A48;
        outline: none;
    }
    .modal-footer > button:focus {
        background-color: #151A48;
        color: white;
        font-weight: 600;
        border: 2px solid white;
        outline: none;
    }
    .modal-footer > button:focus:hover {
        background-color: white;
        color: #151A48;
        font-weight: 700;
        border: 2px solid #151A48;
        outline: none;
    }
</style>


<?php $__env->startSection('content'); ?>
<div class="main-grid">
    <div class="agile-grids">

        <!--alert success -->
        <?php if(session('status')): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong><?php echo e(session('status')); ?></strong>
        </div> 
        <?php endif; ?>
        <!--alert success -->

        <!--validasi form-->
        <?php if(count($errors)>0): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <ul>
                    <li><strong>Saved Data Failed !</strong></li>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><strong><?php echo e($error); ?></strong></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>   
        <?php endif; ?>
        <!--end validasi form-->
        
        <div class="buttons-heading">
            <h2>User</h2>
        </div>
        
        <!-- Button trigger modal Name -->
        <div class="bs-component mb20">
            <button type="button" class="btn btn-primary" id="btnDropdown" data-toggle="modal" data-target="#myModalUser">
                <i class="fa fa-plus" aria-hidden="true"></i>
                <span class="nav-text">
                Add User
                </span>
            </button>
        </div>
        <!-- Button trigger modal -->

        <!-- table -->
                <table id="dropdownTable" class="display" style="width:100%">
                <thead>
                    <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Status</th>
                    <th>Login Encounter</th>
                    <th>Last Login</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($user->int_emp_pref_name); ?></td>
                        <td><?php echo e($user->email); ?></td>
                        <td><?php echo e($user->department_name); ?></td>
                        <td>
                            <?php if($user->status_active == 'Admin'): ?>
                                <span class='label label-success'>Admin</span>
                            <?php else: ?> 
                                <span class='label label-warning'>Member</span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($user->login_counter); ?></td>
                        <td><?php echo e($user->last_login); ?></td>
                        <td>
                            <div class="row">
                                <a href="<?php echo e(url('/user/'.$user->id.'/edit')); ?>" class="btn btn-sm btn-info">
                                    <i class="fa fa-edit" aria-hidden="true"></i> 
                                    Edit
                                </a>
                                <form action="<?php echo e(url('/user/'.$user->id)); ?>" method="post">
                                    <?php echo method_field('delete'); ?>
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i> 
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                </table>
        <!-- table-->
    </div>
</div>

<!-- Modal Name-->
<div class="modal fade" id="myModalUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel"><b>Create User</b>
                <button type="button" class="close" data-dismiss="modal" id="closeModalDropdown" aria-label="Close" style=" margin-top : 1px;">
                    <span aria-hidden="true" style="color:white"><i class="fa fa-times"></i></span>
                </button>
            </h4>
        </div>
        <form action="<?php echo e(url('/user')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="modal-body">
                <div class="form-body">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" id="email" class="form-control" value="<?php echo e(old('email')); ?>">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="" selected>-- Select Status --</option>
                            <option value="Admin">Admin</option>
                            <option value="Guest">Guest</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnResetModal"><i class="fa fa-refresh"></i> Reset</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!-- Modal Name-->
<script>
   $(document).ready(function() {
        var table = $('#dropdownTable').DataTable( {
            "order": [],
            responsive: true
        } );

        $('#btnResetModal').off('click').on('click',resetModal);
        $('#closeModalDropdown').off('click').on('click',resetModal);
        
        function resetModal() 
        {
            $('#email').val('');
            $('#department').val('');
            $('#status').val('');
        }
    } );
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nap_coverage_area\resources\views/configuration/user.blade.php ENDPATH**/ ?>