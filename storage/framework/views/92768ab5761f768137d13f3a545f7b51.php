

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Edit Profile</h2>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('profiles.update')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="form-group mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo e(old('name', $user->name)); ?>" required>
        </div>

        <div class="form-group mb-3">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo e(old('email', $user->email)); ?>" required>
        </div>

        <div class="form-group mb-3">
            <label for="profile_picture">Profile Picture</label>
            <input type="file" class="form-control-file" id="profile_picture" name="profile_picture">

            <?php if($user->profile_picture): ?>
                <div class="mt-3">
                    <img src="<?php echo e(asset('storage/' . $user->profile_picture)); ?>" alt="Profile Picture" class="img-fluid rounded-circle profile-img">
                </div>
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>

    <!-- Logout Form -->
    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="mt-3">
        <?php echo csrf_field(); ?>
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
</div>

<style>
.profile-img {
    width: 150px; /* Adjust width as needed */
    height: 150px; /* Adjust height as needed */
    object-fit: cover; /* Ensures the image covers the circle */
}
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\uelogin\resources\views/profiles/edit.blade.php ENDPATH**/ ?>