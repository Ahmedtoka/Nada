
<?php $__env->startSection('content'); ?>

    <div class="pagetitle">
        <div class="row">

            <div class="col-8">
                <h1>Orders</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                        <li class="breadcrumb-item">Orders</li>
                    </ol>
                </nav>
            </div>
            <div class="col-4">
                <a href="<?php echo e(route('orders.sync')); ?>" style="float: right" class="btn btn-primary">Sync Orders</a>
            </div>
        </div>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <form class="" action="" id="sort_orders" method="GET">
                        <div class="card-header row gutters-5">
                            <div class="row col-12">

                                <div class="col-2">
                                    <h6 class="d-inline-block pt-10px"><?php echo e('Choose Order Date'); ?></h6>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group mb-0">
                                        <input type="date" class="form-control" value="<?php echo e($date); ?>"
                                            name="date" placeholder="<?php echo e('Filter by date'); ?>" data-format="DD-MM-Y"
                                            data-separator=" to " data-advanced-range="true" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-1"></div>
                                <div class="col-1 text-right">
                                    <h6 class="d-inline-block pt-10px text-right"><?php echo e('Search Order'); ?></h6>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group mb-0">
                                        <input type="text" class="form-control" id="search"
                                            name="search"<?php if(isset($sort_search)): ?> value="<?php echo e($sort_search); ?>" <?php endif; ?>
                                            placeholder="<?php echo e('Type Order code & hit Enter'); ?>">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn btn-primary"><?php echo e('Filter'); ?></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body mt-1">
                            <div class="row col-12">
                                <div class="col-7">
                                    <h5 class="card-title">All Orders</h5>
                                </div>
                                <div class="col-2">
                                    <h5 class="card-title">Assign:</h5>
                                </div>
                                <div class="col-3 justify-content-center">
                                    <select class="form-select mt-2" name="prepare_emp" id="prepare_emp">
                                        <option value="0"><?php echo e('Choose Prepare Emp'); ?></option>
                                        <?php if(isset($prepare_users_list['name'])): ?>
                                            <?php $__currentLoopData = $prepare_users_list['name']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user_prepare): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <a class="dropdown-item" href="#"> <?php echo e($user_prepare); ?></a>
                                                <option value="<?php echo e($prepare_users_list['id'][$key]); ?>"><?php echo e($user_prepare); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>

                            

                            <!-- Table with stripped rows -->
                            <table class="table datatable" id="example">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="form-group">
                                                <div class="aiz-checkbox-inline">
                                                    <label class="aiz-checkbox">
                                                        <input type="checkbox" class="check-all">
                                                        <span class="aiz-square-check"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </th>
                                        <th scope="col">Order No.</th>
                                        <th scope="col">Customer Name</th>
                                        <th scope="col" class="text-center">Payment Status</th>
                                        <th scope="col" class="text-center">Subtotal</th>
                                        <th scope="col" class="text-center">Shipping</th>
                                        <th scope="col" class="text-center">Total</th>
                                        <th scope="col">Customer Phone</th>
                                        <th scope="col">Created Date</th>
                                        <th scope="col" class="text-right">Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($orders)): ?>
                                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($order): ?>
                                                <?php
                                                    $total_shipping = 0;
                                                    if (
                                                        isset($order['shipping_lines']) &&
                                                        $order['shipping_lines'] &&
                                                        is_array($order['shipping_lines'])
                                                    ) {
                                                        foreach ($order['shipping_lines'] as $ship) {
                                                            $total_shipping += $ship['price'];
                                                        }
                                                    }

                                                    $history = \App\Models\OrderHistory::where(
                                                        'order_id',
                                                        $order->id,
                                                    )->count();
                                                ?>
                                                <tr>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="aiz-checkbox-inline">
                                                                <label class="aiz-checkbox">
                                                                    <input type="checkbox" class="check-one" name="id[]"
                                                                        value="<?php echo e($order->id); ?>">
                                                                    <span class="aiz-square-check"></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><a class="btn-link"
                                                            href="<?php echo e(route('shopify.order.show', $order->table_id)); ?>">Lvs<?php echo e($order->order_number); ?></a>
                                                    </td>
                                                    <?php
                                                        $shipping_address = $order['shipping_address'];

                                                    ?>

                                                    <td><?php echo e(isset($shipping_address['name']) ? $shipping_address['name'] : ''); ?>

                                                    </td>
                                                    <td class="text-center"><?php echo e($order->getPaymentStatus()); ?></td>
                                                    <td class="text-center"><?php echo e($order->subtotal_price); ?></td>
                                                    <td class="text-center"><?php echo e($total_shipping); ?></td>
                                                    <td class="text-center"><?php echo e($order->total_price); ?></td>

                                                    <td><?php echo e(isset($shipping_address['phone']) ? $shipping_address['phone'] : ''); ?>

                                                    </td>
                                                    <td><?php echo e(date('Y-m-d h:i:s', strtotime($order->created_at))); ?></td>

                                                    <td class="text-right">
                                                        <?php if($history > 0): ?>
                                                            <div class="row">
                                                                <div class="col-6 justify-content-center ml-3">
                                                                    <div class="row  mb-1 justify-content-center text-center">
                                                                        <a class="btn btn-warning text-center"
                                                                            href="<?php echo e(route('prepare.order-history', $order->id)); ?>"
                                                                            title="Order History">
                                                                            <i class="bi bi-clock-history"></i>
                                                                        </a>
                                                                        History
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                    </td>

                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                            <div class="text-center pb-2">
                                <?php echo e($orders->links()); ?>

                            </div>
                            <!-- End Table with stripped rows -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">
        $("ul#operation").siblings('a').attr('aria-expanded', 'true');
        $("ul#operation").addClass("show");
        $("#sync").addClass("active");

        $(document).on("change", ".check-all", function() {
            if (this.checked) {
                // Iterate each checkbox
                $('.check-one:checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $('.check-one:checkbox').each(function() {
                    this.checked = false;
                });
            }

        });
        $("#prepare_emp").change(function() {
            var data = new FormData($('#sort_orders')[0]);
            var selected_name = $(this).find("option:selected").text();
            var selected_user = this.value;
            data.append('emp_name', selected_name);

            if (selected_user == 0) {

            } else {
                if (confirm('Are You Sure to Assign These order to ' + selected_name)) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "<?php echo e(route('bulk-order-assign')); ?>",
                        type: 'POST',
                        data: data,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response == 0) {
                                location.reload();
                            } else {
                                location.reload();
                            }
                        }
                    });
                } else {}
            }

            console.log(selected_name);
            console.log(selected_user);
            console.log(data);
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\NadaHassanLive\resources\views/orders/index.blade.php ENDPATH**/ ?>