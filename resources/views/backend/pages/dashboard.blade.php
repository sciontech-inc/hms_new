@php
    $type = 'full-view';
@endphp
@extends('backend.master.index')

@section('title', 'DASHBOARD')

@section('breadcrumbs')
    <span>Dashboard</span>
@endsection

@section('content')
<div class="main">
    <div class="row">
        <div class="col-12">
            <h3>PATIENT DEMOGRAPHICS</h3>
            <div class="row">
                <div class="col-6">    
                    <h5>NO. OF PATIENTS BY AGE</h5>
                    <canvas id="age_chart"></canvas>
                </div>
                <div class="col-6">    
                    <h5>NO. OF PATIENTS BY GENDER</h5>
                    <canvas id="gender_chart"></canvas>
                </div>
            </div>
            <hr>
        </div>
        <div class="col-12">
            <h3>FINANCIAL METRICS</h3>
            <div class="row">
                <div class="col-12">
                    <h5>REVENUE ACTUAL TO BUDGET BY TYPE</h5>
                    <div class="revenue-table">
                        <table>
                            <thead>
                                <th>ACCOUNT DESCRIPTION</th>
                                <th>REVENUE (ACT)</th>
                                <th>REVENUE (BUD)</th>
                                <th>VAR%</th>
                                <th>REVENUE (ACT) LY</th>
                                <th>LY VAR%</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>DUES</td>
                                    <td>196.55M</td>
                                    <td>188.73M</td>
                                    <td>3.98%</td>
                                    <td>182.08M</td>
                                    <td>7.36%</td>
                                </tr>
                                <tr>
                                    <td>SUBSCRIPTIONS</td>
                                    <td>108.34M</td>
                                    <td>113.28M</td>
                                    <td>-4.57%%</td>
                                    <td>99.07M</td>
                                    <td>8.56%</td>
                                </tr>
                                <tr>
                                    <td>GRANTS</td>
                                    <td>19.61M</td>
                                    <td>16.74M</td>
                                    <td>14.62%%</td>
                                    <td>18.58M</td>
                                    <td>5.26%</td>
                                </tr>
                                <tr>
                                    <td>OTHER REVENUE</td>
                                    <td>9.76M</td>
                                    <td>8.65M</td>
                                    <td>11.42%%</td>
                                    <td>9.42</td>
                                    <td>5.31%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="label-chart">REVENUE vs LY</div>
                            <div class="label-value">120.95M</div>
                            <div class="label-sub">GOAL: 108.76M (+11.2%)</div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="label-chart">OPERATING INCOME vs LY</div>
                            <div class="label-value">35.39M</div>
                            <div class="label-sub">GOAL: 29.91M (+18.35%)</div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="label-chart">NET INCOME vs LY</div>
                            <div class="label-value">27.34M</div>
                            <div class="label-sub">GOAL: 22.48M (+21.6%)</div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="label-chart">NET INCOME (%) vs LY</div>
                            <div class="label-value">22.60%</div>
                            <div class="label-sub">GOAL: 20.67% (+9.35%)</div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row">
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-2">
                            <h5>REVENUE RATIO BY ENTITY</h5>
                            <canvas id="entity_pie"></canvas>
                        </div>
                        <div class="col-5">
                            <h5>EXPENSES ACTUAL TO BUDGET BY ENTITY</h5>
                            <canvas id="expense_actual"></canvas>
                        </div>
                        <div class="col-5">
                            <h5>REVENUE vs EXPENSE</h5>
                            <canvas id="rev_expense"></canvas>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-2">
                            <h5>REVENUE RATIO BY TYPE</h5>
                            <canvas id="type_pie"></canvas>
                        </div>
                        <div class="col-5">
                            <h5>TOP 10 EXPENSES BY CATEGORY</h5>
                            <canvas id="top_expense"></canvas>
                        </div>
                        <div class="col-5">
                            <h5>REVENUE vs OPERATING INCOME COMPARED WITH LAST YEAR</h5>
                            <canvas id="rev_op"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection

