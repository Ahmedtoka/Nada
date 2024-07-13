

<?php $__env->startSection('content'); ?>
    <div class="pagetitle">
        <h1>Dashboard</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">

                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="<?php echo e(route('home', ['filter=today'])); ?>">Today</a></li>
                                    <li><a class="dropdown-item" href="<?php echo e(route('home', ['filter=month'])); ?>">This Month</a>
                                    </li>
                                    <li><a class="dropdown-item" href="<?php echo e(route('home', ['filter=year'])); ?>">This Year</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Sales <span></span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?php echo e($orders_count); ?></h6>
                                        

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="<?php echo e(route('home', ['filter=today'])); ?>">Today</a></li>
                                    <li><a class="dropdown-item" href="<?php echo e(route('home', ['filter=month'])); ?>">This Month</a>
                                    </li>
                                    <li><a class="dropdown-item" href="<?php echo e(route('home', ['filter=year'])); ?>">This Year</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Revenue <span></span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-currency-dollar"></i>
                                    </div>
                                    <div class="ps-2">
                                        <h6><?php echo e($orders_revenue); ?></h6>
                                        

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->

                    <!-- Customers Card -->
                    <div class="col-xxl-4 col-xl-12">

                        <div class="card info-card customers-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="<?php echo e(route('home', ['filter=today'])); ?>">Today</a></li>
                                    <li><a class="dropdown-item" href="<?php echo e(route('home', ['filter=month'])); ?>">This Month</a>
                                    </li>
                                    <li><a class="dropdown-item" href="<?php echo e(route('home', ['filter=year'])); ?>">This Year</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Customers <span></span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?php echo e($customers_count); ?></h6>
                                        

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Customers Card -->

                    <!-- Reports -->
                    <div class="col-12">
                        <div class="card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="<?php echo e(route('home', ['filter=today'])); ?>">Today</a>
                                    </li>
                                    <li><a class="dropdown-item" href="<?php echo e(route('home', ['filter=month'])); ?>">This
                                            Month</a>
                                    </li>
                                    <li><a class="dropdown-item" href="<?php echo e(route('home', ['filter=year'])); ?>">This Year</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Reports</h5>

                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center">Staff Name</th>
                                            <th scope="col" class="text-center">Total Orders</th>
                                            <th scope="col" class="text-center">Hold Orders</th>
                                            <th scope="col" class="text-center">Fulfilled Orders</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($reports['name'])): ?>
                                            <?php $__currentLoopData = $reports['name']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td class="text-center">
                                                        <?php echo e($reports['name'][$key]); ?>

                                                    </td>
                                                    <td class="text-center">

                                                        <?php echo e($reports['all'][$key]); ?>


                                                    </td>
                                                    <td class="text-center">

                                                        <?php echo e($reports['hold'][$key]); ?>


                                                    </td>
                                                    <td class="text-center">

                                                        <?php echo e($reports['fulfilled'][$key]); ?>


                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>

                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div><!-- End Reports -->

                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="<?php echo e(route('home', ['filter=today'])); ?>">Today</a>
                                    </li>
                                    <li><a class="dropdown-item" href="<?php echo e(route('home', ['filter=month'])); ?>">This
                                            Month</a>
                                    </li>
                                    <li><a class="dropdown-item" href="<?php echo e(route('home', ['filter=year'])); ?>">This
                                            Year</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Recent Sales</h5>

                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Customer</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $recent_sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <th scope="row"><a href="#">Lvs<?php echo e($sale->order_number); ?></a>
                                                </th>
                                                <td>
                                                    <?php if($sale->shipping_address): ?>
                                                        <?php echo e($sale->shipping_address['name']); ?>

                                                    <?php else: ?>
                                                        
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e($sale->total_price); ?></td>
                                                <td><span class="badge bg-success"><?php echo e($sale->fulfillment_status); ?></span>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div><!-- End Recent Sales -->

                    <!-- Top Selling -->
                    <div class="col-12">
                        <div class="card top-selling overflow-auto">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="<?php echo e(route('home', ['filter=today'])); ?>">Today</a>
                                    </li>
                                    <li><a class="dropdown-item" href="<?php echo e(route('home', ['filter=month'])); ?>">This
                                            Month</a>
                                    </li>
                                    <li><a class="dropdown-item" href="<?php echo e(route('home', ['filter=year'])); ?>">This
                                            Year</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="card-body pb-0">
                                <h5 class="card-title">Top Selling</h5>

                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">Preview</th>
                                            <th scope="col">Product</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Sold</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $most_selling; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sell): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <th scope="row"><a href="#"><img
                                                            src="<?php echo e($sell->variant_image); ?>" alt=""></a>
                                                </th>
                                                <td><?php echo e($sell->product_name); ?></td>
                                                <td><?php echo e($sell->price); ?></td>
                                                <td class="fw-bold"><?php echo e($sell->total); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div><!-- End Top Selling -->

                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">

                <!-- Recent Activity -->
                <div class="card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>

                            <li><a class="dropdown-item" href="<?php echo e(route('home', ['filter=today'])); ?>">Today</a>
                            </li>
                            <li><a class="dropdown-item" href="<?php echo e(route('home', ['filter=month'])); ?>">This
                                    Month</a>
                            </li>
                            <li><a class="dropdown-item" href="<?php echo e(route('home', ['filter=year'])); ?>">This
                                    Year</a>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Recent Activity</h5>

                        <div class="activity">

                            <?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $start = Carbon\Carbon::parse($activity->created_at);
                                    $end = now();
                                    $options = [
                                        'join' => ', ',
                                        'parts' => 1,
                                        'syntax' => Carbon\CarbonInterface::DIFF_ABSOLUTE,
                                    ];

                                    $duration = $end->diffForHumans($start, $options);
                                    //
                                ?>
                                <div class="activity-item d-flex">
                                    <div class="activite-label"><?php echo e($duration); ?></div>
                                    <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                                    <div class="activity-content">
                                        <?php echo $activity->note; ?>

                                    </div>
                                </div><!-- End activity item-->
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>

                    </div>
                </div><!-- End Recent Activity -->

                <!-- Budget Report -->
                <div class="card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>

                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>

                    <div class="card-body pb-0">
                        <h5 class="card-title">Budget Report <span>| This Month</span></h5>

                        <div id="budgetChart" style="min-height: 400px;" class="echart"></div>

                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                var budgetChart = echarts.init(document.querySelector("#budgetChart")).setOption({
                                    legend: {
                                        data: ['Allocated Budget', 'Actual Spending']
                                    },
                                    radar: {
                                        // shape: 'circle',
                                        indicator: [{
                                                name: 'Sales',
                                                max: 6500
                                            },
                                            {
                                                name: 'Administration',
                                                max: 16000
                                            },
                                            {
                                                name: 'Information Technology',
                                                max: 30000
                                            },
                                            {
                                                name: 'Customer Support',
                                                max: 38000
                                            },
                                            {
                                                name: 'Development',
                                                max: 52000
                                            },
                                            {
                                                name: 'Marketing',
                                                max: 25000
                                            }
                                        ]
                                    },
                                    series: [{
                                        name: 'Budget vs spending',
                                        type: 'radar',
                                        data: [{
                                                value: [4200, 3000, 20000, 35000, 50000, 18000],
                                                name: 'Allocated Budget'
                                            },
                                            {
                                                value: [5000, 14000, 28000, 26000, 42000, 21000],
                                                name: 'Actual Spending'
                                            }
                                        ]
                                    }]
                                });
                            });
                        </script>

                    </div>
                </div><!-- End Budget Report -->

                <!-- Website Traffic -->
                <div class="card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>

                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>

                    <div class="card-body pb-0">
                        <h5 class="card-title">Website Traffic <span>| Today</span></h5>

                        <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                echarts.init(document.querySelector("#trafficChart")).setOption({
                                    tooltip: {
                                        trigger: 'item'
                                    },
                                    legend: {
                                        top: '5%',
                                        left: 'center'
                                    },
                                    series: [{
                                        name: 'Access From',
                                        type: 'pie',
                                        radius: ['40%', '70%'],
                                        avoidLabelOverlap: false,
                                        label: {
                                            show: false,
                                            position: 'center'
                                        },
                                        emphasis: {
                                            label: {
                                                show: true,
                                                fontSize: '18',
                                                fontWeight: 'bold'
                                            }
                                        },
                                        labelLine: {
                                            show: false
                                        },
                                        data: [{
                                                value: 1048,
                                                name: 'Search Engine'
                                            },
                                            {
                                                value: 735,
                                                name: 'Direct'
                                            },
                                            {
                                                value: 580,
                                                name: 'Email'
                                            },
                                            {
                                                value: 484,
                                                name: 'Union Ads'
                                            },
                                            {
                                                value: 300,
                                                name: 'Video Ads'
                                            }
                                        ]
                                    }]
                                });
                            });
                        </script>

                    </div>
                </div><!-- End Website Traffic -->

                <!-- News & Updates Traffic -->
                <div class="card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>

                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>

                    <div class="card-body pb-0">
                        <h5 class="card-title">News &amp; Updates <span>| Today</span></h5>

                        <div class="news">
                            <div class="post-item clearfix">
                                <img src="assets/img/news-1.jpg" alt="">
                                <h4><a href="#">Nihil blanditiis at in nihil autem</a></h4>
                                <p>Sit recusandae non aspernatur laboriosam. Quia enim eligendi sed ut harum...</p>
                            </div>

                            <div class="post-item clearfix">
                                <img src="assets/img/news-2.jpg" alt="">
                                <h4><a href="#">Quidem autem et impedit</a></h4>
                                <p>Illo nemo neque maiores vitae officiis cum eum turos elan dries werona nande...</p>
                            </div>

                            <div class="post-item clearfix">
                                <img src="assets/img/news-3.jpg" alt="">
                                <h4><a href="#">Id quia et et ut maxime similique occaecati ut</a></h4>
                                <p>Fugiat voluptas vero eaque accusantium eos. Consequuntur sed ipsam et totam...</p>
                            </div>

                            <div class="post-item clearfix">
                                <img src="assets/img/news-4.jpg" alt="">
                                <h4><a href="#">Laborum corporis quo dara net para</a></h4>
                                <p>Qui enim quia optio. Eligendi aut asperiores enim repellendusvel rerum cuder...</p>
                            </div>

                            <div class="post-item clearfix">
                                <img src="assets/img/news-5.jpg" alt="">
                                <h4><a href="#">Et dolores corrupti quae illo quod dolor</a></h4>
                                <p>Odit ut eveniet modi reiciendis. Atque cupiditate libero beatae dignissimos eius...</p>
                            </div>

                        </div><!-- End sidebar recent posts-->

                    </div>
                </div><!-- End News & Updates -->

            </div><!-- End Right side columns -->

        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\NadaHassanLive\resources\views/home.blade.php ENDPATH**/ ?>