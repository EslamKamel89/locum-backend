<div class="mt-0 tab-pane fade" id="operation" role="tabpanel" aria-labelledby="operation-tab">

    <div class="row">
        <div class="mt-0">
            <div class="mb-4 card" style="margin-bottom: 6rem !important">
                <div class="text-white card-header bg-primary">Operation Hours</div>
                <div class="card-body">
                    {{-- Sub header --}}
                    <form action="{{ route('healthcare.update', Auth::user()->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <style>
                            h1 {
                                color: #333;
                                text-align: center;
                            }

                            table.facility-table {
                                width: 100%;
                                border-collapse: collapse;
                                margin: 20px 0;
                            }

                            table.facility-table th,
                            table.facility-table td {
                                padding: 10px;
                                text-align: center;
                                border: 1px solid #ddd;
                            }

                            table.facility-table th {
                                background-color: #343a40;
                                color: #fff;
                            }

                            table.facility-table tbody tr:nth-child(even) {
                                background-color: #f4f4f4;
                            }
                        </style>
                        <div class="container mt-5">
                            <h1 class="mb-4">24-Hour Locum Facility Shifts and Operating Times</h1>
                            <table class="table table-bordered facility-table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Day</th>
                                        <th>Operating Hours</th>
                                        <th>Shift 1</th>
                                        <th>Shift 2</th>
                                        <th>Shift 3</th>
                                        <th>Shift 4</th>
                                        <th>Shift 5</th>
                                        <th>Shift 6</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Saturday</td>
                                        <td>24 Hours</td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>Monday</td>
                                        <td>24 Hours</td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>Tuesday</td>
                                        <td>24 Hours</td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>Wensday</td>
                                        <td>24 Hours</td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>Thursday</td>
                                        <td>24 Hours</td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>Friday</td>
                                        <td>24 Hours</td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>Saturday</td>
                                        <td>24 Hours</td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>Sunday</td>
                                        <td>24 Hours</td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <label class="col-md-12">From:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                            <div class="row">
                                                <label class="col-md-12">To:</label>
                                                <input type="time" class="form-control col-md-12" value="04:00">
                                            </div>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>

                        </div>


                        <div class="row">
                            <div class="p-3 bg-white shadow ">
                                <button type="submit" class="btn btn-primary btn-lg w-100">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
