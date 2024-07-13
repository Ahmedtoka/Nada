

<?php $__env->startSection('content'); ?>
<section class="section">
  <div class="row">
    <div class="col-lg-8 offset-2">
      <div class="card">
        <div class="card-body">
          
          <!-- General Form Elements -->
          <form method="POST" action="<?php echo e(route('stores.store')); ?>">
            <?php echo csrf_field(); ?>
            <h3 class="pt-4">Store Details</h3>
            <div class="row mb-3 mt-4">
                <label for="inputText" class="col-sm-4 col-form-label">Store URL</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="myshopify_domain" value="<?php echo e(old('myshopify_domain')); ?>" required>
                  <?php $__errorArgs = ['myshopify_domain'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="badge bg-danger" ><?php echo e($message); ?></span>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
            <div class="row mb-3 mt-4">
                <label for="inputEmail" class="col-sm-4 col-form-label">API Key</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="api_key" value="<?php echo e(old('api_key')); ?>" required>
                  <?php $__errorArgs = ['api_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="badge bg-danger" ><?php echo e($message); ?></span>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
            <div class="row mb-3 mt-4">
                <label for="inputPassword" class="col-sm-4 col-form-label">API Secret Key</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" name="api_secret_key" value="<?php echo e(old('api_secret_key')); ?>" required>
                  <?php $__errorArgs = ['api_secret_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="badge bg-danger" ><?php echo e($message); ?></span>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
            <div class="row mb-3 mt-4">
              <label for="inputPassword" class="col-sm-4 col-form-label">Access Token</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="access_token" value="<?php echo e(old('access_token')); ?>" required>
                <?php $__errorArgs = ['access_token'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <span class="badge bg-danger" ><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
            </div>
            <hr>
            <h3>Account Details</h3>
            <div class="row mb-3 mt-4">
              <label for="inputPassword" class="col-sm-4 col-form-label">Account Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <span class="badge bg-danger" ><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
            </div>
            <div class="row mb-3 mt-4">
              <label for="inputPassword" class="col-sm-4 col-form-label">Account Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" name="password" value="<?php echo e(old('password')); ?>" required>
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <span class="badge bg-danger" ><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
            </div>
          
            <div class="row mb-3">
              <div class="col-sm-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form><!-- End General Form Elements -->
        </div>
      </div>
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1216098.cloudwaysapps.com/gemcvyvqcd/public_html/resources/views/superadmin/stores/create.blade.php ENDPATH**/ ?>