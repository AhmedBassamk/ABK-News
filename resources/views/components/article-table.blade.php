<table id="dataTable" class="table table-striped">
    <thead>
      <tr>
        @foreach ($fillableFields as $fillable)
        <th>{{ $fillable }}</th>
        @endforeach
      </tr>
    </thead>
  <tbody></tbody>
  </table>
