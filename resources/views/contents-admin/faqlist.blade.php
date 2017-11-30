@extends('layouts.admin')

@section('content')
<!-- Start of Content -->

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">FAQs</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        FAQs List
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Question</th>
                                                <th>Answer</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(isset($faqs) && count($faqs)>0)
                                                @foreach($faqs as $faq)
                                                    <tr>
                                                        <td>{{ $faq->question }}</td>
                                                        <td>{{ $faq->answer }}</td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                                                    Select
                                                                    <span class="caret"></span>
                                                                </button>
                                                                <ul class="dropdown-menu pull-right" role="menu">
                                                                    <li><a href="{{ url('/faqadmin/'.$faq->id.'/edit') }}">Edit</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">
                                                                            <form action="{{ url('/faqadmin/'.$faq->id) }}" method="post">
                                                                                <input type="hidden" name="_method" value="delete">
                                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                                <button type="submit" style="background:none; border:none;padding:0px">Delete</button>
                                                                            </form>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div> 
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="3" style="text-align: center;">No FAQ Data</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                    <a href="{{ url('/faqadmin/add') }}" class="btn btn-success btn-block">Add New FAQ</a>
                                </div>
                            </div>
                            <!-- /.col-lg-12(nested) -->                            
                        </div>
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
</div>
        
@endsection