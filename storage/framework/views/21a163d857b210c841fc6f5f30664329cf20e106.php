
<?php $__env->startSection('content'); ?>

    <div class="pagetitle">
        <div class="row">
            <div class="col-12">
                <h1>Stores</h1>
                <nav>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                      <li class="breadcrumb-item">Stores</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <br>
              <div class="row">
                <input type="text" placeholder="Search store here..." class="form-control search_store" style="width:50%">
              </div>
              <br>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Public / Private</th>
                    <th scope="col">Myshopify Domain</th>
                    <th scope="col">Created Date</th>
                  </tr>
                </thead>
                <tbody>
                    <?php if(isset($stores)): ?>
                        <?php $__currentLoopData = $stores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($store->id); ?></th>
                                <td><?php echo e($store->name); ?></td>
                                <td><?php echo e($store->isPublic() ? 'Public' : 'Private'); ?></td>
                                <td><?php echo e($store->myshopify_domain); ?></td>
                                <td><?php echo e(date('F d Y', strtotime($store->created_at))); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
            </div>
          </div>

        </div>
      </div>
    </section>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
  <script>
    $(document).ready(function () {
      $('.search_store').keyup(function () {
        var el = $(this);
        var val = el.val();
        console.log(val);

        if(val.length > 2) {
          $.ajax({
            url: "<?php echo e(route('search.store')); ?>",
            type: 'POST',
            async: false,
            data: {"searchTerm" : val},
            success: function (response) {
              if(response.status) {
                console.log(response);
              } else {
                console.log(response);
              }
            }
          });
        }
      })
    })
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1216098.cloudwaysapps.com/gemcvyvqcd/public_html/resources/views/superadmin/stores/index.blade.php ENDPATH**/ ?>