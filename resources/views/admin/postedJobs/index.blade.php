@extends('layouts.admin')
@section('content')
@can('posted_job_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.posted-jobs.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.postedJob.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.postedJob.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-PostedJob">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.postedJob.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.postedJob.fields.job') }}
                        </th>
                        <th>
                            {{ trans('cruds.postedJob.fields.platform') }}
                        </th>
                        <th>
                            {{ trans('cruds.postedJob.fields.link') }}
                        </th>
                        <th>
                            {{ trans('cruds.postedJob.fields.post_date') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($postedJobs as $key => $postedJob)
                        <tr data-entry-id="{{ $postedJob->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $postedJob->id ?? '' }}
                            </td>
                            <td>
                                {{ $postedJob->job->job_title ?? '' }}
                            </td>
                            <td>
                                {{ $postedJob->platform ?? '' }}
                            </td>
                            <td>
                                {{ $postedJob->link ?? '' }}
                            </td>
                            <td>
                                {{ $postedJob->post_date ?? '' }}
                            </td>
                            <td>
                                @can('posted_job_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.posted-jobs.show', $postedJob->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan



                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-PostedJob:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
