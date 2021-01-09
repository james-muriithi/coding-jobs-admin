@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.twitterUserJob.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-TwitterUserJob">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.twitterUserJob.fields.id') }}
                        </th>
                        <th>

                        </th>
                        <th>
                            {{ trans('cruds.twitterUserJob.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.twitterUserJob.fields.job') }}
                        </th>
                        <th>
                            {{ trans('cruds.twitterUserJob.fields.preference') }}
                        </th>
                        <th>
                            {{ trans('cruds.twitterUserJob.fields.created_at') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($twitterUserJobs as $key => $twitterUserJob)
                        <tr data-entry-id="{{ $twitterUserJob->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $twitterUserJob->id ?? '' }}
                            </td>
                            <td>
                                @if($twitterUserJob->user->profile_image_url)
                                    <img src="{{ $twitterUserJob->user->profile_image_url ?? '' }}" alt="" class="img-thumbnail rounded-circle">
                                @endif
                            </td>
                            <td>
                                {{ $twitterUserJob->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $twitterUserJob->job->job_title ?? '' }}
                            </td>
                            <td>
                                {{ strtoupper($twitterUserJob->user->preference) ?? '' }}
                            </td>
                            <td>
                                {{ $twitterUserJob->created_at ?? '' }}
                            </td>
                            <td>
                                @can('twitter_user_job_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.twitter-user-jobs.show', $twitterUserJob->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan


                                @can('twitter_user_job_delete')
                                    <form action="{{ route('admin.twitter-user-jobs.destroy', $twitterUserJob->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
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
@can('twitter_user_job_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.twitter-user-jobs.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-TwitterUserJob:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
