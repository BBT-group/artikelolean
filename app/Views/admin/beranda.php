<?= $this->extend('Admin/template') ?>

<?= $this->section('title') ?>
Admin Dashboard
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="card" style="border: none;">
        <ol class="breadcrumb">
            <li style="margin-right: 10px;"><a class="crumb" href="<?php echo base_url('administrator/beranda') ?>"><i class="bx bx-home nav_icon"></i></a></li>
            <li style="margin-right: 10px;" class="crumba"> > </li>
            <li style="margin-right: 10px;" class="crumba">Dashboard</li>
        </ol>
    </div>
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Visitor Today
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= $totalVisitorsToday ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Visitors All Time
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= $totalVisitorsAllTime ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-lg-7">
        <div class="card shadow mb-4 pt-0">
            <div
                class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Detail Visitor</h6>
            </div>
            <div class="card-body">
                <div class="chart-container">
                    <canvas id="visitorChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-lg-7">
        <div class="card shadow mb-4 pt-0">
            <div
                class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Top 10 Views Berita</h6>
            </div>
            <div class="card-body">
                <div class="chart-container">
                    <canvas id="newsChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Data for daily visitors
    var visitorDates = <?= json_encode(array_column($dailyVisitors, 'tgl')); ?>;
    var visitorCounts = <?= json_encode(array_column($dailyVisitors, 'jumlah')); ?>;

    var ctxVisitor = document.getElementById('visitorChart').getContext('2d');
    var visitorChart = new Chart(ctxVisitor, {
        type: 'line',
        data: {
            labels: visitorDates,
            datasets: [{
                label: 'Daily Visitors',
                data: visitorCounts,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false, // Make the chart fill its container
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    // Data for most viewed news
    var newsTitles = <?= json_encode(array_column($mostViewedNews, 'judul')); ?>;
    var newsViews = <?= json_encode(array_column($mostViewedNews, 'viewer')); ?>;

    var ctxNews = document.getElementById('newsChart').getContext('2d');
    var newsChart = new Chart(ctxNews, {
        type: 'bar',
        data: {
            labels: newsTitles,
            datasets: [{
                label: 'Views',
                data: newsViews,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false, // Make the chart fill its container
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
<?= $this->endSection() ?>