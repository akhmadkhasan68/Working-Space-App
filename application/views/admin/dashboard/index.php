<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Dashboards</h6>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Page content -->
<div class="container-fluid mt--6">
	<!-- Card stats -->
	<div class="row">
		<div class="col-xl-4 col-md-6">
			<div class="card card-stats">
				<!-- Card body -->
				<div class="card-body">
					<div class="row">
						<div class="col">
							<h5 class="card-title text-uppercase text-muted mb-0">Total Pengguna</h5>
							<span class="h2 font-weight-bold mb-0"><?= $users?></span>
						</div>
						<div class="col-auto">
							<div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
								<i class="ni ni-active-40"></i>
							</div>
						</div>
					</div>
					<p class="mt-3 mb-0 text-sm">
						<span class="text-nowrap">Seluruh Data</span>
					</p>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-md-6">
			<div class="card card-stats">
				<!-- Card body -->
				<div class="card-body">
					<div class="row">
						<div class="col">
							<h5 class="card-title text-uppercase text-muted mb-0">Total Co-Working</h5>
							<span class="h2 font-weight-bold mb-0"><?= $places?></span>
						</div>
						<div class="col-auto">
							<div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
								<i class="ni ni-chart-pie-35"></i>
							</div>
						</div>
					</div>
					<p class="mt-3 mb-0 text-sm">
						<span class="text-nowrap">Seluruh Data</span>
					</p>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-md-6">
			<div class="card card-stats">
				<!-- Card body -->
				<div class="card-body">
					<div class="row">
						<div class="col">
							<h5 class="card-title text-uppercase text-muted mb-0">Total Transaksi</h5>
							<span class="h2 font-weight-bold mb-0"><?= $transactions?></span>
						</div>
						<div class="col-auto">
							<div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
								<i class="ni ni-money-coins"></i>
							</div>
						</div>
					</div>
					<p class="mt-3 mb-0 text-sm">
						<span class="text-nowrap">Seluruh Data</span>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>