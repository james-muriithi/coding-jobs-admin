@extends('layouts.admin')
@section('content')
@can('twitter_user_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.twitter-users.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.twitterUser.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.twitterUser.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-TwitterUser">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.twitterUser.fields.id') }}
                        </th>
                        <th>

                        </th>
                        <th>
                            {{ trans('cruds.twitterUser.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.twitterUser.fields.screen_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.twitterUser.fields.user_id_str') }}
                        </th>
                        <th>
                            {{ trans('cruds.twitterUser.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.twitterUser.fields.phone_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.twitterUser.fields.subscribed') }}
                        </th>
                        <th>
                            {{ trans('cruds.twitterUser.fields.preference') }}
                        </th>
                        <th>
                            {{ trans('cruds.twitterUser.fields.created_at') }}
                        </th>
                        <th>
                            {{ trans('cruds.twitterUser.fields.updated_at') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($twitterUsers as $key => $twitterUser)
                        <tr data-entry-id="{{ $twitterUser->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $twitterUser->id ?? '' }}
                            </td>
                            <td>
                                @if($twitterUser->profile_image_url)
                                    <img src="{{ $twitterUser->profile_image_url ?? '' }}" alt="" class="img-thumbnail rounded-circle">
                                @endif
                            </td>
                            <td>
                                {{ $twitterUser->name ?? '' }}
                            </td>
                            <td>
                                {{ $twitterUser->screen_name ?? '' }}
                            </td>
                            <td>
                                {{ $twitterUser->user_id_str ?? '' }}
                            </td>
                            <td>
                                {{ $twitterUser->email ?? '' }}
                            </td>
                            <td>
                                {{ $twitterUser->phone_number ?? '' }}
                            </td>
                            <td>
                                {{ $twitterUser->subscribed ?? '' }}
                            </td>
                            <td>
                                {{ $twitterUser->preference ?? '' }}
                            </td>
                            <td>
                                {{ $twitterUser->created_at ?? '' }}
                            </td>
                            <td>
                                {{ $twitterUser->updated_at ?? '' }}
                            </td>
                            <td>
                                @can('twitter_user_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.twitter-users.show', $twitterUser->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('twitter_user_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.twitter-users.edit', $twitterUser->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('twitter_user_delete')
                                    <form action="{{ route('admin.twitter-users.destroy', $twitterUser->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('twitter_user_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.twitter-users.massDestroy') }}",
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
  let table = $('.datatable-TwitterUser:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
