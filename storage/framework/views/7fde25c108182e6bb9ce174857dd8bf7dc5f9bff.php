

<?php $__env->startSection('content'); ?>
    <div class="pagetitle">
        <div class="row">
            <div class="col-8">
                <div class="col-9">
                    <h1>Order <?php echo e($order->name); ?></h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('shopify.orders')); ?>">Orders</a></li>
                            <li class="breadcrumb-item">Order <?php echo e($order->name ?? ''); ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-md-3 ml-auto">
                <label for="update_delivery_status">Delivery Status</label>
                <select class="form-select " data-minimum-results-for-search="Infinity" id="update_delivery_status">
                    <option value="<?php echo e($order->fulfillment_status); ?>"><?php echo e($order->fulfillment_status); ?></option>
                    <?php if($order->fulfillment_status != 'shipped' && $order->fulfillment_status != 'cancelled'): ?>
                        <option value="cancelled">Cancel</option>
                    <?php endif; ?>
                </select>
            </div>
        </div>
        <div class="row gutters-5" style="display: none" id="cancel_reason">
            <div class="col-md-6 ml-auto"></div>
            <div class="col-md-6 ml-auto">
                <form action="<?php echo e(route('orders.update_delivery_status')); ?>" id="cancel_order_form" method="POST">
                    <?php echo csrf_field(); ?>
                    <label for="reason">Reason</label>
                    <select class="form-select" name="reason" data-minimum-results-for-search="Infinity">
                        <option value="" disabled="">Select</option>
                        <option value="CUSTOMER_REQUEST">Customer changed or canceled order</option>
                        <option value="BROUGHT_FROM_STORE">Customer Brought From Store</option>
                        <option value="ORDER_LATE">Order Late Recieve</option>
                        <option value="WRONG_SHIPPING_INFO">Wrong Shipping Info</option>
                        <option value="REPEATED_ORDER">Repeated Order</option>
                        <option value="FAKE_ORDER">FAKE ORDER</option>
                        <option value="ORDER_CONFIRMED_BY_MISTAKE">Client Confirmed Order By Mistake</option>
                        <option value="INVENTORY">Items unavailable</option>
                        <option value="ORDER_UPDATED_AFTER_SHIPPING">Client Updated the Order After Being Shipped</option>
                        <option value="OTHER">Other</option>

                    </select>
                    <input type="hidden" name="status" value="cancelled">
                    <input type="hidden" name="order_id" value="<?php echo e($order->id); ?>">
                    <label for="note">Cancelling Note*</label>
                    <input type="text" name="note" class="form-control" placeholder="Enter Reason and Hit Enter"
                        required>
                </form>

            </div>

        </div>
    </div>

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="">
                    <div class="col-xxl-12 col-md-12">
                        <div class="card info-card sales-card">
                            <div class="card-body pb-0 mt-2">
                                <h5 class="card-title">Order Details</h5>
                                <table class="table table-borderless">
                                    <thead>
                                        <th>Payment Status</th>
                                        <th class="text-center">Fulfillment Status</th>
                                        <th style="float:right">Order Date</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo e($order->getPaymentStatus()); ?></td>
                                            <td class="text-center"><?php echo e($order->getFulfillmentStatus()); ?></td>
                                            <td style="float: right;">
                                                <?php echo e(date('F d, Y', strtotime($order['created_at_date']))); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form action="<?php echo e(route('shopify.order.fulfillitems')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="col-lg-12 items_card">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Items</h5>
                            <input type="hidden" id="order_id" name="order_id" value="<?php echo e($order['table_id']); ?>">
                            <?php if($order['line_items'] && is_array($order['line_items']) && count($order['line_items']) > 0): ?>
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body pt-2">
                                            <table class="table table-borderless">
                                                <thead>
                                                    <th style="width:10%"></th>
                                                    <th>Product</th>
                                                    <th style="width:20%">Price X Qty</th>
                                                    <th style="width:15%">Total</th>
                                                    <th></th>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $order['line_items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td>
                                                                <?php if(isset($product_images)): ?>
                                                                    <?php if(isset($product_images[$item['product_id']])): ?>
                                                                        <div class="img image-responsive">
                                                                            <a href="#" data-bs-toggle="modal"
                                                                                data-bs-target="#imagesmodal-<?php echo e($item['product_id']); ?>">
                                                                                <img height="55px" width="auto"
                                                                                    src="<?php echo e($product_images[$item['product_id']][0]['src'] ?? null); ?>"
                                                                                    alt="Image here">
                                                                            </a>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo e($item['title']); ?><br>
                                                                <small class="text-muted">SKU:
                                                                    <?php echo e($item['sku'] ?? ''); ?></small> |
                                                                <small class="text-muted">Variant:
                                                                    <?php echo e($item['variant_title'] ?? ''); ?></small> <br>
                                                            </td>
                                                            <td> <?php echo e($order_currency); ?>

                                                                <?php echo e(number_format($item['price'], 2)); ?> <span>x</span>
                                                                <?php echo e($item['quantity']); ?> </td>
                                                            <td>
                                                                <?php $sub_price = number_format((double) $item['price'] * (double) $item['quantity'], 2); ?>
                                                                <?php echo e($order_currency); ?> <?php echo e($sub_price); ?>

                                                            </td>
                                                            <td>
                                                                <?php if(in_array($item['id'], $refunds)): ?>
                                                                    <span class="badge bg-dark">Removed</span>
                                                                <?php elseif($item['fulfillable_quantity'] > 0): ?>
                                                                    <?php if($item['fulfillment_service'] === 'manual' || $item['fulfillment_service'] === 'app-fulifllment-service'): ?>
                                                                        
                                                                        
                                                                        <span class="badge bg-warning">Un-fulfilled</span>
                                                                        <input type="hidden" name="line_item_id[]"
                                                                            value="<?php echo e($item['id']); ?>">
                                                                        <input type="hidden" name="qty[]"
                                                                            value="<?php echo e($item['quantity']); ?>">
                                                                    <?php else: ?>
                                                                        <span class="badge bg-danger">Un-fulfillable</span>
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    <span class="badge bg-success">Fulfilled</span>
                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                            
                                        </div>

                                    </div>
                                    <div class="card-footer">
                                        <table class="table table-hover table-xl mb-0 total-table">
                                            <tbody>
                                                <?php if(!empty($order->getDiscountBreakDown())): ?>
                                                    <?php $__currentLoopData = $order->getDiscountBreakDown(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $title => $discount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td class="text-truncate text-left">Discount Code</td>
                                                            <td class="text-truncate text-left"><b><?php echo e($title ?? ''); ?></b>
                                                            </td>
                                                            <td class="text-truncate text-right"><span
                                                                    style="float:right">-
                                                                    <?php echo e($order_currency . ' ' . number_format($discount, 2)); ?></span>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(count($order->getDiscountBreakDown()) > 1): ?>
                                                        <tr>
                                                            <td class="text-truncate text-left">Total Discount</td>
                                                            <td class="text-truncate text-left"></td>
                                                            <td class="text-truncate text-right"><span
                                                                    style="float:right">-
                                                                    <?php echo e($order_currency . ' ' . number_format($order->total_discounts, 2)); ?></span>
                                                            </td>
                                                        </tr>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                <tr>
                                                    <td class="text-truncate text-left">Subtotal</td>
                                                    <td class="text-truncate text-left"><?php echo e(count($order['line_items'])); ?>

                                                        <?php echo e(count($order['line_items']) > 1 ? 'Items' : 'Item'); ?></td>
                                                    <td class="text-truncate text-right"><span
                                                            style="float:right"><?php echo e($order_currency); ?>

                                                            <?php echo e(number_format($order['subtotal_price'], 2)); ?></span></td>
                                                </tr>
                                                <?php if(!empty($order['shipping_lines'])): ?>
                                                    <?php $total_shipping = 0; ?>
                                                    <?php $__currentLoopData = $order['shipping_lines']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ship): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td class="text-truncate text-left">Shipping</td>
                                                            <td class="text-truncate text-left">
                                                                <?php echo e(strlen($ship['title']) < 20 ? $ship['title'] : 'Standard Shipping'); ?>

                                                            </td>
                                                            <td class="text-truncate text-right"><span
                                                                    style="float:right"><?php echo e($order_currency . ' ' . number_format($ship['price'], 2)); ?></span>
                                                            </td>
                                                        </tr>
                                                        <?php $total_shipping += $ship['price']; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(!empty($order['shipping_lines']) && count($order['shipping_lines']) > 0): ?>
                                                        
                                                        
                                                        
                                                        
                                                        
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                <tr>
                                                    <td class="text-truncate text-left text-bold">TOTAL AMOUNT</td>
                                                    <td class="text-truncate text-left"></td>
                                                    <td class="text-truncate text-right text-bold"><span
                                                            style="float:right"><?php echo e($order_currency . ' '); ?><?php echo e(number_format($order['total_price'], 2)); ?></span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </form>
            <?php echo $__env->make('modals.fulfill_item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Shipping Address</h5>
                        <div class="alert alert-light" role="alert">
                            <p>
                                <?php echo e($order['shipping_address']['name'] ?? ''); ?> <br>
                                <?php echo e($order['shipping_address']['phone'] ?? ''); ?> <br>
                                <?php echo e($order['shipping_address']['address1'] ?? ''); ?> <br>
                                <?php echo e($order['shipping_address']['address2'] ?? ''); ?> <br>
                                <?php echo e($order['shipping_address']['province'] ?? ''); ?>

                                <?php echo e($order['shipping_address']['city']); ?> <br>
                                <?php echo e($order['shipping_address']['country'] ?? ''); ?>

                                <?php echo e($order['shipping_address']['zip'] ?? ''); ?>

                            </p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Billing Address</h5>
                        <div class="alert alert-light" role="alert">
                            <p>
                                <?php echo e($order['billing_address']['name'] ?? ''); ?> <br>
                                <?php echo e($order['billing_address']['phone'] ?? ''); ?> <br>
                                <?php echo e($order['billing_address']['address1'] ?? ''); ?> <br>
                                <?php echo e($order['billing_address']['address2'] ?? ''); ?> <br>
                                <?php echo e($order['billing_address']['province'] ?? ''); ?> <?php echo e($order['billing_address']['city']); ?>

                                <br>
                                <?php echo e($order['billing_address']['country'] ?? ''); ?>

                                <?php echo e($order['billing_address']['zip'] ?? ''); ?>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function() {
            // $('.actions').change(function () {
            //     var val = $(this).val();
            //     if(val == 'fulfill_items') {
            //         $('.items_card').removeClass('col-lg-8').addClass('col-lg-12');
            //         $('.fulfill-th').css({'display':'block'});
            //         $('.fulfill-td').css({'display':'block'});
            //     }
            // });

            $('.fulfill_this_item').click(function() {
                var lineItemId = $(this).data('line_item_id');
                $('.fulfill_submit').css({
                    'display': 'block'
                });
                $('.fulfill_loading').css({
                    'display': 'none'
                });
                $('#lineItemId').val(parseInt(lineItemId));
                var qty = parseInt($(this).data('qty'));
                var select_html = '';
                for (var i = 1; i <= qty; i++) {
                    select_html += "<option value=" + i + ">" + i + "</option>";
                }
                $('#no_of_packages').html(select_html);
                $('.fulfillment_form').find('input:text').val('');
                $('.fulfillment_form').find('input:checkbox').prop('checked', false);
                $('#fulfill_items_modal').modal('show');
            });

            $('.fulfill_submit').click(function(e) {
                e.preventDefault();
                $(this).attr('disabled', true);
                $('.fulfill_submit').css({
                    'display': 'none'
                });
                $('.fulfill_loading').removeAttr('style');
                var data = {};
                $('.fulfillment_form').find('[id]').each(function(i, v) {
                    var input = $(this); // resolves to current input element.
                    data[input.attr('id')] = input.val();
                });
                data['order_id'] = $('#order_id').val();
                data['lineItemId'] = $('#lineItemId').val();
                data['notify_customer'] = $('#notify_customer').prop('checked') ? 'on' : 'off';
                $.ajax({
                    type: 'POST',
                    url: "<?php echo e(route('shopify.order.fulfill')); ?>",
                    data: data,
                    async: false,
                    success: function(response) {
                        console.log(response);
                        //window.top.location.reload();
                    }
                });
            });
        });

        $('#update_delivery_status').on('change', function() {
            var order_id = <?php echo e($order->id); ?>;
            var status = $('#update_delivery_status').val();
            if (status == "cancelled") {
                document.getElementById('cancel_reason').style.display = "block";
            } else {
                $.post('<?php echo e(route('orders.update_delivery_status')); ?>', {
                    _token: '<?php echo e(@csrf_token()); ?>',
                    order_id: order_id,
                    status: status
                }, function(data) {
                    AIZ.plugins.notify('success', 'Delivery status has been updated');
                });
            }

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1216098.cloudwaysapps.com/gemcvyvqcd/public_html/resources/views/orders/show.blade.php ENDPATH**/ ?>