@extends('layouts.app')

@section('chart')
    @if ($startDate != null)

        google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawAxisTickColors);

        function drawAxisTickColors() {
        var data = google.visualization.arrayToDataTable(<?php echo json_encode($arr); ?>);


        var options = {
        title: 'Department-Wise CGPA',
        chartArea: {width: '50%'},
        hAxis: {
        title: 'Number Of Student',
        minValue: 0,
        textStyle: {
        bold: true,
        fontSize: 12,
        color: '#4d4d4d'
        },
        titleTextStyle: {
        bold: true,
        fontSize: 18,
        color: '#4d4d4d'
        }
        },
        vAxis: {
        title: 'Departments',
        textStyle: {
        fontSize: 14,
        bold: true,
        color: '#848484'
        },
        titleTextStyle: {
        fontSize: 14,
        bold: true,
        color: '#848484'
        }
        }
        };
        var chart = new google.visualization.BarChart(document.getElementById('chart'));
        chart.draw(data, options);
        }
    @endif
@endsection

@section('sidebar')
    <li class="dropdown">
        <a href="javascript:;" class="dropdown-toggle">
            <span class="micon dw dw-house-1"></span><span class="mtext">Home</a></span>
        </a>
        <ul class="submenu">
            <li><a href="{{ '/schoolcgpa/' . $higherO->employeeID . '/d' }}">School-wise CGPA</a></li>
            <li><a href="{{ '/departmentcgpa/' . $higherO->employeeID . '/d' }}">Department-wise CGPA</a></li>
            <li><a href="{{ '/programcgpa/' . $higherO->employeeID . '/d' }}">Program-wise CGPA</a></li>
        </ul>
    </li>
    {{-- <li class="dropdown">
    <a href="javascript:;" class="dropdown-toggle">
        <span class="micon dw dw-house-1"></span><span class="mtext">Higher Officials</a></span>
    </a>
    <ul class="submenu">
        <li><a href="{{ '/vc/' . $higherO->employeeID . '/d' }}">VC-wise CGPA</a></li>
        <li><a href="{{ '/dean/' . $higherO->employeeID . '/d' }}">Head-wise CGPA</a></li>
        <li><a href="{{ '/head/' . $higherO->employeeID . '/d' }}">Dean-wise CGPA</a></li>
    </ul>
</li> --}}
    <li class="dropdown">
        <a href="javascript:;" class="dropdown-toggle">
            <span class="micon dw dw-house-1"></span><span class="mtext">Enrollment</span>
        </a>
        <ul class="submenu">
            <li><a href="{{ '/schoolEnrollment/' . $higherO->employeeID . '/d' }}">School Enrollment</a></li>
            <li><a href="{{ '/departmentEnrollment/' . $higherO->employeeID . '/d' }}">Department Enrollment</a></li>
            <li><a href="{{ '/programEnrollment/' . $higherO->employeeID . '/d' }}">Program Enrollment</a></li>
        </ul>
    </li>
    <li class="dropdown">
        <a href="{{ '/studentReportO/' . $higherO->employeeID . '/d' }}" class="dropdown-toggle">
            <span class="micon dw dw-list3"></span><span class="mtext">Student Report</span>
        </a>
    </li>
    <li class="dropdown">
        <a href="{{ '/courseReportO/' . $higherO->employeeID . '/d' }}" class="dropdown-toggle">
            <span class="micon dw dw-invoice"></span><span class="mtext">Course Report</span>
        </a>
    </li>
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card-box height-100-p pd-20">
                <h2 class="h4 mb-20 text-center">CGPA</h2>
                <form action="{{ '/hdc/' . $higherO->employeeID . '/d' }}" method="POST" class="d-flex">
                    @csrf
                    <label class="mb-20" for="startDate">Choose Starting Date</label>
                    <select class="form-select mb-20" aria-label="Default select example" id="startDate" name="startDate">
                        <option value="12">autumn19</option>
                        <option value="13">spring20</option>
                        <option value="14">summer20</option>
                        <option value="15">autumn20</option>
                        <option value="16">spring21</option>
                    </select>
                    <label class="mb-20" for="endDate">Choose Ending Date</label>
                    <select class="form-select mb-20" aria-label="Default select example" id="endDate" name="endDate">
                        <option value="12">autumn19</option>
                        <option value="13">spring20</option>
                        <option value="14">summer20</option>
                        <option value="15">autumn20</option>
                        <option value="16">spring21</option>
                    </select>
                    <label for="School">Choose Schools:</label>
                    <label for="Department">Choose Departments:</label>
                    <input type="checkbox" id="department1" name="department1" value="CSE">
                    <label for="department1">CSE</label><br>
                    <input type="checkbox" id="department2" name="department2" value="MIS">
                    <label for="department2">MIS</label><br>
                    <input type="checkbox" id="department3" name="department3" value="ACN">
                    <label for="department3">ACN</label><br>
                    <button class="btn btn-outline-success mb-20" type="submit">Show</button>
                </form>
                @if (session()->has('message'))
                    <div class="alert alert-danger">{{ session()->get('message') }}</div>
                @endif

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card-box height-100-p pd-20">
                <h2 class="h4 mb-20 text-center"></h2>
                <div id="chart"></div>
            </div>
        </div>
    </div>

@endsection
