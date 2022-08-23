@extends('admin_panel.layout.master');

@section('content')

<div class="main-content app-content mt-0">
    <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">

                        <!-- PAGE-HEADER -->
                        <div class="page-header">
                            <h1 class="page-title">Table</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Tables</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Table</li>
                                </ol>
                            </div>
                        </div>
                        <!-- PAGE-HEADER END -->

                        <!-- Row -->
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Table head</h3>
                                    </div>
                                    <div class="card-body">
                                        <p>Similar to tables and dark tables, use the modifier classes <code class="highlighter-rouge">.table-primary</code> or <code class="highlighter-rouge">.table-dark</code> to make <code class="highlighter-rouge">&lt;thead&gt;</code>
                                            <div class="table-responsive">
                                                <table class="table border text-nowrap text-md-nowrap mb-0">
                                                    <thead class="table-primary">
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Name</th>
                                                            <th>Position</th>
                                                            <th>Salary</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Joan Powell</td>
                                                            <td>Associate Developer</td>
                                                            <td>$450,870</td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>Gavin Gibson</td>
                                                            <td>Account manager</td>
                                                            <td>$230,540</td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>Julian Kerr</td>
                                                            <td>Senior Javascript Developer</td>
                                                            <td>$55,300</td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>Cedric Kelly</td>
                                                            <td>Accountant</td>
                                                            <td>$234,100</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Table Dark</h3>
                                    </div>
                                    <div class="card-body">
                                        <p>Use <code class="highlighter-rouge">.table-dark</code>to add zebra-striping to any table row within the <code class="highlighter-rouge">.tbody</code>.</p>
                                        <div class="table-responsive">
                                            <table class="table border text-nowrap text-md-nowrap  table-dark table-striped mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Position</th>
                                                        <th>Salary</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Joan Powell</td>
                                                        <td>Associate Developer</td>
                                                        <td>$450,870</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Gavin Gibson</td>
                                                        <td>Account manager</td>
                                                        <td>$230,540</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Julian Kerr</td>
                                                        <td>Senior Javascript Developer</td>
                                                        <td>$55,300</td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>Cedric Kelly</td>
                                                        <td>Accountant</td>
                                                        <td>$234,100</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Row -->
                    </div>
                    <!-- CONTAINER CLOSED -->

    </div>
</div>



@endsection