@section('chart-js')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    $(function() {
        scion.centralized_button(true, true, true, true);

        createBarGraph(
            'age_chart', 
            'AGE', 
            ['00-09', '10-19', '20-29', '30-39', '40-49', '50-59', '60-69', '70-79', '80-89', '90+'], 
            [65, 59, 80, 81, 56, 55, 40, 10, 30, 50],
            [
                'rgba(110, 175, 219, 0.5)',
                'rgba(118, 219, 110, 0.5)',
                'rgba(219, 191, 110, 0.5)',
                'rgba(75, 192, 192, 0.5)',
                'rgba(219, 110, 113, 0.5)',
                'rgba(152, 110, 219, 0.5)',
                'rgba(110, 219, 191, 0.5)',
                'rgba(219, 169, 110, 0.5)',
                'rgba(213, 110, 219, 0.5)',
                'rgba(110, 124, 219, 0.5)'
            ]
        );

        createBarGraph(
            'gender_chart', 
            'GENDER', 
            ['FEMALE', 'MALE', 'OTHER', 'TBD', 'UNKNOWN'], 
            [55, 40, 10, 30, 50],
            [
                'rgba(118, 219, 110, 0.5)',
                'rgba(75, 192, 192, 0.5)',
                'rgba(152, 110, 219, 0.5)',
                'rgba(219, 169, 110, 0.5)',
                'rgba(110, 124, 219, 0.5)'
            ]
        );
        
        createPieGraph(
            'entity_pie', 
            'Percentage', 
            ['Solver Association - Canada', 'Solver Association - EMEA', 'Solver Association - Asia', 'Solver Association - US'], 
            [7.54, 13.7, 48.63, 30.12],
            [
                'rgba(152, 110, 219, 0.5)',
                'rgba(110, 219, 191, 0.5)',
                'rgba(219, 169, 110, 0.5)',
                'rgba(213, 110, 219, 0.5)',
                'rgba(219, 191, 110, 0.5)',
                'rgba(110, 124, 219, 0.5)'
            ]
        );
        
        createPieGraph(
            'type_pie', 
            'Percentage', 
            ['Subscriptions', 'Other Revenue', 'Grants', 'Dues'], 
            [32.41, 2.92, 5.87, 58.8],
            [
                'rgba(75, 192, 192, 0.5)',
                'rgba(219, 110, 113, 0.5)',
                'rgba(152, 110, 219, 0.5)',
                'rgba(110, 219, 191, 0.5)',
            ]
        );

        createBarGraphCustom_1(
            'expense_actual', 
            'Percentage', 
            ['Solver Association - Asia', 'Solver Association - US', 'Solver Association - EMEA', 'Solver Association - Canada']
        );

        createBarGraphCustom_2(
            'rev_expense', 
            'Percentage', 
            ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC']
        );

        createBarGraphCustom_3(
            'top_expense', 
            'Percentage', 
            ['MARKETING', 'FULLTIME - SALARY', 'FULLTIME - BONUS', 'PAYROLL TAXES', 'PART TIME - SALARY', 'FULL TIME - COMMISSION', 'CONSULTING', 'RENT', 'DUES, LICENSES AND PERMITS', 'TELEPHONE']
        );
        
        createBarGraphCustom_4(
            'rev_op', 
            'Percentage', 
            ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC']
        );
    });

    function createBarGraph(id, title, labels, data, bg) {
        const ctx = document.getElementById(id);
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    axis: 'y',
                    label: title,
                    data: data,
                    fill: false,
                    backgroundColor: bg,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                indexAxis: 'y',
                plugins: {
                    legend: {
                        display: false,
                        position: 'bottom',
                        labels: { color: 'darkred', }
                    }
                }
            }
        });
    }

    function createBarGraphCustom_1(id, title, labels) {
        const ctx = document.getElementById(id);
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    axis: 'y',
                    label: 'Expenses',
                    data: [116.28, 71.83, 32.84, 18.06],
                    fill: false,
                    backgroundColor: '#023151',
                    borderWidth: 1
                },{
                    axis: 'y',
                    label: 'Expenses(BUD)',
                    data: [111.27, 69.15, 31.82, 17.46],
                    fill: false,
                    backgroundColor: '#49f269',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                indexAxis: 'y',
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom',
                        labels: { color: 'darkred', }
                    }
                }
            }
        });
    }

    function createBarGraphCustom_2(id, title, labels) {
        const ctx = document.getElementById(id);
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                {
                    type: 'line',
                    label: 'REVENUE (ACT)',
                    data: [20930000, 19920000, 21920000, 18920000, 17920000, 26950000, 26950000, 26950000, 25940000, 24940000, 27940000, 31950000],
                    backgroundColor: '#49f269',
                    borderColor: '#49f269',
                    stack: 'combined'
                },
                {
                    label: 'EXPENSES',
                    data: [18000000, 16000000, 18000000, 16000000, 15000000, 23000000, 22000000, 21000000, 20000000, 20000000, 23000000, 29000000],
                    backgroundColor: '#023151',
                },
                {
                    label: 'OTHER INCOME/ EXPENSES',
                    data: [930000, 920000, 930000, 920000, 920000, 950000, 950000, 950000, 940000, 940000, 940000, 950000],
                    backgroundColor: '#6eafdb',
                },
                {
                    label: 'NET INCOME',
                    data: [2000000, 3000000, 3000000, 2000000, 2000000, 3000000, 4000000, 5000000, 5000000, 4000000, 4000000, 2000000],
                    backgroundColor: '#075cba',
                }]
            },
            options: {
                scales: {
                    x: {
                        stacked: true,
                    },
                    y: {
                        stacked: true,
                        beginAtZero: true
                    }
                },
                indexAxis: 'x',
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom',
                        labels: { color: 'darkred', }
                    }
                }
            }
        });
    }

    function createBarGraphCustom_3(id, title, labels) {
        const ctx = document.getElementById(id);
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    axis: 'y',
                    label: 'Expenses',
                    data: [118040000, 58250000, 14720000, 10340000, 5920000, 4430000, 2520000, 2300000, 2260000,2250000],
                    fill: false,
                    backgroundColor: '#a5dfdf',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                indexAxis: 'y',
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom',
                        labels: { color: 'darkred', }
                    }
                }
            }
        });
    }
    
    function createBarGraphCustom_4(id, title, labels) {
        const ctx = document.getElementById(id);
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                {
                    type: 'line',
                    label: 'REVENUE (ACT)',
                    data: [18000000, 16000000, 18000000, 16000000, 15000000, 23000000, 22000000, 21000000, 20000000, 20000000, 23000000, 29000000],
                    backgroundColor: '#6eafdb',
                    borderColor: '#6eafdb',
                    stack: 'combined'
                },
                {
                    label: 'EXPENSES',
                    data: [18000000, 16000000, 18000000, 16000000, 15000000, 23000000, 22000000, 21000000, 20000000, 20000000, 23000000, 29000000],
                    backgroundColor: '#023151',
                },
                {
                    label: 'OTHER INCOME/ EXPENSES',
                    data: [15000000, 14000000, 15000000, 14000000, 14000000, 20000000, 19000000, 20000000, 18000000, 19000000, 20000000, 24000000],
                    backgroundColor: '#49f269',
                }]
            },
            options: {
                scales: {
                    x: {
                        stacked: false,
                    },
                    y: {
                        stacked: false,
                        beginAtZero: true
                    }
                },
                indexAxis: 'x',
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom',
                        labels: { color: 'darkred', }
                    }
                }
            }
        });
    }
    
    function createPieGraph(id, title, labels, data, bg) {
        const ctx = document.getElementById(id);
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    axis: 'y',
                    label: title,
                    data: data,
                    fill: false,
                    backgroundColor: bg,
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y',
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom',
                        labels: { color: 'darkred', }
                    }
                }
            }
        });
    }
</script>
@endsection

@section('styles')
<style>
.revenue-table {
    overflow: auto;
}
.dashboard-greeting {
    background: #3282b8;
}
.dashboard-greeting h1 {
    color: #fff !important;
    font-size: 25px !important;
}
.dashboard-greeting .card-details {
    color: #ffff;
    margin-bottom: 15px;
}

.revenue-table table {
    width: 100% !important;
    font-size: 12px;
}

.revenue-table table thead th {
    font-size: 12px;
    background: #6eafdb;
    padding: 5px 10px;
    color: #fff;
}

.revenue-table table td {
    font-size: 12px;
    padding: 5px 10px;
}

.revenue-table table tbody tr:nth-child(2n) {
    background: #eee;
}

.label-chart {
    font-weight: bold !important;
    text-align: center;
}

.label-value {
    font-size: 35px;
    text-align: center;
    color: green;
}

.label-sub {
    font-size: 12px;
    text-align: center;
}

</style>
@endsection